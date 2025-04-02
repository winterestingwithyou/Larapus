@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Ubah Password</li>
                </ul>
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Ubah Password</h2>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => url('/settings/password'), 'method' => 'post', 'class'=>'form-horizontal']) !!}
                            <div class="form-group row mb-3{{ $errors->has('password') ? ' has-error' : '' }}">
                                {!! Form::label('password', 'Password lama', ['class'=>'col-md-4 col-form-label text-md-end control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::password('password', ['class'=>'form-control']) !!}
                                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row mb-3{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                {!! Form::label('new_password', 'Password baru', ['class'=>'col-md-4 col-form-label text-md-end control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::password('new_password', ['class'=>'form-control']) !!}
                                    {!! $errors->first('new_password', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row mb-3{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                                {!! Form::label('new_password_confirmation', 'Konfirmasi password baru', ['class'=>'col-md-4 col-form-label text-md-end control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::password('new_password_confirmation', ['class'=>'form-control']) !!}
                                    {!! $errors->first('new_password_confirmation', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection