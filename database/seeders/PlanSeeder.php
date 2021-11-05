<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Free',
            'cost' => 0,
        ]);

        Plan::create([
            'name' => 'Pro',
            'cost' => 1500,
        ]);

        Plan::create([
            'name' => 'Enterprise',
            'cost' => 2900,
        ]);
    }
}
