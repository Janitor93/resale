<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            UsersRoleSeeder::class,
//            CategorySeeder::class,
            AdminSeeder::class,
            UsersSeeder::class,
            ProductsTableSeeder::class

        ]);
    }
}
