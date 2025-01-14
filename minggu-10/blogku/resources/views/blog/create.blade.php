@extends('layouts.app')

@section('content')
    <h1>Tambah Post</h1>
    <form action="/simpan" method="POST">
        @csrf
        <div>
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mt-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-success">Tambah</button>
            <a href="/" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection
