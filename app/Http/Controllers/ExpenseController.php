<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    //


    public function index()
    {
        $expenses = Auth::user()->expenses()->paginate(10);
        return view('expenses.index', compact('expenses'));
    }


    public function addExpenses()
    {
        return view('expenses.add');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required',
            'date' => 'required|date',
            'category' => 'required',
        ]);

        $expense = new Expense($validatedData);
        $expense->user_id = Auth::id();
        $expense->save();

        return redirect()->route('expense.index')->with('success', 'Expense record created successfully.');
    }


    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required',
            'date' => 'required|date',
            'category' => 'required',
        ]);

        $expense->update($validatedData);

        return redirect()->route('expense.index')->with('success', 'Income record updated successfully.');
    }


    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expense.index')->with('success', 'Income record deleted successfully.');
    }



}
