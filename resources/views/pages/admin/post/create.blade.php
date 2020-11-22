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
                    <h4>Input Data Kategory</h4>
                </div>
                <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Judul</label>
                            <input type="text" class="form-control" placeholder="Masukkan Judul" name="judul">
                        </div>
                        <div class="form-group">
                            <label for="nama">Kategori</label>
                            <select name="category_id" class="form-control select2" id="">
                                <option value="">--PILIH--</option>
                                @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select2 Multiple</label>
                            <select class="form-control select2" multiple="" name="tags[]">
                                @foreach ($tag as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Konten</label>
                            <textarea name="content" class="form-control konten" id="konten" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" class="form-control" placeholder="Masukkan Judul" name="gambar">
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
<link rel="stylesheet" href="{{url('backend/assets/modules/select2/dist/css/select2.min.css')}}">
@push('addon-style')
@endpush

@push('addon-script')
<script src="{{url('backend/assets/modules/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('backend/assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
<script>
    CKEDITOR.replace( 'konten' );
</script>
@endpush