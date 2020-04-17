<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class MainController extends Controller
{
    function index()
    {
        return view('administration\login');
    }

    function checkLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        ]);

        
        $user_data = array(
            'email' => $request->get('email'),
            'password' =>  $request->get('password')
        );

        if(Auth::attempt($user_data))
        {
            return redirect('main/succeslogin');
        } else {
            return back()->with('error', 'Identifiant ou mot de passe incorrect');
        }
    }

    function succeslogin() {
        return view('administration/index');
    }

    function logout() {
        Auth::logout();
        return redirect('login');
    }
}
