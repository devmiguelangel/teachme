<div data-id="25" class="well well-sm ticket">
    <h4 class="list-title">
        {{ $ticket->title }}

        @include('tickets.partials.status', compact('ticket'))

    </h4>
    <p>
        @if(auth()->check())
            <a href="#" data-id="{{ $ticket->id }}" data-vote="1"
               {!! Html::classes(['btn btn-primary btn-vote vote', 'hide' => auth()->user()->hasVote($ticket)]) !!}
               title="Votar por este tutorial">
                <span class="glyphicon glyphicon-thumbs-up"></span> Votar
            </a>

            <a href="#" data-id="{{ $ticket->id }}" data-vote="0"
               {!! Html::classes(['btn btn-hight btn-vote unvote', 'hide' => ! auth()->user()->hasVote($ticket)]) !!}
               title="Quitar el voto de este tutorial">
                <span class="glyphicon glyphicon-thumbs-down"></span> Quitar voto
            </a>

            <a href="{{ route('ticket.details', ['id' => $ticket->id]) }}">
                <span class="votes-count">{{ $ticket->num_votes }} votos</span>
                - <span class="comments-count">{{ $ticket->num_comments }} comentarios</span>.
            </a>
        @endif

        <p class="date-t">
            <span class="glyphicon glyphicon-time"></span>
            {{ $ticket->created_at->format('d/m/Y h:i a') }}
            By {{ $ticket->author->name }}
        </p>
    </p>
</div>