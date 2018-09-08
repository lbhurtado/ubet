<?php

use App\Role;
use App\Admin;
use App\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keys = [
            'create admin',
              'read admin',
            'update admin',
            'delete admin',
           'create server',
             'read server',
           'update server',
           'delete server',
           'create client',
             'read client',
           'update client',
           'delete client',
         'create merchant',
           'read merchant',
         'update merchant',
         'delete merchant',
          'create balance',
            'read balance',
          'update balance',
          'delete balance',
             'create task',
               'read task',
             'update task',
             'delete task',
           'create ticket',
             'read ticket',
           'update ticket',
           'delete ticket',
          'create article',
            'read article',
          'update article',
          'delete article',
        ];

        foreach ($keys as $key) {
            Permission::firstOrCreate([
                'name' => $key,
            ]);
        }
    }
}
