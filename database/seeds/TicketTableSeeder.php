<?php

use Faker\Generator;
use Styde\Seeder\Seeder;
use Teachme\Entities\Ticket;

class TicketTableSeeder extends Seeder
{
    public function getModel()
    {
        return new Ticket();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'title'   => $faker->sentence(),
            'status'  => $faker->randomElement(['open', 'open', 'closed']),
            'user_id' => $this->random('User')->id
        ];
    }

}
