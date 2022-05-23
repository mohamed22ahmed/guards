<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'patient',
            'email' => 'patient@gmail.com',
            'password' => bcrypt('12345678'),
            'birth_date' => Carbon::parse('2000-01-01'),
            'phone' => '0123654789',
            'national_id' => '1477485228560',
            'occupation' => 'busy',
            'company_name' => 'compeast',
        ]);
    }
}