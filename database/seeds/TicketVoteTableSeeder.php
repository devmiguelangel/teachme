<?php


use Faker\Generator;
use Teachme\Entities\TicketVote;

class TicketVoteTableSeeder extends BaseSeeder
{
    protected $total = 250;

    public function getModel()
    {
        return new TicketVote();
    }

    public function getDummyData(Generator $faker)
    {
        return [
            'user_id'   => $this->getRandom('User')->id,
            'ticket_id' => $this->getRandom('Ticket')->id
        ];
    }
}