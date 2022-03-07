<?php

use Illuminate\Database\Seeder;
use App\Rol;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user=Rol::where('rol','user')->get();
        $role_admin=Rol::where('rol','admin')->get();
        $role_loader=Rol::where('rol','loader')->get();
        $role_guest=Rol::where('rol','guest')->get();
        $user = new User;
        $user->username = 'User';
        $user->email = 'user@example.com';
        $user->password = Hash::make('1234');
        $user->rol_id = Rol::where('rol','user')->first()->id;
        $user->save();

        $user= new User;
        $user->username = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = Hash::make('1234');
        $user->rol_id = Rol::where('rol','admin')->first()->id;
        $user->save();

        $user= new User;
        $user->username = 'Loader';
        $user->email = 'loader@example.com';
        $user->password = Hash::make('1234');
        $user->rol_id = Rol::where('rol','loader')->first()->id;
        $user->save();

        $user= new User;
        $user->username = 'Guest';
        $user->email = 'guest@example.com';
        $user->password = Hash::make('1234');
        $user->rol_id = Rol::where('rol','guest')->first()->id;
        $user->save();

    }
}
