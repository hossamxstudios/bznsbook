<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Subcategory;


class SettingController extends Controller{

    public function getSettings(){
        $setting = Setting::find(1);
        return response($setting,200);
    }

    public function updateSettings(Request $request){
        $setting = Setting::find(1);
        $setting->subcategory_id = $request->subcategory_id;
        $setting->open = $request->open;
        $setting->close = $request->close;
        $setting->phone = $request->phone;
        $setting->whatsapp = $request->whatsapp;
        $setting->init_game_score = $request->init_game_score;
        $setting->price_banner = $request->price_banner == 1 ? 1 : 0;
        $setting->email = $request->email;
        $setting->facebook = $request->facebook;
        $setting->instagram = $request->instagram;
        if ($setting->save()) {
            return response($setting,201);
        }else {
            return response('error',404);
        }
    }

    // -----------------  backend functions  -----------------

    public function getAllSettings(){
        $settings = Setting::find(1);
        return view('backend.settings',compact('settings'));
    }

    public function updateSettingsBackend(Request $request){
        $setting = Setting::find(1);
        $setting->subcategory_id = $request->subcategory_id;
        $setting->open = $request->open;
        $setting->close = $request->close;
        $setting->phone = $request->phone;
        $setting->whatsapp = $request->whatsapp;
        $setting->init_game_score = $request->init_game_score;
        $setting->price_banner = $request->price_banner == 1 ? 1 : 0;
        $setting->email = $request->email;
        $setting->facebook = $request->facebook;
        $setting->instagram = $request->instagram;
        if ($setting->save()) {
            return redirect()->route('backend.settings')->with('success','Settings updated successfully');
        }else {
            return redirect()->route('backend.settings')->with('error','Error updating settings');
        }
    }


}
