<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pin->id !!}</p>
</div>

<!-- Pin Id Field -->
<div class="form-group">
    {!! Form::label('pin', 'Pin Id:') !!}
    <p>{!! $pin->pin !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $pin->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $pin->updated_at !!}</p>
</div>

