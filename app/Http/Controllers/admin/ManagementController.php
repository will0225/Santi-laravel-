<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Setting;

class ManagementController extends Controller
{
    function index() {
        $user = Auth::user();
        $logs = $user->logs;
        $admin_users = User::where(['is_admin'=> 1])->whereNotIn('id', [$user->id])->get();
        $setting = Setting::get();
        
        return view('admin.management.index', ['logs' => $logs, 'admins' => $admin_users, 'setting' => $setting[0]]);
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
        return redirect()->back()->with('message', 'Setting updated successfully!');;
    }
}
