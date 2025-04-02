<div class="form-group row mb-3{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nama', ['class'=>'col-md-2 col-form-label text-md-end control-label']) !!}
    <div class="col-md-4">
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row mb-3{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Email', ['class'=>'col-md-2 col-form-label text-md-end control-label']) !!}
    <div class="col-md-4">
        {!! Form::email('email', null, ['class'=>'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row mb-3">
    <div class="col-md-4 offset-md-2">
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
    </div>
</div>