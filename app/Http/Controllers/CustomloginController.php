<?php

namespace App\Http\Controllers;

use App\Models\Deputy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\CustomloginController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CustomloginController extends Controller
{
    public function authenticate(Request $request)
    {
        $request->validate([
            'Usernm' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
    //dd();
        $credentials = $request->only('Usernm', 'password');
           // dd($credentials);
           if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $userid=$user->id;
            //dd($userid);




            return redirect()->intended('listworkmasters');
        }
 
        return back()->withErrors([
            'Usernm' => 'The provided credentials do not match our records.',
        ])->onlyInput('Usernm');
    }


    public function loginview()
    {
        return view('login');
    }
}