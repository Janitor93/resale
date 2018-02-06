<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = DB::table('users')->first();

        DB::table('products')->insert([
            'user_id' => $userId->id,
            'product_name' => 'Сок',
            'price' => 3.02,
            'quantity' => 10,
            'description' => 'Сок яблочный. Непросроченный.',
            'image' => 'seed/juice.jpg',
            'created_at' => new \DateTime()
        ]);

        DB::table('products')->insert([
            'user_id' => $userId->id,
            'product_name' => 'Книги "Гарри Поттер"',
            'price' => 55.42,
            'quantity' => 7,
            'description' => 'Серия книг',
            'image' => 'seed/books.jpg',
            'created_at' => new \DateTime()
        ]);

        DB::table('products')->insert([
            'user_id' => $userId->id,
            'product_name' => 'Кубик Рубика',
            'price' => 5.00,
            'quantity' => 3,
            'description' => '',
            'image' => 'seed/cube.jpg',
            'created_at' => new \DateTime()
        ]);

        DB::table('products')->insert([
            'user_id' => $userId->id,
            'product_name' => 'Наушники',
            'price' => 70.00,
            'quantity' => 1,
            'description' => '',
            'image' => 'seed/headphones.jpg',
            'created_at' => new \DateTime()
        ]);

        DB::table('products')->insert([
            'user_id' => $userId->id,
            'product_name' => 'Богомолы',
            'price' => 20.00,
            'quantity' => 7,
            'description' => 'Самцы закончились',
            'image' => 'seed/mantis.jpg',
            'created_at' => new \DateTime()
        ]);

        DB::table('products')->insert([
            'user_id' => $userId->id,
            'product_name' => 'Стол',
            'price' => 23.00,
            'quantity' => 10,
            'description' => 'Стол деревянный',
            'image' => 'seed/table.jpg',
            'created_at' => new \DateTime()
        ]);
    }
}
