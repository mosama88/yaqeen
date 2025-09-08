<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminPanelSettingRequest;
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

    public function update(AdminPanelSettingRequest $request, AdminPanelSetting $adminPanelSetting)
    {
        $userAuth = Auth::user()->id;
        $com_code = Auth::user()->com_code;
        $validateData = $request->validated();
        $dataUpdate = array_merge($validateData, [
            'updated_by' => $userAuth,
            'com_code' => $com_code,
        ]);

        // Remove old image if exists
        $adminPanelSetting->clearMediaCollection('logo');

        // Upload new image
        $adminPanelSetting->addMediaFromRequest('logo')
            ->toMediaCollection('logo');


        $adminPanelSetting->update($dataUpdate);
        return redirect()->route('dashboard.admin-panel-settings.index')->with('success', 'تم تعديل بيانات الشركة بنجاح');
    }
}