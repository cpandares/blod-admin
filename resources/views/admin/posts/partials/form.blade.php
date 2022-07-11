<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class'=>'form-control','placeholder'=>'Title']) !!}

    @error('title')
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
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id',$categories, null, ['class'=>'form-control']) !!}

    @error('category_id')
    <span class="text-danger">{{ $message }}</span>
    @enderror

</div>

<div class="form-group">
    <p class="font-weigth-bold">Tags</p>

    @foreach ($tags as $tag)
    <label class="mr-2">
        {!! Form::checkbox('tags[]', $tag->id,null,null) !!}
        {{ $tag->name }}
    </label>
    @endforeach

    @error('tags')
    <br>
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <p class="font-weigth-bold">Status</p>

    <label class="mr-2">
        {!! Form::radio('status', 1,true) !!}
        Pending
    </label>
    <label class="mr-2">
        {!! Form::radio('status', 2) !!}
        Publish
    </label>

    @error('status')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">

    <div class="row">

        <div class="col">
            @isset($post->image)
            <div class="image-wrapper">
                <img src="{{ $post->image->url }}" alt="" id="picture">
            </div>
            @else
            <div class="image-wrapper">
                <img src="https://t3.ftcdn.net/jpg/02/48/42/64/240_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg" alt="" id="picture">
            </div>
            @endisset
        </div>
        <div class="col">
            {!! Form::label('file', 'Image Cover') !!}
            {!! Form::file('file', ['class'=>'form-control', 'accept'=>'image/*']) !!}
            
            @error('file')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

    </div>

</div>

<div class="form-group">
    {!! Form::label('extract', 'Extract') !!}
    {!! Form::textarea('extract', null, ['class'=>'form-control']) !!}

    @error('extract')
    <span class="text-danger">{{ $message }}</span>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('body', 'Content') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}

    @error('body')
    <span class="text-danger">{{ $message }}</span>
    @enderror

</div>