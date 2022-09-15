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

    <h1>Modifica Post</h1>

    <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title') ? old('title') : $post->title }}">
        </div>

        <div class="mb-3">
            <label for="category_id">Categoria</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Nessuna</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        
        <div class="mb-3">
            <h5>Tags</h5>

            @foreach ($tags as $tag)
                @if ($errors->any())
                    {{-- Se ci sono errori di validazione valuto la old() per capire dove mettere il checked --}}
                    <div class="form-check">
                        <input class="form-check-input" 
                        type="checkbox" 
                        value="{{ $tag->id }}" 
                        id="tag-{{ $tag->id }}" 
                        name="tags[]"
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : ''}}
                        >
                        <label class="form-check-label" for="tag-{{ $tag->id }}">
                            {{ $tag->name }}
                        </label>
                    </div>
                @else
                    {{-- Altrimenti se non ci sono errori di validazione
                        sto caricando la pagina per la prima volta
                        quindi valuto la collection dei tags --}}
                    <div class="form-check">
                        <input class="form-check-input" 
                        type="checkbox" 
                        value="{{ $tag->id }}" 
                        id="tag-{{ $tag->id }}" 
                        name="tags[]"
                        {{ $post->tags->contains($tag) ? 'checked' : ''}}
                        >
                        <label class="form-check-label" for="tag-{{ $tag->id }}">
                            {{ $tag->name }}
                        </label>
                    </div>
                @endif
            @endforeach
        </div>
        
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" class="form-control" id="content" name="content">{{ old('content' , $post->content)}} </textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label"> Immagini</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>

        @if ($post->cover)
            <figure>
                <figcaption> Immagine corrente:</figcaption>
                <img class="w-50" src="{{ asset('/storage/' . $post->cover) }}" alt="{{ $post->title}}">
            </figure>
        @endif


        <input type="submit" value="Salva modifiche">
        </form>    
    
@endsection