@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Expense</h2>
        {{-- <form action="#" method="POST"> --}}
        <form action="{{ route('expense.update', $expense->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Add input fields and populate them with $income values -->
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" name="amount" value="{{ $expense->amount }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" value="{{ $expense->description }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" value="{{ $expense->date }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" name="category" value="{{ $expense->category }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Expense</button>
            <a href="/expense" class="btn btn-danger">Back</a>
        </form>
    </div>
@endsection
