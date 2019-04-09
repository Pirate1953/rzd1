@extends('base')

@section('title', __('Edit Profile'))
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                  {{
                      Form::model($user, [
                          'method' => 'PUT',
                          'route'  => [
                              'users.updateuser',
                              $user->id,
                          ]
                      ])
                  }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fam" class="col-md-4 col-form-label text-md-right">{{ __('Second Name') }}</label>

                            <div class="col-md-6">
                                {{ Form::text('fam', $user->fam, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">

                            {{ Form::label('patr', __('Patronymic (optional)'), ['class'=>'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::text('patr', $user->patr, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                {{ Form::text('email', $user->email, ['class' => 'form-control', 'disabled']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="userstat" class="col-md-4 col-form-label text-md-right">{{ __('Account status') }}</label>

                            <div class="col-md-6">
                                {{ Form::text('userstat', $user->userstat->name, ['class' => 'form-control', 'disabled']) }}
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
                              {{ Form::close() }}

                                <a class="btn btn-danger" href="{{route('users.cancel')}}">{{__('Cancel')}}</a>
                                <a class="btn btn-success" href="{{route('users.editpass')}}">{{__('Change password')}}</a>
                                <p></p>
                                {{
                                    Form::model($user, [
                                        'method' => 'DELETE',
                                        'route'  => [
                                            'users.deletecurrentuser',
                                            $user->id,
                                        ]
                                    ])
                                }}
                                {{
                                    Form::submit(
                                        __('Delete account'),
                                        [
                                            'class' => 'btn btn-danger',
                                        ]
                                    )
                                }}
                                {{ Form::close() }}
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
