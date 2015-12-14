<?php

namespace Teachme\Repositories;

use Teachme\Entities\Ticket;

class TicketRepository
{
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
        return Ticket::where('id', $id)->firstOrFail();
    }

}