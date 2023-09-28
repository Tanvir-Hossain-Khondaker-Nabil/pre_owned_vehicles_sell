<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::with('account','expense_category')->latest()->paginate(15);
        return view('expense.list', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accounts = Account::pluck('account_name','id');
        $expense_catagories = ExpenseCategory::pluck('name','id');
        return view('expense.create' , compact('accounts','expense_catagories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Expense::create($request->all());
        session()->put('success', 'Expense created successfully');
        return redirect()->route('expenses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $accounts = Account::pluck('account_name','id');
        $expense_catagories = ExpenseCategory::pluck('name','id');
        return view('expense.create', compact('accounts','expense_catagories','expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $expense->update($request->all());
        session()->put('success', 'Expense updated successfully');
        return redirect()->route('expenses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        session()->put('success', 'Expense deleted successfully');
        return redirect()->back();
    }
}