@extends('layouts.admin')
@section('sub-judul','User')
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="section-body">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="card">
                <div class="card-header">
                    <h4>Input Data User</h4>
                </div>
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Masukkan Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <select class="form-control" name="tipe">
                                <option value="">--PILIH--</option>
                                <option value="1">Adminstrator</option>
                                <option value="0">Penulis</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button href="" class="btn btn-primary"> <i class="fas fa-save"></i>
                                Tambah Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection