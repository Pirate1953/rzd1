{{
    Form::open([
        'method' => 'GET',
        'route'  => 'stations.sort'
    ])
}}
    {{ Form::label('lab1', __('Set station name')) }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    <p></p>
    {{
        Form::submit(
            __('Search'),
            [
                'class' => 'btn btn-success',
            ]
        )
    }}
    {{ Form::close() }}
