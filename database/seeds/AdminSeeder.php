<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRoleId = DB::table('roles')->where('role_name', 'admin')->first();
        

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.by',
            'password' => bcrypt('12345678'),
            'role_id' => $adminRoleId->id
        ]);
    }
}
