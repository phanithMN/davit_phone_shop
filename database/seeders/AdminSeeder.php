<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
            'name' => 'Admin',
            // 'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'), 
            // 'role' => '0'
        ]);
    }
}
