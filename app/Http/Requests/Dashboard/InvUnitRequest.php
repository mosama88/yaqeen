<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\StatusActiveEnum;
use App\Enums\Treasury\TreasuryIsMaster;

class InvUnitRequest extends FormRequest
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
        $invUnitId = $this->route('invUnit') ? $this->route('invUnit')->id : null;

        return [
            'name' => 'required|string|max:255|unique:inv_units,name,' . $invUnitId,
            'is_master' => [
                'required',
                Rule::in(array_column(TreasuryIsMaster::cases(), 'value')),
            ],
            'active' => [
                'nullable',
                Rule::in(array_column(StatusActiveEnum::cases(), 'value')),
            ],

        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'اسم الوحدة مطلوب.',
            'name.unique' => 'اسم الوحدة موجودة بالفعل.',
            'name.string'   => 'اسم الوحدة يجب أن يكون نص.',
            'name.max'      => 'اسم الوحدة لا يجب أن يزيد عن 255 حرف.',

            'active.in'       => 'حالة التفعيل (الحالة غير موجودة).',

            'is_master.required' => 'حالة الوحدة مطلوبة.',
            'is_master.in'       => 'حالة الوحدة يجب أن تكون إما  (فرعية) أو  (رئيسية).',

        ];
    }
}