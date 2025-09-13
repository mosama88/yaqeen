<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\StatusActiveEnum;

class StoreRequest extends FormRequest
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
        $storeId = $this->route('store') ? $this->route('store')->id : null;

        return [
            'name' => 'required|string|max:255|unique:stores,name,' . $storeId,
            'phone' => 'required|string|max:255|unique:stores,phone,' . $storeId,
            'address' => 'required|string|max:500',

            'active' => [
                'nullable',
                Rule::in(array_column(StatusActiveEnum::cases(), 'value')),
            ],
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'اسم المخزن مطلوب.',
            'name.unique' => 'اسم المخزن موجودة بالفعل.',
            'name.string'   => 'اسم المخزن يجب أن يكون نص.',
            'name.max'      => 'اسم المخزن لا يجب أن يزيد عن 255 حرف.',

            'phone.required' => 'تليفون المخزن مطلوب.',
            'phone.unique' => 'تليفون المخزن موجودة بالفعل.',
            'phone.string'   => 'تليفون المخزن يجب أن يكون نص.',
            'phone.max'      => 'تليفون المخزن لا يجب أن يزيد عن 255 حرف.',

            'address.required' => 'عنوان المخزن مطلوب.',
            'address.unique' => 'عنوان المخزن موجودة بالفعل.',
            'address.string'   => 'عنوان المخزن يجب أن يكون نص.',
            'address.max'      => 'عنوان المخزن لا يجب أن يزيد عن 255 حرف.',

            'active.in'       => 'حالة التفعيل (الحالة غير موجودة).',

        ];
    }
}
