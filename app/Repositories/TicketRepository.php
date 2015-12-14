<?php

namespace Teachme\Repositories;

use Illuminate\Database\Eloquent\Model;
use Teachme\Entities\Ticket;

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
        return $this->getData($id)
            ->with(['voters', 'comments.user'])
            ->firstOrFail();
    }
}