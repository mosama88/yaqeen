<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\InvUnitRequest;
use App\Models\InvUnit;
use Illuminate\Support\Facades\Auth;

class InvUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.settings.inv-units.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.inv-units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvUnitRequest $request)
    {
        try {
            $com_code = Auth::user()->com_code;
            $validateData = $request->validated();
            $validateData['com_code'] = $com_code;
            $validateData['created_by'] = Auth::user()->id;
            InvUnit::create($validateData);
            return redirect()->route('dashboard.invUnits.index')->with('success', 'تم إضافة الوحدة بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.invUnits.index')
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(InvUnit $invUnit)
    {
        $com_code = Auth::user()->com_code;
        return view('dashboard.settings.inv-units.show', compact('invUnit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvUnit $invUnit)
    {
        $com_code = Auth::user()->com_code;
        return view('dashboard.settings.inv-units.edit', compact('invUnit'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(InvUnitRequest $request, InvUnit $invUnit)
    {
        try {
            $com_code = Auth::user()->com_code;
            $validateData = $request->validated();
            $validateData['com_code'] = $com_code;
            $validateData['updated_by'] = Auth::user()->id;
            $invUnit->update($validateData);
            return redirect()->route('dashboard.invUnits.index')->with('success', 'تم تعديل الوحدة بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.invUnits.index')
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvUnit $invUnit)
    {
        try {
            $com_code = Auth::user()->com_code;

            // Verify the invUnit belongs to the user's company before deleting
            if ($invUnit->com_code != $com_code) {
                return response()->json([
                    'success' => false,
                    'message' => 'غير مصرح لك بحذف هذه الخزنة'
                ], 403);
            }

            $invUnit->delete();
            return response()->json([
                'success' => true,
                'message' => 'تم حذف الوحدة بنجاح'
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