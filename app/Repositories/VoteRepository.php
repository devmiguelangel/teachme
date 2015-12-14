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
     * @return bool
     */
    public function addVote(Ticket $ticket, User $user)
    {
        if ($user->hasVote($ticket)) {
            return false;
        }

        $user->votes()->attach($ticket->id);

        return true;
    }

    /**
     * @param Ticket $ticket
     * @param User $user
     * @return bool
     */
    public function removeVote(Ticket $ticket, User $user)
    {
        if (! $user->hasVote($ticket)) {
            return false;
        }

        $user->votes()->detach($ticket->id);

        return true;
    }
}