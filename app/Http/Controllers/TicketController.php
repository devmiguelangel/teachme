<?php

namespace Teachme\Http\Controllers;

use Illuminate\Http\Request;

use Teachme\Http\Requests;
use Teachme\Http\Controllers\Controller;

class TicketController extends Controller
{
    public function latest()
    {
        return view('tickets.list');
    }

    public function popular()
    {
        dd('Popular');
    }

    public function open()
    {
        dd('Open');
    }

    public function closed()
    {
        dd('Close');
    }

    public function details($id)
    {
        return view('tickets.details');
    }
}