<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Entity;
use DB;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->delete();
        DB::table('entities')->delete();
        $users = [
            ['id' => 1, 'login' => 'testuser', 'password'=>bcrypt('userpassword'), 'mode' => 'user'],
            ['id' => 2, 'login' => 'testadmin', 'password'=>bcrypt('adminpassword'), 'mode' => 'admin'],
            ['id' => 3, 'login' => 'testtesttest', 'password'=>bcrypt('testtesttest'), 'mode' => 'user'],
        ];
        $cities = [
            ['id' => 1, 'country' => 'Russia', 'city' => 'Moscow', 'population' => 12000000, 'owner' => 1],
            ['id' => 2, 'country' => 'Russia', 'city' => 'Saint Peterbug', 'population' => 5000000, 'owner' => 1],
        ];
        User::insert($users);
        Entity::insert($cities);
    }
}
