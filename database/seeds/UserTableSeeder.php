<?php

use Teachme\Entities\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdmin();
        $this->createUsers(50);
    }

    private function createAdmin()
    {
        User::create([
            'name'      => 'Miguel MG',
            'email'     => 'mmamani@coboser.com',
            'password'  => Hash::make('secret')
        ]);
    }

    private function createUsers($number = 1)
    {
        $faker = Faker::create();

        for ($i = 1; $i <= $number; $i++) {
            User::create([
                'name'      => $faker->name,
                'email'     => $faker->unique()->email,
                'password'  => Hash::make('secret')
            ]);
        }
    }
}
