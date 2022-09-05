@extends('layouts.dashboard')


@section('content')
    <h1>Lista Post</h1>


    <div class="row row-cols-3">
        @foreach ($posts as $post)
        {{-- Carta singola --}}
        <div class="col">
            <div class="card mt-3" style="width: 18rem;">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                  <h4 class="card-title">{{ $post->title }} </h4>
                  {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                  <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Guarda Dettagli</a>
                </div>     
            </div>
        </div>
        {{-- Fine carta --}}
        @endforeach
    </div>

@endsection