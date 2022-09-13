<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Barang;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $pembelian = Pembelian::all();
        return view('pembelian.index', compact('pembelian', 'barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'barang_id' => 'required',
            'jumlah'    => 'required|numeric',
            'harga'     => 'required|numeric',
        ]);


        $pembelian = Pembelian::create([
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga
        ]);

        $id_barang = $request->barang_id;
        $barang = Barang::find($id_barang);
        $barang->stok += $request->jumlah;
        $barang->update();

        $pembelian->save();

        // $barang = Pembelian::where('id', $pembelian->id)->get();

        // foreach($barang as $item){
        //     $barangs = Barang::find($item->id);
        //     $barangs->stok += $item->jumlah;
        //     $barangs->update();
        // }

        return redirect('pembelian');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembelian = Pembelian::find($id);
        return view('pembelian.form', compact('pembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::all();
        $pembelian = Pembelian::find($id);
        return view('pembelian.form', compact('pembelian', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        $validate = $request->validate([
            'barang_id' => 'required',
            'jumlah'    => 'required|numeric',
            'harga'     => 'required|numeric',
        ]);


        $pembelian->update([
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga
        ]);

        $id_barang = $request->barang_id;
        $barang = Barang::find($id_barang);
        $barang->stok += $request->jumlah;
        $barang->update();

        return redirect('pembelian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->delete();
        return redirect('pembelian');
    }
}
