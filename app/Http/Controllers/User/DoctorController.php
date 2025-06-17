<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Index\SearchRequest;
use App\Http\Resources\User\Doctor\DoctorCollection;
use App\Http\Resources\User\Doctor\DoctorResource;
use App\Models\Doctor;
use App\Http\Resources\User\Schedule\ScheduleCollection;
use App\Models\Schedule;


/**
 * @group User
 *
 * @subgroup Doctor
 */

class DoctorController extends Controller
{
    /**
     * Get Table Doctors
     *
     * @unauthenticated
     *
     *
     * Post: For Search
     *  "status": true,
     *  "data": []
     * }
     */
    public function get_doctors(SearchRequest $search)
    {
        $doctors = Doctor::query()
            ->search($search->search)
            ->with(['location', 'specialties'])
            ->orderByDesc('status')
            ->paginate(100);

        if (!$doctors) {
            return $this->not_found('هیچپگونه پزشکی موجود نیست');
        }

        return new DoctorCollection($doctors);
    }
    /**
     * Get A Doctor
     *
     * @unauthenticated
     *
     *  "status": true,
     *  "data": []
     * }
     */
    public function get_doctor($id)
    {
        $doctor = Doctor::query()
            ->with(['location', 'specialties'])
            ->where('id', $id)
            ->first();

        if (!$doctor) {
            return $this->not_found('پزشک پیدا نشد');
        }
        return new DoctorResource($doctor);
    }

          /**
     * Get Doctor's Schedule
     * 
     * @unauthenticated
     * 
     *  "status": true,
     *  "data": []
     * }
     */
        public function get_schedules($id)
    {
        $data = Schedule::query()
            ->where('doctor_id', $id)
            ->get();
        return new ScheduleCollection($data);
    }
}
