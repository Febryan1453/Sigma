<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        DB::table('users')->insert(array(
            array(
                'id'             => substr(str_shuffle($permitted_chars), 0, 12),
                'name'           => "Febryan",
                'email'          => "febryan1453@gmail.com",
                'password'       => Hash::make("febryan"),
                'role'           => 1,
            ),
            array(
                'id'             => substr(str_shuffle($permitted_chars), 0, 12),
                'name'           => "Dedi Gunawan",
                'email'          => "idn@idn.id",
                'password'       => Hash::make("idnhebat"),
                'role'           => 1,
            ),
        ));
    }
}
