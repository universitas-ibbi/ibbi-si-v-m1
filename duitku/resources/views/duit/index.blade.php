@extends('layout')

@section('content')
    <div>
        @session('message')
            <div class="alert alert-{{ session('type') }}">
                {{ session('message') }}
            </div>
        @endsession

        <div class="text-center mt-4">
            <h2>Your Balance</h2>
            <p class="fs-2 fw-bold">Rp 9.999,00</p>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="card-title"><i class="bi-arrow-up"></i> INCOMES</div>
                            <div class="card-text text-success fs-2 fw-bold">Rp 10.000</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="card-title"><i class="bi-arrow-down"></i> EXPENSES</div>
                            <div class="card-text text-danger fs-2 fw-bold">Rp 12.000</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="float-end">
            <a href="{{ route('duit.create') }}" class="btn btn-success"><i class="bi-plus-lg"></i> Add
                Transaction</a>
        </div>

        <h2><i class="bi bi-card-list"></i> History</h2>
        <hr>
        <ol class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-start list-group-item-success">
                <div class="fw-bold"><i class="bi-arrow-up"></i> Income 1</div>
                <div class="d-flex justify-content-between align-items-center gap-2">
                    <span class="badge text-bg-success rounded-pill">+10,000</span>
                    <button class="btn-close btn-sm"
                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) document.getElementById('delete-form-1').submit()"></button>
                    <form action="{{ route('duit.destroy', ['id' => 1]) }}" method="POST" id="delete-form-1">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start list-group-item-danger">
                <div class="fw-bold"><i class="bi-arrow-down"></i> Expense 1</div>
                <div class="d-flex justify-content-between align-items-center gap-2">
                    <span class="badge text-bg-danger rounded-pill">-1,000</span>
                    <button class="btn-close btn-sm"
                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) document.getElementById('delete-form-2').submit()"></button>
                    <form action="{{ route('duit.destroy', ['id' => 2]) }}" method="POST" id="delete-form-2">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start list-group-item-success">
                <div class="fw-bold"><i class="bi-arrow-up"></i> Income 2</div>
                <div class="d-flex justify-content-between align-items-center gap-2">
                    <span class="badge text-bg-success rounded-pill">+500</span>
                    <button class="btn-close btn-sm" id="delete-form-3"
                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) document.getElementById('delete-form-2').submit()"></button>
                    <form action="{{ route('duit.destroy', ['id' => 3]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </li>
        </ol>
    </div>
@endsection
