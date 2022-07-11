<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name',null,['class'=>'form-control', 'placeholder'=>'New Role']) !!}
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<h3>All Permitions</h3>

@foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null,['class'=>'mr-2']) !!}
            {{ $permission->description }}
        </label>
    </div>
@endforeach