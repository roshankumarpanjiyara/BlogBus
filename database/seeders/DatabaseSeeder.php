<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::create([
            'id'=>'1',
            'name' => 'Super Admin'
        ]);
        Role::create([
            'id'=>'2',
            'name' => 'Admin'
        ]);
        Permission::create([
            'role_id' => 1,
            'name' => ['role'=>['can-view'=>'1'],
                       'permission'=>['can-view'=>'1'],
                       'user'=>['can-view'=>'1'],
                       'catelog'=>['can-view'=>'1'],
                       'pending'=>['can-view'=>'1'],
                       'advertisement'=>['can-view'=>'1'],
                       'contact'=>['can-view'=>'1'],
                        ]
        ]);
        Permission::create([
            'role_id' => 2,
            'name' => [
                       'catelog'=>['can-view'=>'1'],
                       'pending'=>['can-view'=>'1'],
                        ]
        ]);
        Admin::create([
            'id'=>'1',
            'name' => 'Super Admin',
            'username' => 'super_admin',
            'email' => 'roshanpanjiyara055@gmail.com',
            'email_verified_at'=> NOW(),
            'password'=>bcrypt('password'),
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'Roshan Kumar',
            'username' => 'roshan_kumar',
            'email' => 'evanxkumar@gmail.com',
            'email_verified_at'=> NOW(),
            'password'=>bcrypt('123456789'),
        ]);
        // {"role":{"can-add":"1","can-edit":"1","can-delete":"1","can-view":"1","can-list":"1"},"permission":{"can-add":"1","can-edit":"1","can-delete":"1","can-view":"1","can-list":"1"},"user":{"can-add":"1","can-edit":"1","can-delete":"1","can-view":"1","can-list":"1"},"catelog":{"can-add":"1","can-edit":"1","can-delete":"1","can-view":"1","can-list":"1"},"pending":{"can-add":"1","can-edit":"1","can-delete":"1","can-view":"1","can-list":"1"}}
    }
}
