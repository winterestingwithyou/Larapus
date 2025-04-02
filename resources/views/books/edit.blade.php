@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/admin/books') }}">Buku</a></li>
                    <li class="breadcrumb-item active">Ubah Buku</li>
                </ul>
                <div class="card card-default">
                    <div class="card-header">
                        <h2 class="card-title">Ubah Buku</h2>
                    </div>
                    <div class="card-body">
                        {!! Form::model($book, ['url' => route('books.update', $book->id),'method' => 'put', 'files'=>'true', 'class'=>'form-horizontal']) !!}
                            @include('books._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection