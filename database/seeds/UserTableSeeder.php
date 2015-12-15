<?php

use Faker\Generator;
use Styde\Seeder\Seeder;
use Teachme\Entities\User;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    public function getModel()
    {
        return new User();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'name'      => $faker->name,
            'email'     => $faker->unique()->email,
            'password'  => Hash::make('secret')
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdmin();
        $this->createMultiple(44);
    }

    public function createAdmin()
    {
        $this->create([
            'name'      => 'Miguel MG',
            'email'     => 'mmamani@coboser.com',
            'password'  => Hash::make('secret')
        ]);
    }

}
