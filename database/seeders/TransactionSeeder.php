<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $type = $faker->randomElement(['income', 'expense']);
            $category = ($type === 'income') ? $faker->randomElement(['wage', 'bonus', 'gift']) : $faker->randomElement(['food & drinks', 'shopping', 'charity', 'housing', 'insurance', 'taxes', 'transportation']);
            $amount = $faker->randomFloat(2, 5000, 1000000000);
            $notes = $faker->sentence;
            $created_at = now();
            $updated_at = now();

            DB::table('transactions')->insert([
                'amount' => $amount,
                'type' => $type,
                'category' => $category,
                'notes' => $notes,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ]);
        }
    }
}
