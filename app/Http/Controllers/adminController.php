<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;

use Carbon\Carbon;

class adminController extends Controller
{
    public function dashboard(){
        return view('dashboard.dashboard');
    }

    public function stok(){
        $stok = Produk::all();
        return view('dashboard.stok', compact('stok'));
    }

    public function tambahStok(Request $request){
        $request->validate([
            'namaproduk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        Produk::create([
            'namaproduk' => $request->namaproduk,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);
        return redirect()->back();
    }

    public function pendataan(){
        return view('dashboard.pendataan');
    }

    public function editStok($id){
        $stok = Produk::where('id', $id)->first();
        return view('dashboard.edit-stok', compact('stok'));
    }

    public function edit(Request $request, $id)
    {
        $product = Produk::findOrFail($id);
        $validatedProduct = $request->validate([
            'namaproduk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        $product->update($validatedProduct);
        return redirect()->back();
    }

    public function deleteStok($id){
        $product = Produk::findOrFail($id);
        $product->delete();

        return redirect()->back();
    }

    public function dataPelanggan(){
        $pelanggan = Pelanggan::all();
        return view('dashboard.data-pelanggan', compact('pelanggan'));
    }

    public function tambahPelanggan(){
        return view('dashboard.tambah-pelanggan');
    }

    public function tambahPelanggandata(Request $request){
        $request->validate([
            'namalengkap' => 'required',
            'alamat' => 'required',
            'nomortelepon' => 'required',
        ]);

        Pelanggan::create([
            'namalengkap' => $request->namalengkap,
            'alamat' => $request->alamat,
            'nomortelepon' => $request->nomortelepon,
        ]);

        return redirect()->back();
    }

    public function deletePelanggan($id){
        $pelanggan = Pelanggan::FindOrFail($id);
        $pelanggan->delete();

        return redirect()->back();
    }

    public function dataPenjualan(){
        return view('dashboard.data-penjualan');
    }

    public function tambahPenjualan(){
        $pelanggan = Pelanggan::all();
        $produk = Produk::all();
        return view('dashboard.input-penjualan', compact('pelanggan', 'produk'));
    }

    public function tambahPenjualanData(Request $request){
        $request->validate([
            'produkId' => 'required',
            'pelangganId' => 'required',
            'subtotal' => 'required',
            'jumlahproduk' => 'required',
        ]);

        $penjualan = Penjualan::create([
            'pelangganId' => $request->pelangganId,
            'totalharga' => $request->subtotal,
            'tanggalpenjualan' => Carbon::now(),
        ]);

        DetailPenjualan::create([
            'produkId' => $request->produkId,
            'penjualanId' => $penjualan->id,
            'subtotal' => $request->subtotal,
            'jumlahproduk' => $request->jumlahproduk,
        ]);

        return redirect()->back();
    }
}
