<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Actions\Fortify\UpdateUserPassword;
use \App\Models\Logs;

class AccountController extends Controller
{
    function index() {
        $user = auth()->user();
        return view('account.index', ['profile' => $user]);
    }

    function profileUpdate(Request $request) {
        $user_id = auth()->user()->id;
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required|max:255',
            'bio' => 'required',
            'email' => 'required|email'
        ]);
        User::where('id', $user_id)->update([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'phone'=> $request->phone,
            'bio' => $request->bio,
            'email'=> $request->email,
            'country'=> $request->country,
            'state'=> $request->state,
            'zip'=> $request->zip,
            'city'=> $request->city,
            'vat_number' => $request->vat_number
        ]);
        Logs::create([
            "user_id" => $user_id,
            "log_type" => "Profile Update",
            "data" => json_encode(['ip'=>$request->ip(), 'user_agent' => $request->header('User-Agent')]),
            "log_date" => date('Y-m-d H:i:s')
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
        Logs::create([
            "user_id" => $user->id,
            "log_type" => "Password Update",
            "data" => json_encode(['ip'=>$request->ip(), 'user_agent' => $request->header('User-Agent')]),
            "log_date" => date('Y-m-d H:i:s')
        ]);
        $passwordUpdate->update($user, $input);
    }
}
