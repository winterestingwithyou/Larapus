@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/admin/members') }}">Member</a></li>
                    <li class="breadcrumb-item active">Tambah Member</li>
                </ul>
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Tambah Member</h2>
                </div>
                    <div class="card-body">
                        {!! Form::model($member, ['url' => route('members.update', $member->id), 'method' => 'put', 'class'=>'form-horizontal']) !!}
                        @include('members._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection