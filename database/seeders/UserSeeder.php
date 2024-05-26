<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $dataUser = [
            'email' => 'admin.jornadas@gmail.com',
            'password' => Hash::make('password'),
            'name' => 'Administrador',
            'last_name' => 'System',
            'doc_type' => 'CC',
            'document' => '77777777',
            'phone_number' => '3179998888',
            'is_technical' => 0,
        ];

        User::create($dataUser);
        
        $dataUser = [
            'email' => 'tecnico@gmail.com',
            'password' => Hash::make('password'),
            'name' => 'Tecnico',
            'last_name' => 'Pruebas',
            'doc_type' => 'CC',
            'document' => '9876543',
            'phone_number' => '3172345777',
            'is_technical' => 1,
        ];

        User::create($dataUser);

        $dataUser = [
            'email' => 'tecnico.dos@gmail.com',
            'password' => Hash::make('password'),
            'name' => 'Tecnico',
            'last_name' => 'Dos',
            'doc_type' => 'CC',
            'document' => '5632428342',
            'phone_number' => '3152345777',
            'is_technical' => 1,
        ];

        User::create($dataUser);
    }
}
