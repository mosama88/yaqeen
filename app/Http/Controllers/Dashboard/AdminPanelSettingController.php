<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPanelSettingController extends Controller
{
    public function index()
    {
        return view('dashboard.settings.admin-panel-settings.index');
    }
}