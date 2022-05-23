<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doctor::create([
            'name' => 'doctor',
            'scientific_degree' => 'BC',
            'specialty' => 'Head',
            'subspecialty' => 'brain',
            'national_id' => '123654789632',
            'phone' => '01123654789',
            'password' => bcrypt('12345678'),
            'email' => 'doctor@gmail.com',
            'clinic_address' => 'Assiut',
            'clinic_phone_number' => '012365456636',
            'assistant_name' => 'Assistant',
            'assistant_phone_number' => '45485858',
            'clinical_fees' => 20,
            'segment_served' => 1
        ]);
    }
}