<?php

use Illuminate\Database\Seeder;
use App\User ;
class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$user = [
    		'name' => 'admin' ,
    		'email' => 'admin@admin.com' ,
    		'password' => bcrypt('admin') ,
    	];
        User::create($user);
    }
}
