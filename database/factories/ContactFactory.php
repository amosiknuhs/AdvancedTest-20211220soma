<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
  protected $model = Contact::class;

  public function definition()
  {
    return [
      'fullname' => $this->faker->name,
      'gender' => $this->faker->numberBetween(1, 2),
      'email' => $this->faker->email,
      'postcode' => $this->faker->text(8),
      'address' => $this->faker->address,
      'building_name' => $this->faker->word,
      'opinion' => $this->faker->realText(50),
    ];
  }
}
