<div class="form-group">
    {!! Form::label(trans('form.title')) !!}
    {!! Form::text('title',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label(trans('form.content')) !!}
    {!! Form::textarea('content',null,['id' => 'myEditor']) !!}
</div>
<div class="form-gourp">
    {!! Form::submit(trans('form.submit'),['class' => 'btn btn-primary']) !!}
</div>