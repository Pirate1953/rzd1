{{-- Этот шаблон с полями формы, свёрстанный для Bootstrap --}}

<p>
    <a class="btn btn-danger" href="{{route('zones.index')}}">{{__('Go back')}}</a>
</p>

<div class="form-group">
    {{ Form::label('name', __('Name')) }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('number', __('Number')) }}
    {{ Form::number('number', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('price', __('Price')) }}
    {{ Form::number('price', null, ['class' => 'form-control']) }}
</div>
