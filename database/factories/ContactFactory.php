<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'       => "{$this->faker->firstName()} {$this->faker->lastName()}",
            'birthdate'  => $this->faker->dateTime(),
            'telephone'  => "(+{$this->faker->randomNumber(2, true)}) " . $this->faker->regexify('\d{3}-\d{3}-\d{2}-\d{2}'),
            'address'    => preg_replace('/\r|\n/', '. ', $this->faker->address()),
            'creditcard_number' => $this->faker->sha256(),
            'creditcard_lastnumbers' => $this->faker->randomNumber(4, true),
            'franchise'  => $this->faker->creditCardType(),
            'email'      => $this->faker->email(),
            'user_id'    => rand(1,2),
            'created_at' => now(),
        ];
    }
}
