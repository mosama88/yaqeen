<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\TreasuryRequest;
use Illuminate\Http\Request;
use App\Models\Treasury;
use Illuminate\Support\Facades\Auth;

class TreasuryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = Auth::user()->com_code;
        $data = Treasury::orderByDesc('id')->where('com_code', $com_code)->paginate(10);
        return view('dashboard.settings.treasuries.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.treasuries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TreasuryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Treasury $treasury)
    {
        return view('dashboard.settings.treasuries.show', compact('treasury'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Treasury $treasury)
    {
        return view('dashboard.settings.treasuries.edit', compact('treasury'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Treasury $treasury)
    {
        try {
            $com_code = Auth::user()->com_code;

            $treasury->where('com_code', $com_code)->delete();
            return response()->json([
                'success' => true,
                'message' => 'تم حذف الخزنه بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء محاولة الحذف',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}