<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	App\User::create([
            'name' => 'Sompoch Promkeaw',
            'email' => 'propoch@gmail.com',
            'role_id' => 1,
            'password' => bcrypt('512804poch') ,
            'avatar' => '/uploads/avatar/1494688590542366_522175497799504_1011901893_n.jpg'   
        ]);
        App\User::create([
            'name' => 'Chokchai Chaichana',
            'email' => 'Chokchai@innews.co.th',
            'role_id' => 2,
            'password' => bcrypt('512804poch'),
            'avatar' => '/uploads/avatar/149469170214370329_1260679290619139_8638386024031242270_n.jpg'  
        ]);

        App\User::create([
            'name' => 'Sompoch Promkeaw',
            'email' => 'propoch@gmail.com',
            'role_id' => 3,
            'password' => bcrypt('512804poch'),
            'avatar' => '/uploads/avatar/149469329015135899_10207545457144158_8495427129630836872_n.jpg'  
        ]);
        

    }
}
