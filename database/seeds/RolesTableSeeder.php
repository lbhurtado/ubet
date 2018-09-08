<?php

use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keys = [
          'admin',
          'client',
          'server',
        ];

        foreach ($keys as $key) {
            Role::firstOrCreate([
                'name' => $key,
            ]);
        }

        $adminRole = Role::where('name','admin')->first();
        $adminRole->permissions()->detach();

        Permission::all()->each(function($permission) use ($adminRole) {
            $permission->roles()->attach($adminRole);
        });

    }
}
