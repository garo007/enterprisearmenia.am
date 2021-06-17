<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'f_name'          => 'Arthur',
            'l_name'          => 'Hovakimyan',
            'email'          => 'arthur@example.com',
            'type'          => User::TYPE_ADMIN,
            'img'          => 'avatar.jpg',
            'phone_1'          => '555666777',
            'phone_2'          => '55566567',
            'password'       => bcrypt('password'),
            'remember_token' => Str::random(60),
        ]);
        User::create([
            'f_name'          => 'Daniel',
            'l_name'          => 'Hambardzumyan',
            'email'          => 'daniel@admin.com',
            'type'          => User::TYPE_ADMIN,
            'img'          => 'avatar.jpg',
            'phone_1'          => '555666777',
            'phone_2'          => '55566567',
            'password'       => bcrypt('password'),
            'remember_token' => Str::random(60),
        ]);

        User::create([
            'f_name'          => 'saqulik',
            'l_name'          => 'Saqulikyan',
            'email'          => 'saqulik@example.com',
            'type'          => User::TYPE_INVESTOR,
            'img'          => 'avatar.jpg',
            'phone_1'          => '555666777',
            'phone_2'          => '55566567',
            'password'       => bcrypt('password'),
            'remember_token' => Str::random(60),
        ]);

        User::create([
            'f_name'          => 'Gevorik',
            'l_name'          => 'Gevorikyan',
            'email'          => 'gevorik@example.com',
            'type'          => User::TYPE_INVESTOR,
            'img'          => 'avatar.jpg',
            'phone_1'          => '555666777',
            'phone_2'          => '55566567',
            'password'       => bcrypt('password'),
            'remember_token' => Str::random(60),
        ]);


    }
}
