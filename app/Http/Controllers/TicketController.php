<?php

namespace Teachme\Http\Controllers;

use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
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
