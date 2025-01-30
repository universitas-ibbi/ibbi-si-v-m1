@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="clearfix"></div>
        <h1>{{ $post->title }}</h1>
        <p class="text-muted">{{ $post->author->name }} - {{ $post->created_at->format('d F Y') }} </p>
        <p>{{ $post->content }}</p>
        <div class="float-end">
            <a href="#" class="btn btn-danger">Hapus</a>
            <a href="{{ route('blog.edit', ['id' => $post->id]) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
@endsection
