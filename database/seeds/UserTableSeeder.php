<?php

use TeachMe\Entities\User;
use Faker\Generator;

class UserTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new User();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
          'name' => $faker->name,
          'email' => $faker->email,
          'password' => bcrypt('secret'),
      ];
    }

    public function run()
    {
        $this->CreateAdmin();
        $this->createMultiple(50);
    }

    private function CreateAdmin()
    {
        $this->create([
        'name' => 'Sender Flores',
        'email' => 'safcrace@gmail.com',
        'password' => bcrypt('admin'),

      ]);
    }
}
