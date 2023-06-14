<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Entity;
use Illuminate\Support\Facades\Auth;
class customController extends Controller
{
    public function page_get()
    {
        if (Auth::check())
            return view('page'); 
    }
    public function register_process(Request $request)
    {
        $validated = $request->validate([
           'login' => 'required',
           'password' => 'required',
        ]);
        User::register($validated);
        return redirect()->route('login_get');
    }
    public function login_process(Request $request)
    {
        $validated = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($validated))
        {
            return redirect()->route('page_get');
        }
        return back();

    }
    
}
