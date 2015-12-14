<?php

namespace Teachme\Repositories;

use Illuminate\Database\Eloquent\Model;
use Teachme\Entities\Ticket;
use Teachme\Entities\User;

class TicketRepository extends BaseRepository
{
    /**
     * @return Model
     */
    public function getModel()
    {
        return new Ticket();
    }

    protected function ticketList()
    {
        return Ticket::selectRaw(
            'tickets.*,' .
            '(SELECT count(*) FROM ticket_comments WHERE ticket_comments.ticket_id = tickets.id) as num_comments,' .
            '(SELECT count(*) FROM ticket_votes WHERE ticket_votes.ticket_id = tickets.id) as num_votes'
        )->with('author');
    }

    public function getLatest()
    {
        return $this->ticketList()
            ->orderBy('created_at', 'desc')
            ->paginate(20);
    }

    public function getPopular()
    {
        return $this->ticketList()
            ->orderBy('created_at', 'desc')
            ->paginate(20);
    }

    public function getOpen()
    {
        return $this->ticketList()
            ->where('status', 'open')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
    }

    public function getClosed()
    {
        return $this->ticketList()
            ->where('status', 'closed')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
    }

    public function getTicket($id)
    {
        return Ticket::with(['voters', 'comments.user'])
            ->where('id', $id)
            ->firstOrFail();
    }

    public function openNewTicket(User $user, $data)
    {
        return $user->tickets()->create([
            'title'   => $data['title'],
            'status'  => 'open',
        ]);
    }

}