<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'superadmin@hotelierhub.net',
            'password' => bcrypt('password'),
            'type' => 'platform',
            'avatar' => '/images/avatar/default-avatar.jpg'
        ]);
        $user->assignRole('super-admin');

        $user = User::create([
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'admin@hotelierhub.net',
            'password' => bcrypt('password'),
            'type' => 'platform',
            'avatar' => '/images/avatar/default-avatar.jpg'
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'user@hotelierhub.net',
            'password' => bcrypt('password'),
            'type' => 'platform',
            'avatar' => '/images/avatar/default-avatar.jpg'
        ]);
        $user->assignRole('user');
    }
}
