@extends('layouts.admin')
@section('sub-judul','Kategori')
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
                    <h4>Edit Kategori {{$category->name}}</h4>
                </div>
                <form action="{{route('category.update',$category->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" class="form-control" value="{{$category->name}}"
                                placeholder="Masukkan Nama Kategori" name="name">
                        </div>
                        <div class="form-group">
                            <button href="" class="btn btn-primary"> <i class="fas fa-save"></i>
                                Edit Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection