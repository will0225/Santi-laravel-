<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Setting;
use App\Models\Group;

class ManagementController extends Controller
{
    function index() {
        $user = Auth::user();
        $logs = $user->logs;
        $admin_users = User::where(['is_admin'=> 1])->whereNotIn('id', [$user->id])->get();
        $setting = Setting::get();
        $groups = Group::get();
        return view('admin.management.index', [
            'logs' => $logs, 
            'admins' => $admin_users, 
            'setting' => $setting[0],
            'groups' => $groups
            ]
        );
    }

    function settingUpdate(Request $request) {
        $updatedData = Setting::where('id', 1)->update([
            'app_name' => $request->app_name,
            'maintenance' => $request->maintenance,
            'invoice_info' => $request->invoice_info,
            'user_register_enable' => $request->user_register_enable,
            'invoice_number' => $request->invoice_number,
            'invoice_format' => $request->invoice_format,
            'invoice_reset' => $request->invoice_reset,
            'date_format' => $request->date_format
        ]);
        return redirect()->back()->with('message', 'Setting updated successfully!');
    }

    function createGroup(Request $request) {

        $validated = $request->validate([
            'name' => 'required|max:255'
        ]);
        $price = json_encode([
            "first_price" => $request->first_price, 
            "second_price" => $request->second_price, 
            "third_price" => $request->third_price,
            "extra_price" => $request->extra_price,
            "cash_on_delivery_percent" => $request->cash_on_delivery_percent
        ]);
       
        Group::create([
            'name'=> $request->name,
            'price' =>$price
        ]);
        return redirect()->back()->with('message', 'Group created successfully!');    
    }

    function updateGroup(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:255'
        ]);
      
        $price = json_encode([
            "first_price" => $request->first_price, 
            "second_price" => $request->second_price, 
            "third_price" => $request->third_price,
            "extra_price" => $request->extra_price,
            "cash_on_delivery_percent" => $request->cash_on_delivery_percent
        ]);
        Group::where('id', $request->id)->update([
            'name'=> $request->name,
            'price' => $price
        ]);
        return redirect()->back()->with('message', 'Group updated successfully!');    
    }

    function deleteGroup(Request $request, $id) {
        Group::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Group deleted successfully!');    
    }
}
