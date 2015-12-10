<?php

namespace Teachme\Http\Controllers;

use Teachme\Entities\Ticket;
use Teachme\Http\Controllers\Controller;

class TicketController extends Controller
{
    public function latest()
    {
        $tickets = Ticket::orderBy('created_at', 'desc')->paginate(15);

        return view('tickets.list', compact('tickets'));
    }

    public function popular()
    {
        $tickets = Ticket::orderBy('created_at', 'desc')->paginate(15);

        return view('tickets.list', compact('tickets'));
    }

    public function open()
    {
        $tickets = Ticket::where('status', 'open')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('tickets.list', compact('tickets'));
    }

    public function closed()
    {
        $tickets = Ticket::where('status', 'closed')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('tickets.list', compact('tickets'));
    }

    public function details($id)
    {
        $ticket = Ticket::where('id', $id)->first();

        return view('tickets.details', compact('ticket'));
    }
}
