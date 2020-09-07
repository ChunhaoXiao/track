<?php

use Illuminate\Database\Seeder;
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
        $admin = [
            'name' => 'admin',
            'password' => 'admin',
        ];

       Admin::firstOrCreate(['name' => $admin['name']], $admin);
    }
}
