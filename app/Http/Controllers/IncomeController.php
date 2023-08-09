<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    //


    public function index()
    {
        $incomes = Auth::user()->incomes()->paginate(10);
        return view('incomes.index', compact('incomes'));
    }

    public function addIncome()
    {
        return view('incomes.add');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required',
            'date' => 'required|date',
            'category' => 'required',
        ]);

        $income = new Income($validatedData);
        $income->user_id = Auth::id();
        $income->save();

        return redirect()->route('income.index')->with('success', 'Income record created successfully.');
    }



    public function edit(Income $income)
    {
        return view('incomes.edit', compact('income'));
    }

    public function update(Request $request, Income $income)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required',
            'date' => 'required|date',
            'category' => 'required',
        ]);

        $income->update($validatedData);

        return redirect()->route('income.index')->with('success', 'Income record updated successfully.');
    }

    public function destroy(Income $income)
    {
        $income->delete();
        return redirect()->route('income.index')->with('success', 'Income record deleted successfully.');
    }



}
