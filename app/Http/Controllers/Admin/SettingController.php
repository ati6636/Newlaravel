<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();

        if ($settings===null){
            $settings = new Setting();
            $settings->title = 'Project Title';
            $settings->save();
            $settings = Setting::first();
        }
        return view('admin.setting_edit', compact('settings'));
    }

    public function update(Request $request, Setting $setting,)
    {
        $id = $request->id;

        $settings = Setting::find($id);

        $settings->title = $request->title;
        $settings->keywords = $request->keywords;
        $settings->description = $request->description;
        $settings->company = $request->company;
        $settings->address = $request->address;
        $settings->phone = $request->phone;
        $settings->fax = $request->fax;
        $settings->email = $request->email;
        $settings->smtpserver = $request->smtpserver;
        $settings->smtpemail = $request->smtpemail;
        $settings->smtppassword = $request->smtppassword;
        $settings->smtpport = $request->smtpport;
        $settings->facebook = $request->facebook;
        $settings->instagram = $request->instagram;
        $settings->twitter = $request->twitter;
        $settings->youtube = $request->youtube;
        $settings->aboutus = $request->aboutus;
        $settings->contact = $request->contact;
        $settings->referances = $request->referances;
        $settings->status = $request->status;

        $settings->save();
        return redirect()->route('admin_settings');

    }

    public function destroy(Setting $setting)
    {
        //
    }
}
