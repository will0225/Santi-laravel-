<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Actions\Fortify\UpdateUserPassword;

class AccountController extends Controller
{
    function index() {
        $user = auth()->user();
        return view('account.index', ['profile' => $user]);
    }

    function profileUpdate(Request $request) {
        $user_id = auth()->user()->id;
        $validated = $request->validate([
            'name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'nick_name' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required',
            'bio' => 'required',
            'email' => 'required|email'
        ]);
        User::where('id', $user_id)->update([
            'name'=> $request->name,
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'nick_name'=> $request->nick_name,
            'phone'=> $request->phone,
            'address'=> $request->address,
            'bio' => $request->bio,
            'email'=> $request->email
        ]);
        return redirect()->back()->with('message', 'Profile updated successfully!');;
    }

    function passwordUpdate(Request $request, UpdateUserPassword $passwordUpdate) {
        $input = array(
            'password' => $request->password,
            'current_password' => $request->current_password,
            'confirmation_password' => $request->confirmation_password
        );
        $user = auth()->user();
        $passwordUpdate->update($user, $input);
    }
}
