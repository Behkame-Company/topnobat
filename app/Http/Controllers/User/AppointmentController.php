<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AppointmentRequest;
use App\Http\Resources\User\Appointment\AppointmentResource;
use App\Http\Resources\User\Appointment\AppointmentCollection;
use App\Models\Appointment;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * @group User
 *
 * @subgroup Appointment
 */
class AppointmentController extends Controller
{
    /**
     * Showing Appointments
     * @authenticated
     * @response {
     *  "status": true,
     *  "data": []
     * }
     */
    public function get_appointments()
    {
        $user = Auth::user();

        $appointments = Appointment::query()
            ->where('user_id', $user->id)
            ->with([
                'schedule',
                'doctor',
            ])
            ->orderBy('created_at')
            ->paginate(10);
        return new AppointmentCollection($appointments);
    }
    /**
     * Creating The Appointment
     * @authenticated
     * @response {
     *  "status": true,
     *  "data": []
     * }
     */
    public function create_appointment(AppointmentRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();

        try {
            $appointment = Appointment::query()
                ->create([
                    'user_id' => $data['user_id'],
                    'schedule_id' => $data['schedule_id'],
                    'status' => $data['status'],
                    'appointment_time' => $data['appointment_time'],
                    'appointment_date' => $data['appointment_date']
                ]);

            Payment::query()
                ->create([
                    'appointment_id' => $appointment['id'],
                    'user_id' => $data['user_id'],
                    'doctor_id' => $data['doctor_id'],
                    'amount' => $data['amount'],
                    'status' => $data['status']
                ]);

            DB::commit();

            return new AppointmentResource($appointment);
        } catch (\Exception $e) {

            DB::rollBack();

            Log::error('Appointment creation failed: ' . $e->getMessage());

            return $this->error('خطا در ایجاد کاربر');
        }
    }
}
