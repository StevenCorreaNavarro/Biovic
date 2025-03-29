<?php

namespace Database\Seeders;

use App\Models\User;
use Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use League\CommonMark\Extension\Attributes\Node\Attributes;


class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $user = new User();
        $user->role = 'admin';
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password =  '12345678' ;               //Hash::make(value:'123456789');
        $user->save();

        //ORM Object relationship Mapping
        User::create(attributes: [
            
            'name' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'password' => '123456789',                    //Hash::make(value:'123456789');
        ]);
    }
}
