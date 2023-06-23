<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nama' => 'Superadmin',
            'username' => 'superadmin',
            'akses_level' => 0,
            'password' => Hash::make('superadmin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'nama' => 'yoga',
            'username' => 'yoga',
            'akses_level' => 0,
            'password' => Hash::make('Welcomejmtm2023'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nama' => 'Muhammad Rusdi',
            'username' => '08728',
            'akses_level' => 0,
            'password' => Hash::make('JMTM-08728'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nama' => 'user',
            'username' => 'user',
            'akses_level' => 1,
            'password' => Hash::make('Welcomejmtm1!'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
