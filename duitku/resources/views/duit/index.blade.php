@extends('layout')

@section('content')
    <div>
        @session('message')
            <div class="alert alert-{{ session('type') }}">
                {{ session('message') }}
            </div>
        @endsession

        @include('partials.balance')

        <div class="float-end">
            <a href="{{ route('duit.create') }}" class="btn btn-success"><i class="bi-plus-lg"></i> Add
                Transaction</a>
        </div>

        <h2><i class="bi bi-card-list"></i> History</h2>
        <hr>
        <ol class="list-group">
            @foreach ($duit as $item)
                <li
                    class="list-group-item d-flex justify-content-between align-items-start {{ $item->type == 'income' ? 'list-group-item-success' : 'list-group-item-danger' }}">
                    <div class="fw-bold"><i class="bi-arrow-down"></i> {{ $item->name }}</div>
                    <div class="d-flex justify-content-between align-items-center gap-2">
                        <span
                            class="badge {{ $item->type === 'income' ? 'text-bg-success' : 'text-bg-danger' }} rounded-pill">{{ number_format($item->amount) }}</span>
                        <button class="btn-close btn-sm"
                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) document.getElementById('delete-form-{{ $item->id }}').submit()"></button>
                        <form action="{{ route('duit.destroy', ['id' => $item->id]) }}" method="POST"
                            id="delete-form-{{ $item->id }}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
@endsection
