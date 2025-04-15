<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSettingRequest;

class SettingController extends Controller
{

    public function index()
    {
        return view('admin.setting.index');
    }

    public function listAll()
    {
        $settings = Setting::all();
        return view('admin.setting.list', [
            'settings' => $settings
        ]);
    }

    public function create()
    {
        return view('admin/setting/form', [
            'formTitle' => 'New setting',
            'formUrl' => 'admin/settings',
        ]);
    }

    public function store(StoreSettingRequest $request)
    {
        $data = $request->all();

        Setting::create($data);

        return response()->json(['message' => ['Setting is successfully added!']]);
    }

    public function edit(Setting $setting)
    {
        return view('admin/setting/form', [
            'formTitle' => 'Edit '.$setting->name,
            'formUrl' => 'admin/settings/'.$setting->id,
            'item' => $setting,
        ]);
    }

    public function update(StoreSettingRequest $request, Setting $setting)
    {
        $data = $request->all();

        $setting->update($data);

        return response()->json(['message' => ['Setting is successfully updated!']]);
    }

}
