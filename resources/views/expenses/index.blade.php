@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Expenses Records</h2>
        <a href="/add-expenses" class="btn btn-primary">Add Expenses</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expenses as $expense)
                    <tr>
                        <td>{{ $expense->amount }}</td>
                        <td>{{ $expense->description }}</td>
                        <td>{{ $expense->date }}</td>
                        <td>{{ $expense->category }}</td>
                        <td>
                            <a href="{{ route('expense.edit', $expense->id) }}">Edit</a>
                            <form action="{{ route('expense.destroy', $expense->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $expenses->links() }}
    </div>
@endsection
