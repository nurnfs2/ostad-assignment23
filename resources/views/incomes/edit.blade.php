@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Income</h2>
        <form action="{{ route('income.update', $income->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Add input fields and populate them with $income values -->
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" name="amount" value="{{ $income->amount }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" value="{{ $income->description }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" value="{{ $income->date }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" name="category" value="{{ $income->category }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Income</button>
            <a href="/income" class="btn btn-danger">Back</a>
        </form>
    </div>
@endsection
