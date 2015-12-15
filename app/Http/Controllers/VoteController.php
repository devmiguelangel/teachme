<?php

namespace Teachme\Http\Controllers;

use Illuminate\Http\Request;

use Teachme\Entities\User;
use Teachme\Http\Requests;
use Teachme\Http\Controllers\Controller;
use Teachme\Repositories\TicketRepository;
use Teachme\Repositories\VoteRepository;

class VoteController extends Controller
{
    /**
     * @var VoteRepository
     */
    private $repository;
    /**
     * @var TicketRepository
     */
    private $ticketRepository;

    public function __construct(VoteRepository $repository, TicketRepository $ticketRepository)
    {
        $this->repository       = $repository;
        $this->ticketRepository = $ticketRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $ticket_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $ticket_id)
    {
        $ticket = $this->ticketRepository->getTicket($ticket_id);
        $user   = $request->user();

        $success = $this->repository->addVote($ticket, $user);
        $votes   = $ticket->voters->count();

        if ($success) {
            $votes += 1;
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => $success,
                'votes'   => $votes,
            ]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $ticket_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $ticket_id)
    {
        $ticket = $this->ticketRepository->getTicket($ticket_id);
        $user   = $request->user();

        $success = $this->repository->removeVote($ticket, $user);
        $votes   = $ticket->voters->count();

        if ($success) {
            $votes -= 1;
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => $success,
                'votes'   => $votes,
            ]);
        }

        return redirect()->back();
    }
}
