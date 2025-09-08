<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminPanelSetting;
use Illuminate\Support\Facades\Auth;

class AdminPanelSettingController extends Controller
{
    public function index()
    {
        $com_code = Auth::user()->com_code;
        $adminPanelSetting = AdminPanelSetting::where('com_code', $com_code)->first();
        return view('dashboard.settings.admin-panel-settings.index', compact('adminPanelSetting'));
    }


    public function edit(AdminPanelSetting $adminPanelSetting)
    {
        return view('dashboard.settings.admin-panel-settings.edit', compact('adminPanelSetting'));
    }
}