<?php

use Illuminate\Database\Seeder;
use App\User;

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
    }
}
