<?php

namespace Teachme\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Route;


class TicketListComposer
{
    /**
     * @var Route
     */
    private $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

    public function compose(View $view)
    {
        $view->title = trans('teachme.title.' . $this->route->getName());
        $view->total = trans_choice(
            'teachme.total.ticket',
            $view->tickets->total(),
            ['title' => strtolower($view->title)]
        );
    }
}