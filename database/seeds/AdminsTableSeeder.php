<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
          [
            'username'=>'admin',
            'email'=>'denisdzafo@gmail.com',
            'password'=>bcrypt("000000")
          ]
        ]);
    }
}