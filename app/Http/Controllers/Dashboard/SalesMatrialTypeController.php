<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\SalesMatrialTypeRequest;
use App\Models\SalesMatrialType;
use Illuminate\Support\Facades\Auth;

class SalesMatrialTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.settings.sales_matrial_types.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.sales_matrial_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalesMatrialTypeRequest $request)
    {
        try {
            $com_code = Auth::user()->com_code;
            $validateData = $request->validated();
            $validateData['com_code'] = $com_code;
            $validateData['created_by'] = Auth::user()->id;
            SalesMatrialType::create($validateData);
            return redirect()->route('dashboard.sales_matrial_types.index')->with('success', 'تم إضافة فئات الفاتورة بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.sales_matrial_types.index')
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SalesMatrialType $salesMatrialType)
    {
        $com_code = Auth::user()->com_code;
        return view('dashboard.settings.sales_matrial_types.show', compact('salesMatrialType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesMatrialType $salesMatrialType)
    {
        $com_code = Auth::user()->com_code;
        return view('dashboard.settings.sales_matrial_types.edit', compact('salesMatrialType'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(SalesMatrialTypeRequest $request, SalesMatrialType $salesMatrialType)
    {
        try {
            $com_code = Auth::user()->com_code;
            $validateData = $request->validated();
            $validateData['com_code'] = $com_code;
            $validateData['updated_by'] = Auth::user()->id;
            $salesMatrialType->update($validateData);
            return redirect()->route('dashboard.sales_matrial_types.index')->with('success', 'تم تعديل فئات الفاتورة بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.sales_matrial_types.index')
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesMatrialType $salesMatrialType)
    {
        try {
            $com_code = Auth::user()->com_code;

            // Verify the salesMatrialType belongs to the user's company before deleting
            if ($salesMatrialType->com_code != $com_code) {
                return response()->json([
                    'success' => false,
                    'message' => 'غير مصرح لك بحذف هذه الخزنة'
                ], 403);
            }

            $salesMatrialType->delete();
            return response()->json([
                'success' => true,
                'message' => 'تم حذف فئات الفاتورة بنجاح'
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
