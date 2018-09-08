<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('phone_numbers')->truncate();
        DB::table('users')->truncate();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();

        Schema::enableForeignKeyConstraints();

        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

    }
}
