<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(["name" => "Admin"]);
        $role2 = Role::create(["name" => "User"]);

        Permission::create(["name" => "flower.create"])->assignRole($role1);
        Permission::create(["name" => "flower.edit"])->assignRole($role1);

        Permission::create(["name" => "bouquet.create"])->assignRole($role1);
        Permission::create(["name" => "bouquet.edit"])->assignRole($role1);

        Permission::create(["name" => "combo.create"])->assignRole($role1);
        Permission::create(["name" => "combo.edit"])->assignRole($role1);

        Permission::create(["name" => "candy.create"])->assignRole($role1);
        Permission::create(["name" => "candy.edit"])->assignRole($role1);

        Permission::create(["name" => "panel.index"])->assignRole($role1);
        
    }
}
