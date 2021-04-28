<?php

use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Md Supplier Rahman',
            'email' => 'supplier@gmail.com',
            'password' => bcrypt('12345678'),
            'phone'=>'01925555115',
            'image'=>'defaultphoto.png',

        ]);
    }
}
