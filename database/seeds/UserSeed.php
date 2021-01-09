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
            'name' => 'Super Admin',
            'email' => 'superadmin@hotelierhub.net',
            'password' => bcrypt('password'),
            'type' => 'platform',
            'avatar' => '/images/avatar/default-avatar.jpg'
        ]);
        $user->assignRole('super-admin');

        $user = User::create([
            'name' => 'Admin Hotelier Hub',
            'email' => 'admin@hotelierhub.net',
            'password' => bcrypt('password'),
            'type' => 'platform',
            'avatar' => '/images/avatar/default-avatar.jpg'
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'User Hotelier Hub',
            'email' => 'user@hotelierhub.net',
            'password' => bcrypt('password'),
            'type' => 'platform',
            'avatar' => '/images/avatar/default-avatar.jpg'
        ]);
        $user->assignRole('user');
    }
}
