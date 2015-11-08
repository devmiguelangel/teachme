<?php


use Faker\Generator;
use Teachme\Entities\Ticket;

class TicketTableSeeder extends BaseSeeder
{

    public function getModel()
    {
        return new Ticket();
    }

    public function getDummyData(Generator $faker)
    {
        return [
            'title'   => $faker->sentence(),
            'status'  => $faker->randomElement(['open', 'open', 'closed']),
            'user_id' => $this->getRandom('User')->id
        ];
    }

}
