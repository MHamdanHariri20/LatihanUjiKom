@extends('dashboard.layout')

@section('layout')
<div class="container">
    <form method="POST" action="{{Route('input.petugas')}}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="username">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
