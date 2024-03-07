@extends('dashboard.layout')

@section('layout')

<form action="{{ route('edit', $stok->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label class="form-label">Nama Produk</label>
      <input type="text" name="namaproduk" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Harga</label>
      <input type="number" name="harga" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Stok Barang</label>
        <input type="number" name="stok" class="form-control">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
