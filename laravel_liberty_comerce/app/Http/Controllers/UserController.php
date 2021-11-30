<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;  

class UserController extends Controller
{
     /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->flashOnly(['first_name', 'last_name', 'email']);
        $val = $request->validate([
            'first_name' => 'required|min:2|max:30|alpha_dash',
            'last_name' => 'required|min:2|max:30|alpha_dash',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6|max:30',
        ]);
        $val['password']=Hash::make($request->password);
        $user = User::create($val);
        Auth::login($user);
        return Redirect::to("/catalogue");
    }

    public function modify(Request $request)
    {
        $val = $request->validate([
            'first_name' => 'nullable|min:2|max:30|alpha_dash',
            'last_name' => 'nullable|min:2|max:30|alpha_dash',
            'email' => 'nullable|email',
            'shipping_address' => 'nullable',
            'description' => 'nullable|max:1000',
        ]);
        $user = User::where('id', $request->id);

        if(!is_null($request->first_name)) {
            $user->update([
                'first_name' => $val['first_name']
            ]);
        }
        if(!is_null($request->last_name)) {
            $user->update([
                'last_name' => $val['last_name']
            ]);
        }
        if(!is_null($request->email)) {
            $user->update([
                'email' => $val['email']
            ]);
        }
        if(!is_null($request->shipping_address)) {
            $user->update([
                'shipping_address' => $val['shipping_address']
            ]);
        } else if ($request->del_shipping_address == 1) {
            $user->update([
                'shipping_address' => null
            ]);
        }
        if(!is_null($request->avatar)) {
            $this->storeAvatar($request);
        }
        if(!is_null($request->description)) {
            $user->update([
                'description' => $val['description']
            ]);
        } else if ($request->del_description == 1) {
            $user->update([
                'description' => null
            ]);
        }
        return redirect('profile')->with(['success' => 'Le profil a bien été modifié.']);
    }

    public function storeAvatar(Request $request)
    {
        $request->file('avatar')->storeAs(
            'public/avatars', $request->user()->id
        );
    }
}
