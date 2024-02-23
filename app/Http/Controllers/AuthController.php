<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registre(){
        return view('registre');
    }
    public function index(){
        return view('login');
    }

    public function store(Request $request){
        $user = new User ;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->save();
        
        auth()->login($user);
        session()->regenerate();

        return redirect('/client');
    }

    public function check(Request $request)
        {
        $login = $request->only('email', 'password');
    
        if (Auth::attempt($login)) {

            $user = auth()->user();
            if ($user->role === 'admin') {
                return view('admin.admin');
            } else if ($user->role === 'client') {
                return redirect('/client');
            }
        }
        return back()->withErrors(['formError' => 'Invalid email or password']);
    }
}
