@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <h1>
                        {{ trans('teachme.title.' . request()->route()->getName()) }}
                        <a href="{{ route('ticket.create') }}" class="btn btn-primary">
                            Nueva solicitud
                        </a>
                    </h1>

                    <p class="label label-info news">
                        {{ trans_choice('teachme.total.' . request()->route()->getName(), $tickets->total()) }}
                    </p>

                    @foreach($tickets as $ticket)
                        @include('tickets.partials.item', compact('ticket'))
                    @endforeach

                    {!! $tickets->render() !!}

                </div>
                <hr>

            </div>
        </div>
    </div>
@endsection