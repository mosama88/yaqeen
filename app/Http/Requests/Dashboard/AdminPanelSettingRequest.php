<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\StatusActiveEnum;

class AdminPanelSettingRequest extends FormRequest
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
        return [
            'company_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'logo' => 'nullable|image|max:5000',
            'active' => [
                'nullable',
                Rule::in(array_column(StatusActiveEnum::cases(), 'value')),
            ],

        ];
    }


    public function messages(): array
    {
        return [
            'company_name.required' => 'اسم الشركة مطلوب.',
            'company_name.string'   => 'اسم الشركة يجب أن يكون نص.',
            'company_name.max'      => 'اسم الشركة لا يجب أن يزيد عن 255 حرف.',

            'phone.required' => 'هاتف الشركة مطلوب.',
            'phone.string' => 'رقم الهاتف يجب أن يكون نص.',
            'phone.max'    => 'رقم الهاتف لا يجب أن يزيد عن 20 رقم.',

            'email.required' => 'بريد إلكتروني الشركة مطلوب.',
            'email.email' => 'يرجى إدخال بريد إلكتروني صالح.',
            'email.max'   => 'البريد الإلكتروني لا يجب أن يزيد عن 255 حرف.',

            'address.required' => 'عنوان الشركة مطلوب.',
            'address.string' => 'العنوان يجب أن يكون نص.',
            'address.max'    => 'العنوان لا يجب أن يزيد عن 255 حرف.',

            'active.in'       => 'حالة التفعيل (الحالة غير موجودة).',
        ];
    }
}