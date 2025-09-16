<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InvItemCard;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Dashboard\InvItemCardRequest;

class InvItemCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.settings.inv_item_cards.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.inv_item_cards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvItemCardRequest $request)
    {
        try {
            $com_code = Auth::user()->com_code;
            $validateData = $request->validated();
            $validateData['com_code'] = $com_code;
            $validateData['created_by'] = Auth::user()->id;
            InvItemCard::create($validateData);
            return redirect()->route('dashboard.invItemCards.index')->with('success', 'تم إضافة الخزنه بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.invItemCards.index')
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(InvItemCard $invItemCard)
    {
        $com_code = Auth::user()->com_code;

        return view('dashboard.settings.inv_item_cards.show', compact('invItemCard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvItemCard $invItemCard)
    {
        return view('dashboard.settings.inv_item_cards.edit', compact('invItemCard'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(InvItemCardRequest $request, InvItemCard $invItemCard)
    {
        try {
            $com_code = Auth::user()->com_code;
            $validateData = $request->validated();
            $validateData['com_code'] = $com_code;
            $validateData['updated_by'] = Auth::user()->id;
            $invItemCard->update($validateData);
            return redirect()->route('dashboard.invItemCards.index')->with('success', 'تم تعديل الخزنه بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->route('dashboard.invItemCards.index')
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvItemCard $invItemCard)
    {
        try {
            $com_code = Auth::user()->com_code;

            // Verify the invItemCard belongs to the user's company before deleting
            if ($invItemCard->com_code != $com_code) {
                return response()->json([
                    'success' => false,
                    'message' => 'غير مصرح لك بحذف هذه الخزنة'
                ], 403);
            }

            $invItemCard->delete();
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
