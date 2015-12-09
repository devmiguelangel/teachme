<span {!! Html::classes(['label label-info absolute', 'highlight' => $ticket->open]) !!}>
    {{ trans('teachme.status.' . $ticket->status) }}
</span>