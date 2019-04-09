@extends('base')

@section('title', __('Edit password'))
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit password') }}</div>

                <div class="card-body">
                  {{
                      Form::model($user, [
                          'method' => 'PUT',
                          'route'  => [
                              'users.updatepass',
                              $user->id,
                          ]
                      ])
                  }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Password (set new)') }}</label>

                            <div class="col-md-6">
                                {{ Form::text('password1', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fam" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                {{ Form::text('password2', null, ['class' => 'form-control']) }}
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


                                <a class="btn btn-danger" href="{{route('users.editprofile')}}">{{__('Go back')}}</a>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
