@extends('layout')

@section('content')
    <div>
        @include('partials.balance')

        <h1><i class="bi-cash-stack"></i> Form Transaction</h1>
        <hr>
        <form action="{{ route('duit.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select name="type" id="type" class="form-control">
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" name="amount" id="amount" class="form-control">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-floppy"></i> Save Transaction
                </button>
                <button type="button" class="btn btn-danger" onclick="window.history.back();">
                    <i class="bi bi-x-circle-fill"></i> Cancel
                </button>
            </div>
        </form>
    </div>
@endsection
