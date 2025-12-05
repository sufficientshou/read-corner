<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'nama' => 'Fajar Abdilah',
            'email' => 'fajar@gmail.com',
            'password' => Hash::make('12345678'), // Hash password sebelum disimpan
            'role' => 'admin',  
        ]);
    }
}
