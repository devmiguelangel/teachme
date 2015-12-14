<?php

namespace Teachme\Repositories;


use Illuminate\Database\Eloquent\Model;
use Teachme\Entities\Ticket;
use Teachme\Entities\TicketComment;
use Teachme\Entities\User;

class CommentRepository extends BaseRepository
{
    /**
     * @return Model
     */
    public function getModel()
    {
        return new TicketComment();
    }

    /**
     * @param Ticket $ticket
     * @param User $user
     * @param array $data
     */
    public function createComment(Ticket $ticket, User $user, array $data)
    {
        $comment = new TicketComment($data);
        $comment->user_id = $user->id;

        $ticket->comments()->save($comment);
    }
}