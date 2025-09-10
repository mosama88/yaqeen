<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\TreasuryDeliveryRequest;
use App\Http\Requests\Dashboard\TreasuryRequest;
use Illuminate\Http\Request;
use App\Models\TreasuryDelivery;
use App\Models\Treasury;
use Illuminate\Support\Facades\Auth;

class TreasuryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.settings.treasuries.index');
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
        try {
            $com_code = Auth::user()->com_code;
            $validateData = $request->validated();
            $validateData['com_code'] = $com_code;
            $validateData['created_by'] = Auth::user()->id;
            Treasury::create($validateData);
            return redirect()->route('dashboard.treasuries.index')->with('success', 'تم إضافة الخزنه بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.treasuries.index')
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Treasury $treasury)
    {
        $com_code = Auth::user()->com_code;
        $treasuries = Treasury::select('id', 'name')->where('com_code', $com_code)->orderByDesc('id')->get();
        $treasury_deliveries = TreasuryDelivery::where('treasury_id', $treasury->id)->orderByDesc('id')->paginate(15);
        return view('dashboard.settings.treasuries.show', compact('treasury', 'treasury_deliveries', 'treasuries'));
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
    public function update(TreasuryRequest $request, Treasury $treasury)
    {
        try {
            $com_code = Auth::user()->com_code;
            $validateData = $request->validated();
            $validateData['com_code'] = $com_code;
            $validateData['updated_by'] = Auth::user()->id;
            $treasury->update($validateData);
            return redirect()->route('dashboard.treasuries.index')->with('success', 'تم تعديل الخزنه بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.treasuries.index')
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Treasury $treasury)
    {
        try {
            $com_code = Auth::user()->com_code;

            // Verify the treasury belongs to the user's company before deleting
            if ($treasury->com_code != $com_code) {
                return response()->json([
                    'success' => false,
                    'message' => 'غير مصرح لك بحذف هذه الخزنة'
                ], 403);
            }


            $treasury->delete();
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


    public function destroy_treasury_deliveries($id)
    {
        try {
            $com_code = Auth::user()->com_code;
            $treasury_delivery = TreasuryDelivery::find($id);

            // Verify the treasury delivery exists and belongs to the user's company before deleting
            if (!$treasury_delivery || $treasury_delivery->com_code != $com_code) {
                return response()->json([
                    'success' => false,
                    'message' => 'غير مصرح لك بحذف هذه الحركة'
                ], 403);
            }

            $treasury_delivery->delete();
            return response()->json([
                'success' => true,
                'message' => 'تم حذف الحركة بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء محاولة الحذف',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function store_treasury_deliveries($id, TreasuryDeliveryRequest $request)
    {
        $com_code = Auth::user()->com_code;
        $validateData = $request->validated();
        $validateData['com_code'] = $com_code;
        $validateData['treasury_id'] = $id; // Use the treasury ID from the route
        $validateData['created_by'] = Auth::user()->id;
        TreasuryDelivery::create($validateData);
        return redirect()->route('dashboard.treasuries.show', $id)->with('success', 'تم إضافة خزينة التسليم بنجاح');
    }
}
