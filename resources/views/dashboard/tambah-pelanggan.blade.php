@extends('dashboard.layout')

@section('layout')

<form action="{{route('tambah.pelanggan.data')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label class="form-label">Nama Lengkap</label>
      <input type="text" name="namalengkap" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Nomor Telepon</label>
      <input type="number" name="nomortelepon" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" type="text" rows="5" class="form-control"></textarea>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
