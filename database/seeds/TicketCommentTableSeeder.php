<?php


use Faker\Generator;
use Teachme\Entities\TicketComment;

class TicketCommentTableSeeder extends BaseSeeder
{
    protected $total = 300;

    public function getModel()
    {
        return new TicketComment();
    }

    public function getDummyData(Generator $faker)
    {
        return [
            'comment'   => $faker->paragraph(),
            'link'      => $faker->randomElement(['', '', $faker->url]),
            'user_id'   => $this->getRandom('User')->id,
            'ticket_id' => $this->getRandom('Ticket')->id
        ];
    }
}