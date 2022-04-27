<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item' => $this->faker->randomNumber(3, false),
            'title' => $this->faker->sentence(4),
            'faculty_id' => Arr::random(['1', '2', '3', '4', '5', '6']),
            'author' => $this->faker->name(),
            'type_id' => Arr::random(['1', '2', '3', '4', '5', '6', '7', '8']),
            'disciple' => $this->faker->words(3, true),
            'size' => $this->faker->randomFloat(2, 3, 8),
            'amount' => $this->faker->randomDigitNotNull(),
            'year' => Arr::random(['2020', '2021']),
            'month_id' => Arr::random(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']),
            'handed_in' => Arr::random(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']),
            'is_handed' => Arr::random(['0', '1']),
            'status' => Arr::random(['В работе', 'В печати', 'Отпечатано', 'На калькуляции', 'Издано']),
            'created_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}
