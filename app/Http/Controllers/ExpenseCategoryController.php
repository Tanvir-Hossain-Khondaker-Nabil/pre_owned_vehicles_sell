<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'expensecategories' => ExpenseCategory::paginate(),
        ];
        return view('expense-category.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expense-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ExpenseCategory::create($request->all());
        session()->put('success', 'Expense Categories created successfully');
        return redirect()->route('expense-categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseCategory $expenseCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExpenseCategory $expenseCategory)
    {
        return view('expense-category.create', compact('expenseCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExpenseCategory $expenseCategory)
    {
        $expenseCategory->update($request->all());
        session()->put('success', 'Expense Categories updated successfully');
        return redirect()->route('expense-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseCategory $expenseCategory)
    {
       $expenseCategory->delete();
        session()->put('success', 'Account deleted successfully');
        return redirect()->back();
    }
}