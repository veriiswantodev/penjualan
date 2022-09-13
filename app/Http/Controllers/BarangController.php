<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Suplier;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $suplier = Suplier::all();
        return view('barang.add', compact('kategori', 'suplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request;
        $validate = $request->validate([
            'nama' => 'required|max:255|alpha',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric|min:1',
            'suplier_id' => 'required',
            'kategori_id' => 'required'
        ]);

        $barang = Barang::create($request->all());
        return redirect('barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suplier = Suplier::all();
        $kategori = Kategori::all();
        $b = Barang::find($id);
        return view('barang.edit', compact('b', 'suplier', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $validate = $request->validate([
            'nama' => 'required|max:255|alpha',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric|min:1',
            'suplier_id' => 'required',
            'kategori_id' => 'required'
        ]);

        $barang->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'suplier_id' => $request->suplier_id,
            'kategori_id' => $request->kategori_id,
        ]);
        return redirect('barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return redirect('barang');
    }
}
