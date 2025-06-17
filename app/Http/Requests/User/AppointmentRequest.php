<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'doctor_id' => 'required',
            'schedule_id' => 'required',
            'status' => 'required|string',
            'amount' => 'required|string',
            'appointment_time' => 'required|string',
            'appointment_date' => 'required|string'
        ];
    }
    public function messages(): array
    {
        return [
            'user_id.required' => 'شناسه کاربر الزامی است',
            'doctor_id.required' => 'پزشک را انخاب کنید',
            'schedule_id.required' => 'شناسه برنامه زمان‌بندی الزامی است',
            'amount.required' => 'مبلغ الزامی است',
            'appointment_time.required' => 'زمان وقت ملاقات الزامی است',
            'appointment_date.required' => 'تاریخ وقت ملاقات الزامی است',
        ];
    }
}
