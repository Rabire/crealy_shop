<?php

use Illuminate\Database\Seeder;
use App\User;
use App\General;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rabire',
            'email' => 'a@a',
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);
        
        General::create([
            'delay' => '10'
        ]);
    }
}
