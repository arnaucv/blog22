<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Rol();
        $role->rol = 'admin';
        $role->desc = 'something';
        $role->save();

        $role = new Rol();
        $role-> rol = 'user';
        $role->desc = 'something';
        $role->save();

        $role = new Rol();
        $role-> rol = 'loader';
        $role->desc = 'something';
        $role->save();

        $role = new Rol();
        $role-> rol = 'guest';
        $role->desc = 'something';
        $role->save();
    }
}
