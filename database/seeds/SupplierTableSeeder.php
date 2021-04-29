<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Md Supplier Rahman',
            'email' => 'supplier@gmail.com',
            'phone'=>'01925555115',
            'role'=>'supplier',
            'image'=>'defaultphoto.png',

            'password' => Hash::make('password'),
        ]);
    }
}
