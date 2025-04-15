<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Setting;

class SettingsController extends Controller
{

    public function getAllSettings()
    {
        return Setting::all()->pluck('value', 'name');
    }

    public function getSettingByName($name)
    {
        return Setting::where('name', $name)->firstOrFail();
    }

}
