<div data-id="25" class="well well-sm request">
    <h4 class="list-title">
        {{ $ticket->title }}

        @include('tickets.partials.status', compact('ticket'))

    </h4>
    <p>
        <a href="#" class="btn btn-primary btn-vote" title="Votar por este tutorial">
            <span class="glyphicon glyphicon-thumbs-up"></span> Votar
        </a>

        <a href="#" class="btn btn-hight btn-unvote hide">
            <span class="glyphicon glyphicon-thumbs-down"></span> No votar
        </a>

        <a href="{{ route('ticket.details', ['id' => $ticket->id]) }}">
            <span class="votes-count">{{ $ticket->num_votes }} votos</span>
            - <span class="comments-count">{{ $ticket->num_comments }} comentarios</span>.
        </a>

        <p class="date-t">
            <span class="glyphicon glyphicon-time"></span>
            {{ $ticket->created_at->format('d/m/Y h:i a') }}
            By {{ $ticket->author->name }}
        </p>
    </p>
</div>