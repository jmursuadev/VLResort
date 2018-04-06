<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'user']);

        $admin = new User();
        $admin->name = 'jonathan admin';
        $admin->contact = '32132121';
        $admin->email = 'admin@dev.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->assignRole('admin');
    }
}
