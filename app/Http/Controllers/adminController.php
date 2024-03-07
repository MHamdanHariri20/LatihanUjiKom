<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

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
}
