<?php

namespace App\Http\Controllers;

use App\Models\Customer;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'customers' => Customer::paginate(),
        ];
        return view('customer.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer_data = $request->except(['avatar']);

        $file = " ";

        if($file = $request->file('avatar')){
            $imageName = time().'-customer'.'.'.$file->getClientOriginalExtension();
            $customer_data['avatar'] = $file->move('upload/customer/',$imageName);
        }

        Customer::create($customer_data);
        session()->put('success', 'Item created successfully.');
        return redirect()->route('customers.index');
    }

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
    public function edit(Customer $customer)
    {
        return view ('customer.create',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer_data = $request->except(['avatar']);

        $file = " ";
        $deleteOldImage = $customer->avatar;

        if($file = $request->file('avatar')){
            if(file_exists($deleteOldImage)){
                unlink($deleteOldImage);
            }
            $imageName = time().'-customer'.'.'.$file->getClientOriginalExtension();
            $customer_data['avatar'] = $file->move('upload/history/',$imageName);
        }
        else{
            $customer_data['avatar'] = $customer->avatar;
        }

        $customer->update($customer_data);

        session()->put('success', 'Item Updated successfully.');

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Customer $customer)
    {
        $deleteOldImage = $customer->avatar;
        if(file_exists($deleteOldImage)){
            unlink($deleteOldImage);
        }

        $customer->delete();
        session()->put('success', 'Item Deleted successfully.');
        return redirect()->back();
    }
}