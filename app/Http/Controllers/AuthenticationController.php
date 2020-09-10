<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function login_view()
    {
        if(Auth::check()) {
            return redirect()->route('pannel');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required | email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials) ) {
            return redirect()->route('pannel', Auth::user()->id);
        }

        Session::flash('message_error', "Erro ao logar");

        return redirect()->route('login_view');
    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required | min:6',
        ]);

        $inserted = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            "created_at" =>  Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        if(!$inserted) {
            Session::flash('message_error', 'Usuário não cadastrado!');
            return redirect(route('login'));
        }

        Session::flash('message_success', 'Cadastrado com sucesso!');
        return redirect(route('login'));
    }

    public function logout() {
        Auth::logout();
        return redirect(route('login'));
    }
}
