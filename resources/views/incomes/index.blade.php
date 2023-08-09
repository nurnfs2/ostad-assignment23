@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Income Records</h2>
        <a href="/add-income" class="btn btn-primary">Add Income</a>
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
                @foreach ($incomes as $income)
                    <tr>
                        <td>{{ $income->amount }}</td>
                        <td>{{ $income->description }}</td>
                        <td>{{ $income->date }}</td>
                        <td>{{ $income->category }}</td>
                        <td>
                            <a href="{{ route('income.edit', $income->id) }}">Edit</a>
                            <form action="{{ route('income.destroy', $income->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $incomes->links() }}
    </div>
@endsection
