<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            // Admin operator (para el login)
            [
                'id' => '019e809c-f371-71b9-ba93-5bbc97b5c23d',
                'name'       => 'Admin Admin',
                'email'      => 'admin@test.com',
                'phone'      => '+52 55 0000 0001',
                'country'    => 'MX',
                'password'   => Hash::make('123456'),
                'role'       => "admin"
            ],
            // Clientes de las órdenes
            ['id' => '019e809c-f375-7322-98bb-1968c4419322', 'name' => 'Sofía Ramírez',   'email' => 'sofia@empresa.mx',    'phone' => '+52 55 1234 0001', 'country' => 'MX', 'password' => Hash::make('password')/*, 'created_at' => '2024-05-01 10:00:00', 'updated_at' => '2024-05-01 10:00:00'*/],
            ['id' => '019e809c-f376-72a6-86ac-51fbac188db2', 'name' => 'Carlos Mendez',   'email' => 'cmendez@corp.com',    'phone' => '+1 415 555 0002',  'country' => 'US', 'password' => Hash::make('password')/*, 'created_at' => '2024-05-02 10:00:00', 'updated_at' => '2024-05-02 10:00:00'*/],
            ['id' => '019e809c-f377-720a-a3cd-654286b7dca3', 'name' => 'Ana Torres',       'email' => 'ana.t@mail.com',      'phone' => '+52 33 2345 0003', 'country' => 'MX', 'password' => Hash::make('password')/*, 'created_at' => '2024-05-03 10:00:00', 'updated_at' => '2024-05-03 10:00:00'*/],
            ['id' => '019e809c-f377-720a-a3cd-654287813624', 'name' => 'Luis García',      'email' => 'lgarcia@biz.io',      'phone' => '+1 212 555 0004',  'country' => 'US', 'password' => Hash::make('password')/*, 'created_at' => '2024-05-04 10:00:00', 'updated_at' => '2024-05-04 10:00:00'*/],
            ['id' => '019e809c-f377-720a-a3cd-654287bee4e2', 'name' => 'María López',      'email' => 'mlopez@fin.mx',       'phone' => '+52 55 3456 0005', 'country' => 'MX', 'password' => Hash::make('password')/*, 'created_at' => '2024-05-05 10:00:00', 'updated_at' => '2024-05-05 10:00:00'*/],
            ['id' => '019e809c-f378-73e3-80c2-e111497298bb', 'name' => 'Pedro Sanz',       'email' => 'p.sanz@ops.com',      'phone' => '+1 305 555 0006',  'country' => 'US', 'password' => Hash::make('password')/*, 'created_at' => '2024-05-06 10:00:00', 'updated_at' => '2024-05-06 10:00:00'*/],
            ['id' => '019e809c-f378-73e3-80c2-e111498c67d0', 'name' => 'Laura Vega',       'email' => 'lvega@startup.io',    'phone' => '+52 55 4567 0007', 'country' => 'MX', 'password' => Hash::make('password')/*, 'created_at' => '2024-05-07 10:00:00', 'updated_at' => '2024-05-07 10:00:00'*/],
            ['id' => '019e809c-f379-71f7-89b3-964523d680a5', 'name' => 'Diego Reyes',      'email' => 'dreyes@acme.com',     'phone' => '+1 646 555 0008',  'country' => 'US', 'password' => Hash::make('password')/*, 'created_at' => '2024-05-08 10:00:00', 'updated_at' => '2024-05-08 10:00:00'*/],
            ['id' => '019e809c-f379-71f7-89b3-96452469f9b5', 'name' => 'Valeria Cruz',     'email' => 'vcruz@tech.mx',       'phone' => '+52 81 5678 0009', 'country' => 'MX', 'password' => Hash::make('password')/*, 'created_at' => '2024-05-09 10:00:00', 'updated_at' => '2024-05-09 10:00:00'*/],
            ['id' => '019e809c-f379-71f7-89b3-9645250d1b2f', 'name' => 'Roberto Kim',      'email' => 'rkim@global.co',      'phone' => '+82 2 555 0010',   'country' => 'KR', 'password' => Hash::make('password')/*, 'created_at' => '2024-05-10 10:00:00', 'updated_at' => '2024-05-10 10:00:00'*/],
            ['id' => '019e809c-f37a-7373-b365-c0d8980be30a', 'name' => 'Elena Mora',       'email' => 'emora@pay.mx',        'phone' => '+52 55 6789 0011', 'country' => 'MX', 'password' => Hash::make('password')/*, 'created_at' => '2024-05-11 10:00:00', 'updated_at' => '2024-05-11 10:00:00'*/],
            ['id' => '019e809c-f37a-7373-b365-c0d8980c14f4', 'name' => 'Andrés Ruiz',      'email' => 'aruiz@fin.com',       'phone' => '+1 786 555 0012',  'country' => 'US', 'password' => Hash::make('password')/*, 'created_at' => '2024-05-12 10:00:00', 'updated_at' => '2024-05-12 10:00:00'*/],
            ['id' => '019e809c-f37b-729c-9c2b-2861da02d495', 'name' => 'Camila Nieto',     'email' => 'cnieto@shop.mx',      'phone' => '+52 55 7890 0013', 'country' => 'MX', 'password' => Hash::make('password')/*, 'created_at' => '2024-05-13 10:00:00', 'updated_at' => '2024-05-13 10:00:00'*/],
            ['id' => '019e809c-f37c-70d7-b002-5425fe551936', 'name' => 'Héctor Flores',    'email' => 'hflores@corp.io',     'phone' => '+1 713 555 0014',  'country' => 'US', 'password' => Hash::make('password')/*, 'created_at' => '2024-05-14 10:00:00', 'updated_at' => '2024-05-14 10:00:00'*/],
            ['id' => '019e809c-f37c-70d7-b002-5425ff4676c5', 'name' => 'Isabella Wong',    'email' => 'iwong@tech.com',      'phone' => '+852 555 0015',    'country' => 'HK', 'password' => Hash::make('password')/*, 'created_at' => '2024-05-15 10:00:00', 'updated_at' => '2024-05-15 10:00:00'*/],
        ];

        foreach($users as $user) {
            $fullName = explode(' ', $user["name"]);
            User::create([
                'id' => $user["id"],
                'name' => $fullName[0],
                'last_name' => $fullName[1],
                'email' => $user["email"],
                'phone' => $user["phone"],
                'country' => $user["country"],
                'password' => $user["password"],
                'role' => $user["role"] ?? "user"
            ]);
        }
    }
}