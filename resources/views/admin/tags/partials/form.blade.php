<div class="form-group">
    {!! Form::label('name', 'Name Category') !!}
    {!! Form::text('name',null , ['class'=>'form-control','placeholder'=>'New Tag']) !!}

    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Slug', 'readonly']) !!}

    @error('slug')
    <span class="text-danger">{{ $message }}</span>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('color', 'Color') !!}
    {!! Form::select('color',$colors, null, ['class'=>'form-control']) !!}

    @error('color')
    <span class="text-danger">{{ $message }}</span>
    @enderror

</div>