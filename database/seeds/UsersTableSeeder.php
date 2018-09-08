<?php

use App\{
    Admin,
    Client,
    Server,
    Merchant,
    PhoneNumber
};
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PhoneNumber::class)->create([
            'phone_number'     => decrypt('eyJpdiI6InBNQzljQVZiaUd4Vk1LUmlcL1orMG5BPT0iLCJ2YWx1ZSI6IkFxRnZLWnI2RlpaWXNFU2hGV3N5S0hKdUgzSEtlWVFIQTJqd1dDcnNSMGs9IiwibWFjIjoiNzEzM2ZlZmI2NTE2ZWFiY2Y5MWMzYzYyMjc5ODRmMGVhOTgxZDcyNGJlMTYzYmM5NmY1ZWMzYjYxMjcwZDliNSJ9'),
            'dialling_code_id' => 171,
            'identifier'       =>
                factory(Admin::class)->create([
                    'name'           => decrypt('eyJpdiI6InZkRUpOYXdoSENKOTkzYTBBYmoyVnc9PSIsInZhbHVlIjoibDQyRWFIcmVEWWEwcmhjdGhualdxQ2c1ZE5CTVB5NzlUTFdieWN2SjFRdz0iLCJtYWMiOiIxMTMwZmRlYzFkZjhlMGE2NjA1NzUyMjFiNmI3NDQ5NjNhMjdmY2U1YTdiMzk2ODVjNGQ0YzVkNDliNjY3OTllIn0='),
                    'email'          => decrypt('eyJpdiI6IkFNTHo1bTJGcytSZnV0RkFPa2ZiVGc9PSIsInZhbHVlIjoieHJHejZUR2xUYnZJMWNDbjkrT25YYzduS3BYZkVBRlFvNUNjQm16UkRpUT0iLCJtYWMiOiIyZmU5MzA0YmRhNDNlYmExNTNkZmVhODI3YjI2YjYwMzhlOTE0OTgyZjIyN2NjMTM1MmU2OTZiYWQxOGQ3YjE2In0='),
                    'password'       => '$2y$10$gz7MXG5YLhKykthNDjkfWu.fV80v.WpS..xn3T5SOza2Vo7tfGHtG',
                    'remember_token' => null
                ])->identifier
        ]);

        factory(PhoneNumber::class)->create([
            'phone_number'     => '9175180722',
            'dialling_code_id' => 171,
            'identifier'       =>
                factory(Client::class)->create([
                    'name'           => 'Apple P. Hurtado',
                    'email'          => 'apple@hurtado.ph',
                    'password'       => '$2y$10$gz7MXG5YLhKykthNDjkfWu.fV80v.WpS..xn3T5SOza2Vo7tfGHtG',
                    'remember_token' => null
                ])->identifier
        ]);

        factory(PhoneNumber::class)->create([
            'phone_number'     => '9285243656',
            'dialling_code_id' => 171,
            'identifier'       =>
                factory(Server::class)->create([
                    'name'           => 'Amelia P. Hurtado',
                    'email'          => 'amelia@hurtado.ph',
                    'password'       => '$2y$10$gz7MXG5YLhKykthNDjkfWu.fV80v.WpS..xn3T5SOza2Vo7tfGHtG',
                    'remember_token' => null
                ])->identifier
        ]);

        factory(PhoneNumber::class)->create([
            'phone_number'     => '9399236237',
            'dialling_code_id' => 171,
            'identifier'       =>
                factory(Merchant::class)->create([
                    'name'           => 'Sofia P. Hurtado',
                    'email'          => 'sofia@hurtado.ph',
                    'password'       => '$2y$10$gz7MXG5YLhKykthNDjkfWu.fV80v.WpS..xn3T5SOza2Vo7tfGHtG',
                    'remember_token' => null
                ])->identifier
        ]);
    }
}
