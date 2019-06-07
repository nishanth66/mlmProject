
<center>
    <input type="hidden" value="" name="pin">
    <div class="form-group col-sm-12">
        {!! Form::submit('Generate New Pin', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('pins.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</center>
