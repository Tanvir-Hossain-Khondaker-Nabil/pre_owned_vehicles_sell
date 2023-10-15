<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use App\Models\Customer;
use App\Models\BankAccount;
use Illuminate\Http\Client\Request;
use App\Http\Requests\StoreSellRequest;
use App\Http\Requests\UpdateSellRequest;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'sells' => Sell::with('account')->latest()->get(),
        ];
        return view('sells.create', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'accounts' => BankAccount::latest()->get(),
        ];
        return view('sells.create', $data);
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
        return view('vehicle.create', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        return view('vehicle.create', compact('vehicle'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        return view('vehicle.create', compact('vehicle'));
    }
}
