<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SelectStateRequest;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function register_action(RegisterRequest $r)
    {
        $userData = $r->only(['name', 'email', 'password']);
        $userData['password'] = Hash::make($userData['password']);
        $user = User::create($userData);

        Auth::loginUsingId($user->id);
        return redirect()->route('state');
    }

    public function state(Request $r)
    {
        $data['states'] = State::all();
        return view('auth.select-state', $data);
    }
    public function state_action(SelectStateRequest  $r)
    {
        $data = $r->only(['state']);
        $stateRegister = State::find($data['state']);
        if (!$stateRegister) {
            return redirect('/login');
        }
        $user = Auth::user();
        $user->state_id = $stateRegister->id;
        $user->save();
        return redirect()->route('home');
    }

    public function login_action(LoginRequest $r)
    {
        $loginData = $r->only(['email', 'password']);
        if (Auth::attempt($loginData)) {
            Auth::user();
            return redirect()->route('home');
        } else {
            $data['message'] = 'Usuário e/ou senha inválido';
            $data['email'] = $loginData['email'];
            return view('auth.login', $data);
        }
    }

    public function logout()
    {
        Auth::logout();
        $data['message'] = 'Sessão finalizada!';
        return view('login', $data);
    }
}
