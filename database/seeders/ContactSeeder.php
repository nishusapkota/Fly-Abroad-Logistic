<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Contact::create([
            'phone' => json_encode([
                '1' => '9800000000',
                '2' => '9812389765',
            ]),
            'email' => json_encode([
                '1' => 'abc@gmail.com',
                '2' => 'xyz@gmail.com',
            ]),
            'location' => 'Baneshwor, Kathmandu',
            'link' => 'https://maps.googleapis.com/maps/',
        ]);
    }
    
}
