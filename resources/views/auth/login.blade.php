@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                   {!! Form::open(['url'=>'login', 'class'=>'form-horizontal']) !!}
                     <div class="form-group row mb-3{{ $errors->has('email') ? ' has-error' : '' }}">
                       {!! Form::label('email', 'Alamat Email', ['class'=>'col-md-4 col-form-label text-md-end control-label ']) !!}
                         <div class="col-md-6">
                           {!! Form::email('email', null, ['class'=>'form-control']) !!}
                           {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                         </div>
                     </div>
                   <div class="form-group row mb-3{{ $errors->has('password') ? ' has-error' : '' }}">
                     {!! Form::label('password', 'Password', ['class'=>'col-md-4 col-form-label text-md-end control-label ']) !!}
                       <div class="col-md-6">
                         {!! Form::password('password', ['class'=>'form-control']) !!}
                         {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                     </div>
                   </div>
                   <div class="form-group row mb-3">
                     <div class="col-md-6 offset-md-4">
                       <div class="checkbox">
                         <label>
                         {!! Form::checkbox('remember')!!} Ingat saya
                         </label>
                       </div>
                     </div>
                   </div>
                   <div class="form-group row mb-3">
                     <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-sign-in"></i> Login
                      </button>
                      <a class="btn btn-link" href="{{ url('/password/reset') }}">Lupa password</a>
                     </div>
                   </div>
                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
