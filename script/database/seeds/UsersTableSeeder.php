<?php

use Illuminate\Database\Seeder;
use App\User;
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
        User::create([
        	'role_id' => 1,
        	'name' => 'Admin',
        	'slug' => 'admin',
        	'email' => 'admin@admin.com',
        	'password' => Hash::make('rootadmin'),
        ]);

         User::create([
        	'role_id' => 2,
        	'name' => 'Author',
        	'slug' => 'author',
        	'email' => 'author@author.com',
        	'password' => Hash::make('rootauthor'),
        ]);

         User::create([
            'role_id' => 2,
            'name' => 'Arafat',
            'slug' => 'arafat',
            'email' => 'arafat@author.com',
            'password' => Hash::make('rootauthor'),
        ]);
    }
}
