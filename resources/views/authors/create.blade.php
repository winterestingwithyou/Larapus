@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/admin/authors') }}">Penulis</a></li>
                    <li class="breadcrumb-item active">Tambah Penulis</li>
                </ul>
                <div class="card card-default">
                    <div class="card-header">
                        <h2 class="card-title">Tambah Penulis</h2>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => route('authors.store'), 'method' => 'post', 'class'=>'form-horizontal']) !!}
                            @include('authors._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection