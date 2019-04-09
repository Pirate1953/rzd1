@extends('base')

@section('title', __('Passport data'))
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Passport data') }}</div>

                <div class="card-body">
                  {{
                      Form::model($user, [
                          'method' => 'PUT',
                          'route'  => [
                              'users.updatestat',
                              $user->id,
                          ]
                      ])
                  }}

                        <div class="form-group row">
                            <label for="pib" class="col-md-4 col-form-label text-md-right">{{ __('Passport issued by:') }}</label>

                            <div class="col-md-6">
                                {{ Form::text('issuedby', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="doi" class="col-md-4 col-form-label text-md-right">{{ __('Date of issue:') }}</label>

                            <div class="col-md-6">
                                {{ Form::Date('issuedate', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="uncode" class="col-md-4 col-form-label text-md-right">{{ __('Unit code:') }}</label>

                            <div class="col-md-6">
                                {{ Form::text('unitcode', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ps" class="col-md-4 col-form-label text-md-right">{{ __('Passport series:') }}</label>

                            <div class="col-md-6">
                                {{ Form::number('passser', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pn" class="col-md-4 col-form-label text-md-right">{{ __('Passport number:') }}</label>

                            <div class="col-md-6">
                                {{ Form::number('passnumber', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pn" class="col-md-4 col-form-label text-md-right">{{ __('City:') }}</label>

                            <div class="col-md-6">
                                {{ Form::text('city', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="db" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth:') }}</label>

                            <div class="col-md-6">
                                {{ Form::Date('datebirth', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ge" class="col-md-4 col-form-label text-md-right">{{ __('Gender:') }}</label>

                            <div class="col-md-6">
                                {{ Form::select('gender_id', $gender)}}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                              {{-- Кнопка предъявления формы --}}
                              {{
                                  Form::submit(
                                      __('Save'),
                                      [
                                          'class' => 'btn btn-primary',
                                      ]
                                  )
                              }}


                                <a class="btn btn-danger" href="{{route('users.cancel')}}">{{__('Cancel')}}</a>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
