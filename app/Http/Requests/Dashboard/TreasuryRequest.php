<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\StatusActiveEnum;
use App\Enums\Treasury\TreasuryIsMaster;
use App\Models\Treasury;
use Illuminate\Support\Facades\Auth;


class TreasuryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $treasuryId = $this->route('treasury') ? $this->route('treasury')->id : null;

        return [
            'name' => 'required|string|max:255|unique:treasuries,name,' . $treasuryId,
            'is_master' => [
                'required',
                Rule::in(array_column(TreasuryIsMaster::cases(), 'value')),
                function ($attribute, $value, $fail) use ($treasuryId) {
                    $com_code = Auth::user()->com_code;

                    // If trying to set as master, check if another master already exists
                    if ($value == TreasuryIsMaster::Master->value) {
                        $existingMaster = Treasury::where('com_code', $com_code)
                            ->where('is_master', TreasuryIsMaster::Master->value)
                            ->when($treasuryId, function ($query) use ($treasuryId) {
                                $query->where('id', '!=', $treasuryId);
                            })
                            ->exists();

                        if ($existingMaster) {
                            $fail('يوجد بالفعل خزنة رئيسية واحدة. لا يمكن وجود أكثر من خزنة رئيسية.');
                        }
                    }
                },
            ],
            'active' => [
                'nullable',
                Rule::in(array_column(StatusActiveEnum::cases(), 'value')),
            ],
            'last_payment_receipt' => 'required|integer|min:0',
            'last_collection_receipt' => 'required|integer|min:0',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'اسم الخزينة مطلوب.',
            'name.unique' => 'اسم الخزينة موجودة بالفعل.',
            'name.string'   => 'اسم الخزينة يجب أن يكون نص.',
            'name.max'      => 'اسم الخزينة لا يجب أن يزيد عن 255 حرف.',

            'active.in'       => 'حالة التفعيل (الحالة غير موجودة).',

            'is_master.required' => 'حالة الخزينة مطلوبة.',
            'is_master.in'       => 'حالة الخزينة يجب أن تكون إما  (فرعية) أو  (رئيسية).',

            'last_collection_receipt.required' => 'آخر رقم إيصال تحصيل نقدية لهذه الخزينه مطلوب.',
            'last_collection_receipt.integer' => 'آخر رقم إيصال تحصيل نقدية لهذه الخزينه يجب أن يكون رقم.',
            'last_collection_receipt.min' => 'آخر رقم إيصال تحصيل نقدية لهذه الخزينه يجب أن يكون رقم موجب أو يساوي صفر.',

            'last_payment_receipt.required' => 'آخر رقم إيصال صرف نقدية لهذه الخزينه مطلوب.',
            'last_payment_receipt.integer' => 'آخر رقم إيصال صرف نقدية لهذه الخزينه يجب أن يكون رقم.',
            'last_payment_receipt.min' => 'آخر رقم إيصال صرف نقدية لهذه الخزينه يجب أن يكون رقم موجب أو يساوي صفر.',
        ];
    }
}