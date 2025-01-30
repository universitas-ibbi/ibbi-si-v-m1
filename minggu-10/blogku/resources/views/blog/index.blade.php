@extends('layouts.app')

@section('content')
    @auth
        <div class="d-flex flex-row-reverse my-3">
            <a href="/create" class="btn btn-success">Tambah Baru</a>
        </div>
    @endauth
    @foreach ($posts as $post)
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <p class="text-muted">{{ $post->created_at->diffForHumans() }}</p>
                <p class="card-text">
                    {{ $post->content }}
                </p>
                <a href="{{ route('blog.show', ['id' => $post->id]) }}" class="btn btn-primary">Read More &rarr;</a>
            </div>
        </div>
    @endforeach
@endsection
