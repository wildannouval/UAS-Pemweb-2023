<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::latest()->paginate(10);
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_barang'     => 'required',
            'keterangan_barang'     => 'required',
            'jumlah_barang'   => 'required'
        ]);

        //create post
        Barang::create([
            'nama_barang'     => $request->nama_barang,
            'keterangan_barang' => $request->keterangan_barang,
            'jumlah_barang'   => $request->jumlah_barang,
        ]);

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //get post by ID
        $barang = Barang::findOrFail($id);

        //render view with post
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //get post by ID
        $barang = Barang::findOrFail($id);

        //render view with post
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validate form
        $this->validate($request, [
            'nama_barang'     => 'required',
            'keterangan_barang'     => 'required',
            'jumlah_barang'   => 'required'
        ]);

        //get post by ID
        $barang = Barang::findOrFail($id);

        $barang->update([
            'nama_barang'     => $request->nama_barang,
            'keterangan_barang' => $request->keterangan_barang,
            'jumlah_barang'   => $request->jumlah_barang,
            ]);


        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //get post by ID
        $barang = Barang::findOrFail($id);

        //delete post
        $barang->delete();

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
