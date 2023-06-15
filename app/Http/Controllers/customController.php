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
        {
            $records = Entity::all(); 
            return view('page', compact('records')); 
        }

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
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login_get');
    }
    public function add_record(Request $request)
    {
        $validated = $request->validate([
            'country' => 'required',
            'city' => 'required',
            'population' => 'required',
        ]);
        Entity::add_rec($validated);
        return redirect()->route('page_get');
    }
    public function page_update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'country' => 'required',
            'city' => 'required',
            'population' => 'required',
        ]);
        Entity::update_rec($validated);
        return redirect()->route('page_get');
    }
    public function page_drop(Request $request)
    {
        $validated = $request->validate(['id' => 'required']);
        Entity::drop_rec($validated);
        return redirect()->route('page_get');
    }
    
}
