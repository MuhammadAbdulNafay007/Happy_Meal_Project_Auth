<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $password = Hash::make('admin');
       $adminRecords = [
            ['id'=>1, 'username'=>'admin', 'password'=>$password],
       ];
       Admin::insert($adminRecords);
    }
}
