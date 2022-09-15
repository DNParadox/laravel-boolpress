@extends('layouts.dashboard')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="mb-3">
            <label for="category_id">Categoria</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Nessuna</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        @foreach ($tags as $tag) 
            <div class=form-check>
                <input  class="form-check-input"
                    type="checkbox" 
                    value="{{ $tag->id}}" 
                    id="tag-{{$tag->id}}"
                    name="tags"
                 >
                <label  class="form-check-label"
                    for="tag-{{$tag->id}}">
                    {{ $tag->name }}
                </label>
            </div>    
        @endforeach

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" class="form-control" id="content" name="content"> </textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label"> Immagini</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>

        <input type="submit" value="Salva post">
    </form>    
@endsection