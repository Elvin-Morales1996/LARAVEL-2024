<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //usamos el archivos curso y le agregamos la cantidad que queremos 
        Curso::factory(50)->create();
        User::factory(10)->create();
    }
}
