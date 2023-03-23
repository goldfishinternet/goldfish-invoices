<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting = Setting::get()->first();

        return view('admin.setting.edit', compact('setting'));
    }
}
