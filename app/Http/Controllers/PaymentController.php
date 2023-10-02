<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment = Payment::with('account')->latest()->paginate(15);
        return view('payment.create', compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accounts = Account::pluck('account_name','id');
        return view('payment.create', compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('payment.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('payment.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        return view ('vehicle.create',compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        return view ('vehicle.create',compact('vehicle'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        return view ('vehicle.create',compact('vehicle'));
    }
}
