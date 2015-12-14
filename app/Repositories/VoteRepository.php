<?php

namespace Teachme\Repositories;

use Illuminate\Database\Eloquent\Model;
use Teachme\Entities\Ticket;
use Teachme\Entities\TicketVote;
use Teachme\Entities\User;

class VoteRepository extends BaseRepository
{
    /**
     * @return Model
     */
    public function getModel()
    {
        return new TicketVote();
    }

    /**
     * @param Ticket $ticket
     * @param User $user
     */
    public function addVote(Ticket $ticket, User $user)
    {
        $user->votes()->attach($ticket->id);
    }

    /**
     * @param Ticket $ticket
     * @param User $user
     */
    public function removeVote(Ticket $ticket, User $user)
    {
        $user->votes()->detach($ticket->id);
    }
}