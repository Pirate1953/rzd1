{{-- Это шаблон формы удаления товара из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')
<style>

</style>

{{-- В секции title родительского шаблона будет выведен перевод фразы: Station Info --}}
@section('title', __('Station Info'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

<div class="table-responsive">
    <table class="table table-hover table-striped">
        <tr>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Number') }}</th>
        </tr>
          <td>{{ $station->name }}</td>
          <td>{{ $station->number }}</td>
    </table>
</div>

@include('stations.partials.formforusers')
@foreach ($station->images as $image)
<img src="/rzd1/storage/app/{{$image->filename}}" class="img-fluid img-thumbnail" width="400" height="400" alt="">
@endforeach
@endsection
