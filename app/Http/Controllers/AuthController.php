<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $application=Application::first();
        return view('auth.login',compact('application'));
    }

    public function login(Request $request)
    {
        // Validate the request data
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|string|min:6',
        // ]);

        $credentials = $request->only('email', 'password');

        // Output credentials for debugging
       

        // Check if the user exists
        $user = User::where('email', $credentials['email'])->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Invalid credentials');
        }

        // Debugging: Check if the password matches
        if (!\Hash::check($credentials['password'], $user->password)) {
            return redirect()->back()->with('error', 'Invalid credentials');
        }

        // Attempt to generate token
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return redirect()->back()->with('error', 'Invalid credentials');
            }

            // Store token in session
            session(['jwt_token' => $token]);

            return redirect()->route('slider.index');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Could not log in. Please try again.');
        }
    }

    public function logout()
    {
        session()->forget('jwt_token');
        auth()->logout();

        return redirect('/login');
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/login');
    }
}
