<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

        
            [
                'name' => 'Admin Admin',
                'email' => 'i.mesa@inboundmarketingcanarias.com',
                'empresa_id'=>1,
                'role_id'=> 1,
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'User user',
                'email' => 'user@lightbp.com',
                'empresa_id'=>1,
                'role_id'=> 2,
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ],
    
        ]);
    }
}
