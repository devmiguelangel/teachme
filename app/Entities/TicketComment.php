<?php

namespace Teachme\Entities;

use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
    protected $fillable = ['comment', 'link', ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
