<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = ['doctor'];
    protected $fillable = [
        'name',
        'scientific_degree',
        'specialty',
        'subspecialty',
        'national_id',
        'phone',
        'email',
        'clinic_address',
        'clinic_phone_number',
        'assistant_name',
        'assistant_phone_number',
        'clinical_fees',
        'segment_served',
        'upload_id',
        'upload_license',
        'upload_syndicate_id',
        'upload_commercial_register',
        'upload_tax_id',
        'sap_id',
        'city_clinic_id'
    ];
}