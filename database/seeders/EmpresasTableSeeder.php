<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            [
                'nombre' => 'Industrial Marketing',
                'cuenta_id' => 'D35C9937ABB07577D7933723D1302E45',
                'api_key' => '14F6F1B3DD91F1FA9CE85F1EA31161B2',
                'created_at'=> now(),
            ]//1
        ]);
    }
}
