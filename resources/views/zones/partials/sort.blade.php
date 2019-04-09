{{
    Form::open([
        'method' => 'GET',
        'route'  => 'zones.sort'
    ])
}}
    {{ Form::label('lab1', __('Set price')) }}
    {{ Form::number('price', null, ['class' => 'form-control']) }}
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
