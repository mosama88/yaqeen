<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\StatusActiveEnum;

class InvItemCategoryRequest extends FormRequest
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
        $invItemCategoryId = $this->route('invItemCategory') ? $this->route('invItemCategory')->id : null;

        return [
            'name' => 'required|string|max:255|unique:inv_item_categories,name,' . $invItemCategoryId,
            'active' => [
                'nullable',
                Rule::in(array_column(StatusActiveEnum::cases(), 'value')),
            ],
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'اسم فئة الصنف مطلوب.',
            'name.unique' => 'اسم فئة الصنف موجودة بالفعل.',
            'name.string'   => 'اسم فئة الصنف يجب أن يكون نص.',
            'name.max'      => 'اسم فئة الصنف لا يجب أن يزيد عن 255 حرف.',

            'active.in'       => 'حالة التفعيل (الحالة غير موجودة).',

        ];
    }
}
