<?php

namespace Teachme\Http\Controllers;

use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Teachme\Entities\User;
use Teachme\Http\Controllers\Controller;
use Teachme\Repositories\TicketRepository;

class TicketController extends Controller
{
    /**
     * @var TicketRepository
     */
    private $repository;

    public function __construct(TicketRepository $repository)
    {
        $this->repository = $repository;
    }

    public function latest()
    {
        $tickets = $this->repository->getLatest();

        return view('tickets.list', compact('tickets'));
    }

    public function popular()
    {
        $tickets = $this->repository->getPopular();

        return view('tickets.list', compact('tickets'));
    }

    public function open()
    {
        $tickets = $this->repository->getOpen();

        return view('tickets.list', compact('tickets'));
    }

    public function closed()
    {
        $tickets = $this->repository->getClosed();

        return view('tickets.list', compact('tickets'));
    }

    public function details($id)
    {
        $ticket = $this->repository->getTicket($id);

        return view('tickets.details', compact('ticket'));
    }

    public function create() {
        return view('tickets.create');
    }

    /**
     * @param Request $request
     * @param Guard|User $auth
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Guard $auth)
    {
        $this->validate($request, [
            'title'    => 'required|max:140',
            'resource' => 'url',
        ]);

        $data = $request->all();

        $ticket = $this->repository->openNewTicket($auth->user(), $data);

        /*$ticket = new Ticket();

        $ticket->title   = $data['title'];
        $ticket->status  = 'open';
        $ticket->user_id = $auth->user()->id;

        $ticket->save();*/

        return redirect()->route('ticket.details', ['id' => $ticket->id]);
    }
}
