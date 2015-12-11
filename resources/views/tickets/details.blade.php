@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="title-show">
                    {{ $ticket->title }}

                    @include('tickets.partials.status')
                </h2>

                <p class="date-t">
                    <span class="glyphicon glyphicon-time"></span>
                    {{ $ticket->created_at->format('d/m/Y h:i a') }}
                    - {{ $ticket->author->name }}
                </p>

                <h4 class="label label-info news">
                    {{ $ticket->voters->count() }} votos
                </h4>

                <p class="vote-users">
                    @foreach($ticket->voters as $voter)
                        <span class="label label-info">{{ $voter->name }}</span>
                    @endforeach
                </p>

                {!! Form::open(['route' => ['vote.store', 'ticket_id' => $ticket->id], 'method' => 'POST']) !!}
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-thumbs-up"></span> Votar
                    </button>
                {!! Form::close() !!}

                {!! Form::open(['route' => ['vote.destroy', 'ticket_id' => $ticket->id], 'method' => 'DELETE']) !!}
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-thumbs-up"></span> Quitar Voto
                    </button>
                {!! Form::close() !!}

                <h3>Nuevo Comentario</h3>

                {!! Form::open(['route' => ['comment.store', 'ticket_id' => $ticket->id], 'method' => 'POST']) !!}
                    <div class="form-group">
                        <label for="comment">Comentarios:</label>
                        {!! Form::textArea('comment', old('comment'), ['class' => 'form-control', 'size' => '50x4']) !!}
                    </div>
                    <div class="form-group">
                        <label for="link">Enlace:</label>
                        {!! Form::text('link', old('link'), ['class' => 'form-control']) !!}
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar comentario</button>
                {!! Form::close() !!}

                <h3>Comentarios ({{ $ticket->comments->count() }})</h3>

                @foreach($ticket->comments as $comment)
                    <div class="well well-sm">
                        <p><strong>{{ $comment->user->name }}</strong></p>
                        <p>{{ $comment->comment }}</p>
                        <p class="date-t">
                            <span class="glyphicon glyphicon-time"></span>
                            {{ $comment->created_at->format('d/m/Y h:i a') }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection