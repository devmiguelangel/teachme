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
        return view('tickets.list');
    }

    public function open()
    {
        return view('tickets.list');
    }

    public function closed()
    {
        return view('tickets.list');
    }

    public function details($id)
    {
        $ticket = Ticket::where('id', $id)->first();

        return view('tickets.details', compact('ticket'));
    }
}
