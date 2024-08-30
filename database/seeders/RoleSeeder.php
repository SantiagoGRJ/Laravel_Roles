<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminRole = Role::create(['name' => 'admin']);
        $studentRole = Role::create(['name' => 'student']);

        // PERMISSION ADMIN
        Permission::create(['name' => 'admin.index','description' => 'Show Index Admin'])->assignRole($adminRole);

        // PERMISSION STUDENT
        Permission::create(['name' => 'student.index','description' => 'Show Index Student'])->syncRoles([$adminRole,$studentRole]);
    }
}
