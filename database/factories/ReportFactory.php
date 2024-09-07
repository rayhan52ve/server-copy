<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Report;

class ReportFactory extends Factory
{
    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_at' => $this->faker->dateTimeThisYear,
            'auto_recharge' => $this->faker->randomFloat(2, 0, 10000),
            'manual_recharge' => $this->faker->randomFloat(2, 0, 10000),
            'income' => $this->faker->randomFloat(2, 0, 10000),
            'expense' => $this->faker->randomFloat(2, 0, 10000),
            'profit' => $this->faker->randomFloat(2, 0, 10000),
        ];
    }
}
