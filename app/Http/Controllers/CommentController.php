<?php

namespace Teachme\Http\Controllers;

use Illuminate\Http\Request;

use Teachme\Entities\Ticket;
use Teachme\Entities\TicketComment;
use Teachme\Http\Requests;
use Teachme\Http\Controllers\Controller;
use Teachme\Repositories\CommentRepository;
use Teachme\Repositories\TicketRepository;

class CommentController extends Controller
{
    /**
     * @var TicketRepository
     */
    private $ticketRepository;
    /**
     * @var CommentRepository
     */
    private $repository;

    public function __construct(CommentRepository $repository, TicketRepository $ticketRepository)
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
        $this->validate($request, [
            'comment' => 'required|max:255',
            'link'    => 'url',
        ]);

        $ticket = $this->ticketRepository->getData($ticket_id);
        $user   = $request->user();
        $data   = $request->only(['comment', 'link']);

        $this->repository->createComment($ticket, $user, $data);

        return redirect()->back()
            ->with(['success' => 'El comentario fue registrado con exito']);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
