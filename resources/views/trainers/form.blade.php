<!--sub vista para embeber-->
<div class="form-group">
    {!!Form::label('name','Nombre')!!}
    {!!Form::text('name',null,['class'=>'form-control'])!!}            
</div>
<div class="form-group">
    {!!Form::label('name','Slug')!!}
    {!!Form::text('slug',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('avatar','Avatar')!!}
    {!!Form::file('avatar')!!}
</div>