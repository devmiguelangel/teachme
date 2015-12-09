<?php

namespace Teachme\Entities;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function comments()
    {
        return $this->hasMany(TicketComment::class, 'ticket_id', 'id');
    }

    public function voters()
    {
        return $this->belongsToMany(User::class, 'ticket_votes', 'ticket_id', 'user_id');
    }

    public function getOpenAttribute()
    {
        return $this->status == 'open';
    }
}
