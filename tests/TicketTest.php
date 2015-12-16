<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TicketTest extends TestCase
{
    use DatabaseTransactions;

    protected $title = 'Curso de VueJS';

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testCreateTicket()
    {
        $user = seed('User');

        $this->actingAs($user)
            ->visit(route('ticket.create'))
            ->type($this->title, 'title')
            ->press('Enviar Solicitud');

        $this->see($this->title);

        $this->seeInDatabase('tickets', [
            'title'  => $this->title,
            'status' => 'open'
        ]);
    }
}
