<?php

namespace App\Http\Controllers;
use App\Models\MoneyTransfer;

use Illuminate\Http\Request;

class MoneyTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function list()
    // {
    //     $moneytransfer = MoneyTransfer::all();
    //     return view('moneytransfer.list', compact('moneytransfer'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('moneytransfer.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $this->validate($request, [

    //         'date' => 'required|string',
    //         'reference_no' => 'required|string',
    //         'from_account' => 'required|string',
    //         'to_account' => 'required|string',
    //         'accounts_bl' => 'required|string',

    //     ]);

    //     $moneytransfer = new MoneyTransfer;

    //     $moneytransfer->date = $request->date;
    //     $moneytransfer->reference_no = $request->reference_no;
    //     $moneytransfer->from_account = $request->from_account;
    //     $moneytransfer->to_account = $request->to_account;
    //     $moneytransfer->accounts_bl = $request->accounts_bl;

    //     $moneytransfer->save();
    //     return redirect()->route('moneytr.create')->with('success', "New vehicledoc create Successfully");


    
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $moneytransfer = MoneyTransfer::find($id);
    //     return view('moneytransfer.edit', compact('moneytransfer'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $this->validate($request, [

        //     'date' => 'required|string',
        //     'accounts_bl' => 'required|string',

        // ]);

        // $moneytransfer = MoneyTransfer::find($id);

        // $moneytransfer->date = $request->date;
        // $moneytransfer->reference_no = $request->reference_no;
        // $moneytransfer->from_account = $request->from_account;
        // $moneytransfer->to_account = $request->to_account;
        // $moneytransfer->accounts_bl = $request->accounts_bl;
    
        // $moneytransfer->save();
        // return redirect()->route('moneytr.list')->with('success', "vehicle doc Update Successfully");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $moneytransfer = MoneyTransfer::find($id);

    //     $moneytransfer->delete();
    //     return redirect()->route('moneytr.list')->with('success','vehicle doc Deleteed Successfully');
    // }
}
