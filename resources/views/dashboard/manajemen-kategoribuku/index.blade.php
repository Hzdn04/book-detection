@extends('layouts.master')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Kategori Buku</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h4>BukuKategori</h4>
                            <div class="card-header-action">
                                <form action="{{route('manajemen-kategoribuku.index')}}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="search">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <button class="btn btn-success ml-2" data-toggle="modal"
                                data-target="#exampleModal">Tambah</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori Buku</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($dataKategoriBuku as $index => $BukuKategori)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td>{{$BukuKategori->nama_kategori}}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning" data-toggle="modal"
                                                data-target="#edit{{$BukuKategori->id}}">Edit</a>
                                            <a href="#" class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete{{$BukuKategori->id}}">Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            {{ $dataKategoriBuku->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('manajemen-kategoribuku.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>UUID:</label>
                            <input type="hidden" class="form-control" placeholder="Masukan uuid" required name="id">
                        </div>
                        <div class="form-group">
                            <label>Nama Kategori:</label>
                            <input type="text" class="form-control" placeholder="Masukan Kategori" required name="nama_kategori">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($dataKategoriBuku as $BukuKategori)
    <!-- Modal Edit -->
    <div class="modal fade" id="edit{{$BukuKategori->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('manajemen-kategoribuku.update', $BukuKategori->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>UUID:</label>
                            <input type="text" class="form-control" placeholder="Masukan uuid" required
                                value="{{$BukuKategori->id}}" name="id">
                        </div>
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama" required
                                value="{{$BukuKategori->nama_kategori}}" name="nama_kategori">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="delete{{$BukuKategori->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('manajemen-kategoribuku.destroy', $BukuKategori->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <h6>Apakah anda yakin ingin menghapus data ini?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection
