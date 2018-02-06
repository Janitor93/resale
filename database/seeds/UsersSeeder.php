<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRoleId = DB::table('roles')->where('role_name', 'user')->first();

        $users = array('user1', 'user2', 'user3');

        foreach($users as $user) {
            DB::table('users')->insert([
                'name' => $user,
                'email' => $user . '@user.by',
                'password' => bcrypt('12345678'),
                'phone' => '+375(29)1234567',
                'role_id' => $userRoleId->id
            ]);
        }
    }
}
