<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = Permission::pluck('id','id')->all();

        $roleAdmin = Role::create(['name' => 'Super Admin']);
        $roleAdmin->syncPermissions($permissions);

        $roleVisitante = Role::create(['name' => 'Visitante']);
        $roleVisitante->syncPermissions([]);

        $user = User::create([
            'name' => 'Paulo Rodrigues',
            'email' => 'paulo@voope.com.br',
            'password' => bcrypt('p4p4l3gu45')
        ]);

        $user->assignRole([$roleAdmin->id]);

        $user = User::create([
            'name' => 'Paulo Junior',
            'email' => 'pj@voope.com.br',
            'password' => bcrypt('p4p4l3gu45')
        ]);

        $user->assignRole([$roleAdmin->id]);
    }
}
