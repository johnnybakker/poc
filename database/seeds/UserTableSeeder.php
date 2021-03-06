<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin  = Role::where('name', 'admin')->first();
        $user = new User();
        $user->name = 'User';
        $user->email = 'user@mail.com';
        $user->password = Hash::make('user');
        $user->save();
        $user->roles()->attach($role_user);
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@mail.com';
        $admin->password = Hash::make('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
