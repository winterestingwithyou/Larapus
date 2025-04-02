@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/admin/authors') }}">Penulis</a></li>
                <li class="breadcrumb-item active">Ubah Penulis</li>
            </ul>
            <div class="card card-default">
                <div class="card-header">
                    <h2 class="card-title">Ubah Penulis</h2>
                </div>
                <div class="card-body">
                    {!! Form::model($author, ['url' => route('authors.update', $author->id), 'method'=>'put', 'class'=>'form-horizontal']) !!}
                        @include('authors._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection