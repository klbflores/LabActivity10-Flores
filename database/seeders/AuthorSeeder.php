<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {

        Author::create([
            'name' => 'Kagawad Kauri Lorraine Flores',
            'position' => 'Barangay Kagawad',
            'email' => 'kagawad.flores@bulletin.test',
        ]);

        // 4 factory authors = 5 total authors
        Author::factory()->count(4)->create();
    }
}