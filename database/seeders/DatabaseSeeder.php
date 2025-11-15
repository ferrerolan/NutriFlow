<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Customer::factory(15)->create(); // cria 15 pacientes falsos
    }
}
