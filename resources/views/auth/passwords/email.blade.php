@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   {!! Form::open(['url'=>'/password/email', 'class'=>'form-horizontal'])!!}
                     <div class="form-group row mb-3{{ $errors->has('email') ? ' has-error' : '' }}">
                       {!! Form::label('email', 'Alamat Email', ['class'=>'col-md-4 col-form-label text-md-end control-label ']) !!}
                       <div class="col-md-6">
                         {!! Form::email('email', null, ['class'=>'form-control']) !!}
                         {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                       </div>
                     </div>
                     <div class="form-group row mb-3">
                       <div class="col-md-6 offset-md-4">
                         <button type="submit" class="btn btn-primary">
                           <i class="fa fa-btn fa-envelope"></i> Kirim link reset password
                         </button>
                       </div>
                     </div>
                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
