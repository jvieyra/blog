<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder{

  public function run(){
   	User::truncate();

   	$user = new User;
   	$user->name = 'Pablo Vieyra';
   	$user->email = 'vieyrapez@gmail.com';
   	$user->password = bcrypt('123456');
   	$user->save();
  }
}
