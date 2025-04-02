@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Penulis</li>
            </ul>
            <div class="card card-default">
                <div class="card-header">
                    <h2 class="card-title">Penulis</h2>
                </div>
                <div class="card-body">
                    <p> <a class="btn btn-primary" href="{{ route('authors.create') }}">Tambah</a> </p>
                    {!! $html->table(['class'=>'table-striped']) !!}
                </div>
            </div>
        </div>
    </div>
 </div>
 @endsection

 @section('scripts')
    {!! $html->scripts() !!}
 @endsection