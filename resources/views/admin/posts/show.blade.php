@extends('layouts.dashboard')

@section('content')
    <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">Modifica Post</a>
    

    <form class="mt-2" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
        @csrf
        @method('delete')

        <input class="btn btn-danger" type="submit" value="Cancella post" onClick="return confirm('Sei sicuro di voler cancellare?')">
    </form>

    <h1>{{ $post->title }}</h1>

    <div>
        <strong>Creato il:  </strong> {{ $post->created_at->format(' d F Y') }}
    </div>

    <div>
        <strong>Aggiornato il:  </strong> {{ $post->updated_at->format('d F Y') }}
    </div>

    <div>
        <strong>Slug:</strong> {{ $post->slug }}
    </div>

    
    <div>
        <strong>Categoria: </strong> {{ $post->category ? $post->category->name : 'nessuna' }}
    </div>
    
    <div>
        <strong> Tags:</strong> 

     @forelse ($post->tags as $tag)
         {{ $tag->name }} {{ !$loop->last ? ',' : ''}}
     @empty
         nessuno
     @endforelse
    </div>

    @if ($post->cover)
        <figure>
            <figcaption> Immagine corrente:</figcaption>
            <img class="w-50" src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title}}">
        </figure>
    @endif


    <h3 class="mt-3">Contenuto: </h3>
    <p> {{ $post->content }}</p>
@endsection