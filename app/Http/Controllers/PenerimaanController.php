<?php

namespace App\Http\Controllers;

use App\Models\Penerimaan;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        $suppliers = Supplier::all();
        $kategoris = Kategori::all();
        $penerimaans = Penerimaan::latest()->paginate(10);
        return view('penerimaan.index', compact('barangs','penerimaans','suppliers','kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::all();
        $suppliers = Supplier::all();
        $kategoris = Kategori::all();
        return view('penerimaan.create',compact('barangs', 'suppliers', 'kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'id_barang'     => 'required',
            'id_supplier'     => 'required',
            'id_kategori'     => 'required',
        ]);

        //create post
        Penerimaan::create([
            'id_barang'     => $request->id_barang,
            'id_supplier'     => $request->id_supplier,
            'id_kategori'     => $request->id_kategori,
        ]);

        //redirect to index
        return redirect()->route('penerimaan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //get post by ID
        $penerimaan = Penerimaan::findOrFail($id);

        //render view with post
        return view('penerimaan.show', compact('penerimaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //get post by ID
        $barangs = Barang::all();
        $suppliers = Supplier::all();
        $kategoris = Kategori::all();
        $penerimaan = Penerimaan::findOrFail($id);

        //render view with post
        return view('penerimaan.edit', compact('penerimaan','barangs','suppliers','kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validate form
        $this->validate($request, [
            'id_produk'     => 'required',
            'id_supplier'     => 'required',
            'id_kategori'     => 'required',
        ]);

        //get post by ID
        $penerimaan = Penerimaan::findOrFail($id);

        $penerimaan->update([
            'id_produk'     => $request->id_produk,
            'id_supplier'     => $request->id_supplier,
            'id_kategori'     => $request->id_kategori,
        ]);


        //redirect to index
        return redirect()->route('penerimaan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //get post by ID
        $penerimaan = Penerimaan::findOrFail($id);

        //delete post
        $penerimaan->delete();

        //redirect to index
        return redirect()->route('penerimaan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
