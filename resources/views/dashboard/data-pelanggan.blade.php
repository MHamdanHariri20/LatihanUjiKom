@extends('dashboard.layout')

@section('layout')

<table class="table table-hover">
    <thead>
      <tr style="text-align: center">
        <th scope="col">No</th>
        <th scope="col">Nama Lengkap</th>
        <th scope="col">Nomor Telepon</th>
        <th scope="col">Alamat</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($pelanggan as $pelanggans)
            <tr style="text-align: center">
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $pelanggans->namalengkap }}</td>
                <td>{{ $pelanggans->nomortelepon }}</td>
                <td style="word-break: break-all; word-wrap: break-word;">{{ $pelanggans->alamat }}</td>
                <td>
                    <form method="POST" action="{{ route('delete.pelanggan', $pelanggans->id) }}" class="d-flex" style="justify-content: center">
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
