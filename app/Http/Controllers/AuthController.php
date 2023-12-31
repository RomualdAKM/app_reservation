<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        //validator
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);


        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors(),
            ];
            return response()->json(
                $response,
                200
            );
        }


        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        // $user = User::create($input);
        $user = new User;
        $user->name = $request->name;

        $user->email = $request->email;

        $user->password = $input['password'];
        $user->save();

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        $response = [
            'success' => true,
            'data' => $success,
            'message' => "User register successfully"
        ];

        return response()->json($response, 200);
    }

    public function edit(Request $request, $id)
    {
        //validator
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors(),
            ];
            return response()->json(
                $response,
                200
            );
        }


        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        // $user = User::create($input);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $input['password'];
        $user->save();

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        $response = [
            'success' => true,
            'data' => $success,
            'message' => "User register successfully"
        ];

        return response()->json($response, 200);
    }

    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $user = Auth::user();
            // Stockez l'utilisateur connecté dans la session
            session(['user' => $user]);
            $user = $request->user();

            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            $response = [
                'name' => $user->name,
                'success' => true,
                'data' => $success,
                'message' => "User login successfully"
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'message' => "!!!!!! Ces coordonnees ne sont pas enregistrez : ressayez ou creer un compte"
            ];
            return response()->json($response);
        }
    }
}
