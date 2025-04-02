<div class="form-group row mb-3{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('title', 'Judul', ['class'=>'col-md-2 col-form-label text-md-end control-label']) !!}
    <div class="col-md-4">
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row mb-3{!! $errors->has('author_id') ? 'has-error' : '' !!}">
    {!! Form::label('author_id', 'Penulis', ['class'=>'col-md-2 col-form-label text-md-end control-label']) !!}
    <div class="col-md-4">
        {!! Form::select('author_id', [''=>'']+App\Models\Author::pluck('name','id')->all(), null, ['class'=>'js-selectize', 'placeholder' => 'Pilih Penulis']) !!}
        {!! $errors->first('author_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row mb-3{{ $errors->has('amount') ? ' has-error' : '' }}">
    {!! Form::label('amount', 'Jumlah', ['class'=>'col-md-2 col-form-label text-md-end control-label']) !!}
    <div class="col-md-4">
        {!! Form::number('amount', null, ['class'=>'form-control', 'min'=>1]) !!}
        {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
        @if (isset($book))
            <p class="help-block">{{ $book->borrowed }} buku sedang dipinjam</p>
        @endif
    </div>
</div>

<div class="form-group row mb-3{{ $errors->has('cover') ? ' has-error' : '' }}">
    {!! Form::label('cover', 'Cover', ['class'=>'col-md-2 col-form-label text-md-end control-label']) !!}
    <div class="col-md-4">
        {!! Form::file('cover') !!}
        @if (isset($book) && $book->cover)
            <p>
                {!! Html::image(asset('img/'.$book->cover), null, ['class'=>'rounded img-fluid']) !!}
            </p>
        @endif
        {!! $errors->first('cover', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row mb-3">
    <div class="col-md-4 offset-md-2">
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
    </div>
</div>