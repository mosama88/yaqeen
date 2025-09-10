<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\StatusActiveEnum;
use App\Enums\Treasury\TreasuryIsMaster;
use App\Models\Treasury;
use Illuminate\Support\Facades\Auth;


class TreasuryDeliveryRequest extends FormRequest
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
            'treasuries_can_delivery' => 'required|exists:treasuries,id',
            'active' => [
                'nullable',
                Rule::in(array_column(StatusActiveEnum::cases(), 'value')),
            ],

        ];
    }


    public function messages(): array
    {
        return [
            'treasuries_can_delivery.required' => 'حقل خزائن التسليم مطلوب.',
            'treasuries_can_delivery.exists' => 'الخزينة المختارة للتسليم غير موجودة في النظام.',

            'active.in' => 'قيمة الحالة غير صحيحة، من فضلك اختر حالة صالحة.',
        ];
    }
}
