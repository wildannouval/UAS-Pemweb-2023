<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::latest()->paginate(10);
        return view('supplier.index', compact('suppliers'));
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
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_supplier'     => 'required',
        ]);

        //create post
        Supplier::create([
            'nama_supplier'     => $request->nama_supplier,
        ]);

        //redirect to index
        return redirect()->route('supplier.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //get post by ID
        $supplier = Supplier::findOrFail($id);

        //render view with post
        return view('supplier.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //get post by ID
        $supplier = Supplier::findOrFail($id);

        //render view with post
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validate form
        $this->validate($request, [
            'nama_supplier'     => 'required',
        ]);

        //get post by ID
        $supplier = Supplier::findOrFail($id);

        $supplier->update([
            'nama_supplier'     => $request->nama_supplier,
        ]);


        //redirect to index
        return redirect()->route('supplier.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //get post by ID
        $supplier = Supplier::findOrFail($id);

        //delete post
        $supplier->delete();

        //redirect to index
        return redirect()->route('supplier.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}