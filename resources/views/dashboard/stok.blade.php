@extends('dashboard.layout')

@section('layout')

<table class="table table-hover">
    <thead>
      <tr style="text-align: center">
        <th scope="col">No</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Harga</th>
        <th scope="col">Stok Barang</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($stok as $stoks)
            <tr style="text-align: center">
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $stoks->namaproduk }}</td>
                <td>{{ $stoks->harga }}</td>
                <td>{{ $stoks->stok }}</td>
                <td>
                    <form method="POST" action="{{ route('delete.stok', $stoks->id) }}" class="d-flex">
                        <a class="btn btn-success me-1" href="{{ route('edit.stok', $stoks->id) }}"><i class="bx bx-edit-alt me-1"></i> Ubah</a>

                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger ms-1" type="submit"><i
                                class="bx bx-trash me-1"></i>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>

@endsection
