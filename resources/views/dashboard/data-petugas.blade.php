@extends('dashboard.layout')

@section('layout')

<table class="table table-hover">
    <thead>
      <tr style="text-align: center">
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Username</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($user as $users)
            <tr style="text-align: center">
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $users->name }}</td>
                <td>{{ $users->username }}</td>
                <td>{{ $users->role }}</td>
                <td>
                    <form method="POST" action="{{ route('delete.petugas', $users->id) }}" class="d-flex" style="justify-content: center">
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
