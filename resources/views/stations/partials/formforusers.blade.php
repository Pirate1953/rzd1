{{-- Этот шаблон с полями формы, свёрстанный для Bootstrap --}}

<div class="form-group">
    {{ Form::label('name', __('Description')) }}
    {{ Form::textarea('description', $station->description, ['class' => 'form-control', 'disabled']) }}
</div>
