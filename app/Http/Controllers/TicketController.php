<?php

namespace Teachme\Http\Controllers;

use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Teachme\Entities\Ticket;
use Teachme\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * @return Ticket
     */
    protected function ticketList()
    {
        return Ticket::selectRaw(
            'tickets.*,' .
            '(SELECT count(*) FROM ticket_comments WHERE ticket_comments.ticket_id = tickets.id) as num_comments,' .
            '(SELECT count(*) FROM ticket_votes WHERE ticket_votes.ticket_id = tickets.id) as num_votes'
        )->with('author');
    }

    public function latest()
    {
        $tickets = $this->ticketList()
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('tickets.list', compact('tickets'));
    }

    public function popular()
    {
        $tickets = $this->ticketList()
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('tickets.list', compact('tickets'));
    }

    public function open()
    {
        $tickets = $this->ticketList()
            ->where('status', 'open')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('tickets.list', compact('tickets'));
    }

    public function closed()
    {
        $tickets = $this->ticketList()
            ->where('status', 'closed')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('tickets.list', compact('tickets'));
    }

    public function details($id)
    {
        $ticket = Ticket::where('id', $id)->first();

        return view('tickets.details', compact('ticket'));
    }

    public function create() {
        return view('tickets.create');
    }

    /**
     * @param Request $request
     * @param Guard $auth
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Guard $auth)
    {
        $this->validate($request, [
            'title' => 'required|max:140',
        ]);

        $data = $request->all();

        /*$ticket = new Ticket();

        $ticket->title   = $data['title'];
        $ticket->status  = 'open';
        $ticket->user_id = $auth->user()->id;

        $ticket->save();*/

        $ticket = $auth->user()->tickets()->create([
            'title'   => $data['title'],
            'status'  => 'open',
        ]);

        return redirect()->route('ticket.details', ['id' => $ticket->id]);
    }
}
