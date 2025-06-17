<?php

namespace App\Models;

use App\Http\Resources\User\Doctor\DoctorResource;
use App\Models\Enums\DoctorStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Doctor extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => DoctorStatusEnum::class,
        'phone_numbers' => 'array',
        'addresses' => 'array',
        'work_plans' => 'array'
    ];

    public static function get_popular_doctors($id)
    {

        $doctor = Doctor::query()
            ->whereHas('specialties', function ($query) use ($id) {
                $query->where('specialty_id', $id);
            })
            ->with('specialties', 'location')
            ->orderByDesc('status')
            ->get();


        return new DoctorResource($doctor);
    }

    public static function get_oldest_doctors($id)
    {
        $doctor = Doctor::query()
            ->whereHas('specialties')
            ->with('specialties', 'location')
            ->orderBy('created_at')
            ->get();


        return new DoctorResource($doctor);
    }

    public static function get_nearest_doctors($userLat, $userLng)
    {
        $doctor = Doctor::query()
            ->select(
                '*',
                DB::raw("(
                6371 * acos(
                cos(radians($userLat)) *
                cos(radians(doctors.latitude)) *
                cos(radians(doctors.longitude) - radians($userLng)) +
                sin(radians($userLat)) *
                sin(radians(doctors.latitude))
                 )
                 ) AS distance")
            )
            ->with('location', 'specialties')
            ->orderBy('distance');

        return new DoctorResource($doctor);
    }

    public function appoinments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function specialties(): BelongsToMany
    {
        return $this->belongsToMany(Specialty::class);
    }

    public function location(): BelongsTo
    {
        return $this->BelongsTo(Location::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    public function scopeSearch(Builder $builder, string|null $keyword): Builder
    {
        if (!$keyword) {
            $keyword = '';
        }
        $keywords = preg_split('/\s+/', $keyword, -1, PREG_SPLIT_NO_EMPTY);

        return $builder->where(function ($query) use ($keywords) {
            foreach ($keywords as $word) {
                $query->where(function ($q) use ($word) {
                    $q->where('first_name', 'like', "%{$word}%")
                        ->orWhere('last_name', 'like', "%{$word}%")
                        ->orWhereHas('specialties', fn($sp) => $sp->where('specialty', 'like', "%{$word}%"))
                        ->orWhereHas('location', fn($loc) => $loc->where('city', 'like', "%{$word}%"));
                });
            }
        });
    }
}


