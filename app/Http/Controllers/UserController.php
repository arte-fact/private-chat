<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\Client;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();
        $response = Response::create($users);
        Log::debug($response);
        return $response;
    }

    public function me(Request $request)
    {
        return Response::create($request->user());
    }

    public function getUserNumberOrRegister (Request $request)
    {
        $user = User::where('email', $request->get("username"))->get();

        if (empty($user[0]))
        {
            $password = bcrypt("secret");
            $number = (string) mt_rand(123456, 999999);
            $user = User::create([
                'name' => $number,
                'email' => $request->get("username"),
                'password' => $password,
                'password_confirm' => $password,
            ]);

            Log::debug(Response::create(["user" => $user]));
            return Response::create(["user" => $user]);
        }
        Log::debug(Response::create(["user" => $user[0]]));
        return Response::create(["user" => $user[0]]);
    }

    public function getUserConversations(Request $request)
    {
        Log::debug("User Controller ");

        /** @var User $user */
        $user = $request->user()->first();

        $response = Response::create([ "conversation" => $user->conversations()->get()]);

        return $response;
    }

    public function register(Request $request)
    {
        /**
         * Get a validator for an incoming registration request.
         *
         * @param  array  $request
         * @return \Illuminate\Contracts\Validation\Validator
         */
        $valid = validator($request->only('email', 'name', 'password'), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($valid->fails()) {
            $jsonError=response()->json($valid->errors()->all(), 400);
            return Response::json($jsonError);
        }

        $data = request()->only('email','name','password','mobile');

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        // And created user until here.

        $client = Client::where('password_client', 1)->first();

        // Is this $request the same request? I mean Request $request? Then wouldn't it mess the other $request stuff? Also how did you pass it on the $request in $proxy? Wouldn't Request::create() just create a new thing?

        $request->request->add([
            'grant_type'    => 'password',
            'client_id'     => $client->id,
            'client_secret' => $client->secret,
            'username'      => $data['email'],
            'password'      => $data['password'],
            'scope'         => null,
        ]);

        // Fire off the internal request.
        $token = Request::create(
            'oauth/token',
            'POST'
        );
        return \Route::dispatch($token);
    }
}
