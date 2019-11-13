<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'is_admin'  =>  1,
            'email'     =>  'admin@admin.com',
            'password'  =>  bcrypt('secret')
        ]);

//        factory(\App\User::class, 20)->create();
    }
}
