<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'suppliers' => Supplier::paginate(),
        ];
        return view('supplier.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
            $supplier_data = $request->except(['avatar']);

            $file = " ";

            if($file = $request->file('avatar')){
                $imageName = time().'-supplier'.'.'.$file->getClientOriginalExtension();
                $supplier_data['avatar'] = $file->move('upload/supplier/',$imageName);
            }

            Supplier::create($supplier_data);
            session()->put('success', 'Item created successfully.');
            return redirect()->route('suppliers.index');
            
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view ('supplier.create',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, supplier $supplier)
    {
        $supplier_data = $request->except(['avatar']);

        $file = " ";
        $deleteOldImage = $supplier->avatar;

        if($file = $request->file('avatar')){
            if(file_exists($deleteOldImage)){
                unlink($deleteOldImage);
            }
            $imageName = time().'-supplier'.'.'.$file->getClientOriginalExtension();
            $supplier_data['avatar'] = $file->move('upload/history/',$imageName);
        }
        else{
            $supplier_data['avatar'] = $supplier->avatar;
        }

        $supplier->update($supplier_data);

        session()->put('success', 'Item Updated successfully.');

        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $deleteOldImage = $supplier->avatar;
        if(file_exists($deleteOldImage)){
            unlink($deleteOldImage);
        }

        $supplier->delete();
        session()->put('success', 'Item Deleted successfully.');
        return redirect()->back();
    }
}