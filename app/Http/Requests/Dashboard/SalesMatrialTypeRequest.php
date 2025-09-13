<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\StatusActiveEnum;

class SalesMatrialTypeRequest extends FormRequest
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

            'active' => [
                'nullable',
                Rule::in(array_column(StatusActiveEnum::cases(), 'value')),
            ],
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'اسم فئة الفاتورة مطلوب.',
            'name.unique' => 'اسم فئة الفاتورة موجودة بالفعل.',
            'name.string'   => 'اسم فئة الفاتورة يجب أن يكون نص.',
            'name.max'      => 'اسم فئة الفاتورة لا يجب أن يزيد عن 255 حرف.',

            'active.in'       => 'حالة التفعيل (الحالة غير موجودة).',

        ];
    }
}
