<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\StoreRequest;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.settings.stores.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.stores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $com_code = Auth::user()->com_code;
            $validateData = $request->validated();
            $validateData['com_code'] = $com_code;
            $validateData['created_by'] = Auth::user()->id;
            Store::create($validateData);
            return redirect()->route('dashboard.stores.index')->with('success', 'تم إضافة المخزن بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.stores.index')
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        $com_code = Auth::user()->com_code;
        return view('dashboard.settings.stores.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        $com_code = Auth::user()->com_code;
        return view('dashboard.settings.stores.edit', compact('store'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Store $store)
    {
        try {
            $com_code = Auth::user()->com_code;
            $validateData = $request->validated();
            $validateData['com_code'] = $com_code;
            $validateData['updated_by'] = Auth::user()->id;
            $store->update($validateData);
            return redirect()->route('dashboard.stores.index')->with('success', 'تم تعديل المخزن بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.stores.index')
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        try {
            $com_code = Auth::user()->com_code;

            // Verify the store belongs to the user's company before deleting
            if ($store->com_code != $com_code) {
                return response()->json([
                    'success' => false,
                    'message' => 'غير مصرح لك بحذف هذه الخزنة'
                ], 403);
            }

            $store->delete();
            return response()->json([
                'success' => true,
                'message' => 'تم حذف المخزن بنجاح'
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
