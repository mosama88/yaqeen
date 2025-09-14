<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InvItemCategory;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Dashboard\InvItemCategoryRequest;

class InvItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.settings.inv_item_categories.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.inv_item_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvItemCategoryRequest $request)
    {
        try {
            $com_code = Auth::user()->com_code;
            $validateData = $request->validated();
            $validateData['com_code'] = $com_code;
            $validateData['created_by'] = Auth::user()->id;
            InvItemCategory::create($validateData);
            return redirect()->route('dashboard.invItemCategory.index')->with('success', 'تم إضافة الوحدة بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.invItemCategory.index')
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(InvItemCategory $invItemCategory)
    {
        $com_code = Auth::user()->com_code;
        return view('dashboard.settings.inv_item_categories.show', compact('invItemCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvItemCategory $invItemCategory)
    {
        $com_code = Auth::user()->com_code;
        return view('dashboard.settings.inv_item_categories.edit', compact('invItemCategory'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(InvItemCategoryRequest $request, InvItemCategory $invItemCategory)
    {
        try {
            $com_code = Auth::user()->com_code;
            $validateData = $request->validated();
            $validateData['com_code'] = $com_code;
            $validateData['updated_by'] = Auth::user()->id;
            $invItemCategory->update($validateData);
            return redirect()->route('dashboard.invItemCategory.index')->with('success', 'تم تعديل الوحدة بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.invItemCategory.index')
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvItemCategory $invItemCategory)
    {
        try {
            $com_code = Auth::user()->com_code;

            // Verify the InvItemCategory belongs to the user's company before deleting
            if ($invItemCategory->com_code != $com_code) {
                return response()->json([
                    'success' => false,
                    'message' => 'غير مصرح لك بحذف هذه الخزنة'
                ], 403);
            }

            $invItemCategory->delete();
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