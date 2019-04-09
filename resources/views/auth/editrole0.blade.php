@extends('base')

@section('title', __('Edit Role and User Info'))
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Role and User Info') }}</div>

                <div class="card-body">
                  {{
                      Form::model($user, [
                          'method' => 'PUT',
                          'route'  => [
                              'users.updaterole',
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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password (secured)') }}</label>

                            <div class="col-md-6">
                                {{ Form::text('password', $user->password, ['class' => 'form-control', 'disabled']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="created_at" class="col-md-4 col-form-label text-md-right">{{ __('Registration date') }}</label>

                            <div class="col-md-6">
                                {{ Form::text('created_at', $user->created_at, ['class' => 'form-control', 'disabled']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                {{ Form::select('role_id', $role) }}
                            </div>
                        </div>
{{-- =========================================Passport===================================== --}}

<div class="form-group row">
    <label for="issuedby" class="col-md-4 col-form-label text-md-right">{{ __('Passport issued by:') }}</label>

    <div class="col-md-6">
        {{ Form::text('issuedby ', $user->issuedby, ['class' => 'form-control', 'disabled']) }}
    </div>
</div>

<div class="form-group row">
    <label for="issuedate" class="col-md-4 col-form-label text-md-right">{{ __('Date of issue:') }}</label>

    <div class="col-md-6">
        {{ Form::text('issuedate ', $user->issuedate, ['class' => 'form-control', 'disabled']) }}
    </div>
</div>
<div class="form-group row">
    <label for="unitcode" class="col-md-4 col-form-label text-md-right">{{ __('Unit code:') }}</label>

    <div class="col-md-6">
        {{ Form::text('unitcode ', $user->unitcode, ['class' => 'form-control', 'disabled']) }}
    </div>
</div>
<div class="form-group row">
    <label for="passser" class="col-md-4 col-form-label text-md-right">{{ __('Passport series:') }}</label>

    <div class="col-md-6">
        {{ Form::text('passser ', $user->passser, ['class' => 'form-control', 'disabled']) }}
    </div>
</div>
<div class="form-group row">
    <label for="passnumber" class="col-md-4 col-form-label text-md-right">{{ __('Passport number:') }}</label>

    <div class="col-md-6">
        {{ Form::text('passnumber ', $user->passnumber, ['class' => 'form-control', 'disabled']) }}
    </div>
</div>
<div class="form-group row">
    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City:') }}</label>

    <div class="col-md-6">
        {{ Form::text('city ', $user->city, ['class' => 'form-control', 'disabled']) }}
    </div>
</div>
<div class="form-group row">
    <label for="datebirth" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth:') }}</label>

    <div class="col-md-6">
        {{ Form::text('datebirth ', $user->datebirth, ['class' => 'form-control', 'disabled']) }}
    </div>
</div>
<div class="form-group row">
    <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender:') }}</label>

    <div class="col-md-6">
        {{ Form::text('gender ', $user->gender->name, ['class' => 'form-control', 'disabled']) }}
    </div>
</div>
<div class="form-group row">
    <label for="userstat_id" class="col-md-4 col-form-label text-md-right">{{ __('Account status') }}</label>

    <div class="col-md-6">
        {{ Form::select('userstat_id', $userstat) }}
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


                                <a class="btn btn-danger" href="{{route('users.usersindex')}}">{{__('Cancel')}}</a>

                    {{ Form::close() }}

                    {{
                        Form::model($user, [
                            'method' => 'DELETE',
                            'route'  => [
                                'users.deleteuser',
                                $user->id,
                            ]
                        ])
                    }}
                    {{
                        Form::submit(
                            __('Remove user'),
                            [
                                'class' => 'btn btn-success',
                            ]
                        )
                    }}
                  </div>
                </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
