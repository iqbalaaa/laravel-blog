@extends('layouts.admin')
@section('sub-judul','Post Hapus')
@section('content')

<!-- Main Content -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {{Session('success')}}
    </div>
</div>
@endif

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="ukuran-huruf">Table Data Post</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ( $post as $items )
                                <?php $no++; ?>
                                <tr>
                                    <td>
                                        {{$no}}
                                    </td>
                                    <td>{{$items->judul}}</td>
                                    <td>{{$items->category->name}}</td>
                                    <td>@foreach ($items->tags as $tag)
                                        <ul>
                                            <li>{{$tag->name}}</li>
                                        </ul>
                                        @endforeach</td>
                                    <td><img src="{{asset($items->gambar)}}" class="img-fluid" width="100px" alt="">
                                    </td>
                                    <td class="">
                                        <a href="{{route('post.restore',$items->id)}}" class="btn btn-primary"><i
                                                class="fas fa-undo"></i>
                                        </a>
                                        <form action="{{route('post.kill',$items->id)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('addon-style')
<style>
    table {
        font-size: 14px;
    }
</style>
<style>
    .card-header {
        font-size: 20px;
    }
</style>
@endpush

@endsection
@push('addon-script')
{{-- <script src="{{url('backend/assets/js/page/modules-datatables.js')}}"></script> --}}
<script>
    $(document).ready( function () {
    $('#table-1').DataTable();
} );

$("#table-1").dataTable({
  "columnDefs": [
    { "sortable": false, "targets": [3,4] }
  ]
});
</script>
@endpush