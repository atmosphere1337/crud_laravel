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
        $validated = $request->validate(User::$rules);
        //------------------------------------------x3
        if (User::register($validated))
            return redirect()->route('login_get');//-------x4
        else
            return back()->withErrors(['acc_exists' => 'Account with this login already exists']);
    }
    public function login_process(Request $request)
    {
        $validated = $request->validate(User::$rules);//--------------------------------------------x1
        if (Auth::attempt($validated))
        {
            return redirect()->route('page_get');
        }
        return back();//---------------------------------x2
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
    public function admin_get()
    {
        $records = User::where('mode', 'user')->get(); 
        return view('admin', compact('records'));
    }
    public function admin_ban(Request $request)
    {
        $model = User::find($request->id);
        if ($model->mode == 'user')
        {
            $model->ban = true;
            $model->save();
        }

        return redirect('/admin');
    }
    public function admin_unban(Request $request)
    {
        $model = User::find($request->id);
        if ($model->mode == 'user')
        {
            $model->ban = false;
            $model->save();
        }
        return redirect('/admin');
    }
    public function ban_notif()
    {
        if (Auth::user()->ban == 1)
        {
            return view('other.ban_notif');
        }
        else
            return back();
    }
    public function profile_get($usr)
    {
        if (Auth::user()->login == $usr)
            return view('settings');
        return redirect('/page');
    }
    public function change_password(Request $request, $usr)
    {
        if (Auth::user()->login == $usr)
        {
            User::whereId(auth()->user()->id)->update(['password' => $request->input['password'] ]);
            //$model = User::find(Auth::id())->first();
            //$model->password = $request->input['password'];
            //$model->save();
        }
        return redirect('/page');
    }
}
