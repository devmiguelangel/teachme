@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Nueva Solicitud</h2>
                @if(count($errors) > 0)
                    @include('partials.errors')
                @endif

                {!! Form::open(['route' => 'ticket.store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Título') !!}
                        {!! Form::textArea('title', old('title'), ['class' => 'form-control', 'size' => '30x5']) !!}
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-thumbs-up"></span> Enviar Solicitud
                    </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection