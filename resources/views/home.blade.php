@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif




                        <a href="#" class="btn btn-primary"><h1>Total Income: {{ Auth::user()->incomes()->sum('amount') }}</h1></a>
                        <br>
                        <br>
                        <a href="#" class="btn btn-danger"><h1>Total Expenses: {{ Auth::user()->expenses()->sum('amount') }}</h1></a>
                        <br>
                        <br>
                        <hr>
                        <a href="#" class="btn btn-success"><h1>Net Income: {{ Auth::user()->incomes()->sum('amount') - Auth::user()->expenses()->sum('amount') }}</h1></a>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
