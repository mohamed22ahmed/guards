<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = ['web'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'birth_date',
        'phone',
        'national_id',
        'another_phone',
        'occupation',
        'company_name',
        'is_insured',
        'insurance_provider',
        'sap_id',
        'city_clinic_id',
        'account_status',
        'relative_id'
    ];

    public function relatives(): HasMany
    {
        return $this->hasMany(Relative::class, 'relative_id', 'id');
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(PatientAppointment::class, 'patient_id', 'id');
    }

    public function lapResults(): HasMany
    {
        return $this->hasMany(lapResults::class, 'patient_id', 'id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}