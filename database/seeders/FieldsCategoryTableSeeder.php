<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FieldsCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields_categories')->insert([
            ['name'=>'Default'],
            ['name'=>'Diagnostico'],
            ['name'=>'Impacto'],
            ['name'=>'Visión']
        ]);
    }
}
