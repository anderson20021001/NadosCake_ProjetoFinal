<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produtos')->insert([
            'categoria_id' => 1,
            'nome' => 'Detergente',
            'quantidade' => 50 ,
            'preco' => 10.50,
        ]);
    
    }
}
