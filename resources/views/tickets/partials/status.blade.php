@if(! $ticket->open)
    <a class="btn btn-primary" href="{{ $ticket->resource }}" target="_blank">Recurso</a>
@endif

<span {!! Html::classes(['label label-info absolute', 'highlight' => $ticket->open]) !!}>
    {{ trans('teachme.status.' . $ticket->status) }}
</span>