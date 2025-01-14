@extends('layouts.app')

@section('content')
<div class="container">
    <form action={{ route("setting.simpan") }} method="POST">
        @csrf
        <div>
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="" class="form-control"
                value="{{ $setting->title }}">
        </div>
        <div>
            <label for="subtitle" class="form-label">Subtitle</label>
            <input type="text" name="subtitle" id="" class="form-control"
                value="{{ $setting->subtitle }}">
        </div>
        <div>
            <label for="about">About</label>
            <textarea name="about" id="" cols="30" rows="10" class="form-control">
                {{ $setting->about }}
            </textarea>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
