<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvent;

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
        $permissionIds = Permission::pluck('id')->toArray();
        $role->permissions()->sync($permissionIds);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@mail.com',
            'password' => Hash::make('123456'),
            'role_id' => $role->id,
        ]);
    }
}
