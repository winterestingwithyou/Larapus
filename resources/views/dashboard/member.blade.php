@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2 class="card-title">Dashboard</h2>
                </div>
                <div class="card-body">
                    Selamat datang di Larapus.
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="text-muted">Buku dipinjam</td>
                                <td>
                                    @if ($borrowLogs->count() == 0)
                                        Tidak ada buku dipinjam
                                    @endif

                                    <ul>
                                        @foreach ($borrowLogs as $borrowLog)
                                            <li>
                                                {!! Form::open(['url' => route('member.books.return', $borrowLog->book_id),
                                                    'method' => 'put',
                                                    'class' => 'form-inline js-confirm',
                                                    'data-confirm' => "Anda yakin hendak mengembalikan " . $borrowLog->book->title . "?"] ) !!}

                                                    {{ $borrowLog->book->title }}
                                                    {!! Form::submit('Kembalikan', ['class'=>'btn btn-sm btn-light']) !!}
                                                    
                                                {!! Form::close() !!}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection