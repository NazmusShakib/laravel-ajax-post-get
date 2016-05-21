<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\user;
use App\Role;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function getAccount()
    {
        return view('account', ['user' => Auth::user()]);
    }

   public function postSaveAccount($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

/*        $user = Auth::user();
        $old_name = $user->name;
        $old_phone = $user->phone;
        $old_email = $user->email;
        $old_password = $user->password;

        $user->name = $request['name'];
        $user->phone = $request['phone'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        $user->save();*/

        $article = user::findOrFail($id);

        $article->update($request->all());

        return redirect('admin');


        return redirect()->route('main');
    }




}
