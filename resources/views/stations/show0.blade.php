{{-- Это шаблон формы удаления товара из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')
<style>

</style>

{{-- В секции title родительского шаблона будет выведен перевод фразы: Station Info --}}
@section('title', __('Station Info'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

<p>
  <a class="btn btn-danger" href="{{route('stations.index')}}">{{__('Go back')}}</a>
</p>

<div class="table-responsive">
    <table class="table table-hover table-striped">
        <tr>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Number') }}</th>
            <th>{{ __('Name zone') }}</th>
            <th>{{ __('User who added') }}</th>
        </tr>
          <td>{{ $station->name }}</td>
          <td>{{ $station->number }}</td>
          <td>{{ $station->zone->name }}</td>
          <td>{{ $station->user->name }}</td>
    </table>
</div>

<div class="form-group">
    {{ Form::label('desc', __('Description')) }}
    {{ Form::textarea('description', $station->description, ['class' => 'form-control', 'disabled']) }}
</div>

@foreach ($station->images as $image)
<img src="/media/{{$image->filename}}" class="img-fluid img-thumbnail" width="400" height="400" alt="">
@endforeach
@endsection
