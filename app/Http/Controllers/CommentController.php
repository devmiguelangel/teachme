<?php

namespace Teachme\Http\Controllers;

use Illuminate\Http\Request;

use Teachme\Entities\Ticket;
use Teachme\Entities\TicketComment;
use Teachme\Http\Requests;
use Teachme\Http\Controllers\Controller;

class CommentController extends Controller
{
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

        $comment = new TicketComment($request->only(['comment', 'link']));
        $comment->user_id = $request->user()->id;

        $ticket = Ticket::where('id', $ticket_id)->first();

        $ticket->comments()->save($comment);

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
