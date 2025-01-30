<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        return view('setting',[
            "setting" => \App\Models\Setting::first()
        ]);
    }

    public function simpanSetting(Request $request){
        $setting = \App\Models\Setting::first();

        if($setting){
            $setting->update($request->all());
        }else{
            \App\Models\Setting::create($request->all());
        }

        return redirect()->back()->with("success","Setting berhasil disimpan");
    }
}
