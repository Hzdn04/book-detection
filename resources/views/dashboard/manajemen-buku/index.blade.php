@extends('layouts.master')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen buku</h1>
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
                            <h4>buku</h4>
                            <div class="card-header-action">
                                <form action="{{route('manajemen-buku.index')}}" method="GET">
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
                                        <th>#</th>
                                        <th>Kategori</th>
                                        <th>Kode Barcode</th>
                                        <th>Nama Buku</th>
                                        <th>Penerbit</th>
                                        <th>Penulis</th>
                                        <th>Tempat, Tahun</th>
                                        <th>Editor</th>
                                        <th>Total Halaman</th>
                                        <th>Tempat Buku</th>
                                        <th>Tersedia</th>
                                        <th>gambar</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($dataBuku as $index => $buku)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td>{{$buku->id_kategori}}</td>
                                        <td>{{$buku->kode_barcode}}</td>
                                        <td>{{$buku->nama_buku}}</td>
                                        <td>{{$buku->penerbit}}</td>
                                        <td>{{$buku->penulis}}</td>
                                        <td>{{$buku->tempat_terbit}}, {{$buku->tahun_terbit}}</td>
                                        <td>{{$buku->editor}}</td>
                                        <td>{{$buku->total_halaman}}</td>
                                        <td>{{$buku->tempat_buku}}</td>
                                        <td>{{$buku->buku_tersedia}}</td>
                                         @php $path = Storage::url('images/'.$buku->gambar); @endphp 
                                        <td><img src="{{ url($path) }}" width="100px" height="100px"></td>
                                        <td>
                                            <a href="#" class="btn btn-warning" data-toggle="modal"
                                                data-target="#edit{{$buku->id}}">Edit</a>
                                            <a href="#" class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete{{$buku->id}}">Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            {{ $dataBuku->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Insert-->
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
                <form action="{{route('manajemen-buku.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" placeholder="Masukan uuid" required name="id">
                        </div>
                        {{-- <div class="form-group">
                            <label>Kategori:</label>
                            <select class="form-control" name="id_kategori" required>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select> 
                        </div>--}}
                        <div class="form-group">
                            <label>Kategori:</label>
                            <input type="text" class="form-control" placeholder="Masukan kategori" required name="id_kategori">
                        </div>
                        <div class="form-group">
                            <label>Kode Barcode:</label>
                            <input type="text" class="form-control" placeholder="Masukan Barcpde" required name="kode_barcode">
                        </div>
                        <div class="form-group">
                            <label>Buku:</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama" required name="nama_buku">
                        </div>
                        
                        <div class="form-group">
                            <label>Tempat Terbit:</label>
                            <input type="text" class="form-control" placeholder="Masukan tempat terbit" required
                                name="tempat_terbit">
                        </div>
                        
                        <div class="form-group">
                            <label>Penerbit:</label>
                            <input type="text" class="form-control" placeholder="Masukan Penerbit" required name="penerbit">
                        </div>
                        
                        <div class="form-group">
                            <label>Penulis:</label>
                            <input type="text" class="form-control" placeholder="Masukan Penulis" required name="penulis">
                        </div>
                        <div class="form-group">
                            <label>Tahun Terbit:</label>
                            <input type="text" class="form-control" placeholder="Masukan Tahun terbit" required
                                name="tahun_terbit">
                        </div>
                        <div class="form-group">
                            <label>Editor:</label>
                            <input type="text" class="form-control" placeholder="Masukan Editor" required name="editor">
                        </div>
                        <div class="form-group">
                            <label>Total Halaman:</label>
                            <input type="text" class="form-control" placeholder="Masukan Total Halaman" required name="total_halaman">
                        </div>
                        <div class="form-group">
                            <label>Tempat:</label>
                            <input type="text" class="form-control" placeholder="Masukan Tempat buku" required
                                name="tempat_buku">
                        </div>
                        <div class="form-group">
                            <label>Tersedia:</label>
                            <input type="text" class="form-control" placeholder="Masukan Sedia" required name="buku_tersedia">
                        </div>
                        <div class="form-group">
                            <label>Gambar:</label>
                            <input type="file" class="form-control" placeholder="Masukan gambar" required name="gambar">
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

    @foreach ($dataBuku as $buku)
    <!-- Modal Edit -->
    <div class="modal fade" id="edit{{$buku->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('manajemen-buku.update', $buku->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" value="{{$buku->id}}" class="form-control" placeholder="Masukan uuid" required name="id">
                        </div>
                        {{-- <div class="form-group">
                            <label>Kategori:</label>
                            <select class="form-control" name="id_kategori" required>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select> 
                        </div>--}}
                        <div class="form-group">
                            <label>Kategori:</label>
                            <input type="text" class="form-control" value="{{$buku->id_kategori}}" placeholder="Masukan kategori" required name="id_kategori">
                        </div>
                        <div class="form-group">
                            <label>Kode Barcode:</label>
                            <input type="text" class="form-control" value="{{$buku->kode_barcode}}" placeholder="Masukan Barcpde" required name="kode_barcode">
                        </div>
                        <div class="form-group">
                            <label>Buku:</label>
                            <input type="text" class="form-control" value="{{$buku->nama_buku}}" placeholder="Masukan Nama" required name="nama_buku">
                        </div>
                        
                        <div class="form-group">
                            <label>Tempat Terbit:</label>
                            <input type="text" class="form-control" value="{{$buku->tempat_terbit}}" placeholder="Masukan tempat terbit" required
                                name="tempat_terbit">
                        </div>
                        
                        <div class="form-group">
                            <label>Penerbit:</label>
                            <input type="text" class="form-control" value="{{$buku->penerbit}}" placeholder="Masukan Penerbit" required name="penerbit">
                        </div>
                        
                        <div class="form-group">
                            <label>Penulis:</label>
                            <input type="text" class="form-control" value="{{$buku->penulis}}" placeholder="Masukan Penulis" required name="penulis">
                        </div>
                        <div class="form-group">
                            <label>Tahun Terbit:</label>
                            <input type="text" class="form-control" value="{{$buku->tahun_terbit}}" placeholder="Masukan Tahun terbit" required
                                name="tahun_terbit">
                        </div>
                        <div class="form-group">
                            <label>Editor:</label>
                            <input type="text" class="form-control" value="{{$buku->editor}}" placeholder="Masukan Editor" required name="editor">
                        </div>
                        <div class="form-group">
                            <label>Total Halaman:</label>
                            <input type="text" class="form-control" value="{{$buku->total_halaman}}" placeholder="Masukan Total Halaman" required name="total_halaman">
                        </div>
                        <div class="form-group">
                            <label>Tempat:</label>
                            <input type="text" class="form-control" value="{{$buku->tempat_buku}}" placeholder="Masukan Tempat buku" required
                                name="tempat_buku">
                        </div>
                        <div class="form-group">
                            <label>Tersedia:</label>
                            <input type="text" class="form-control" value="{{$buku->buku_tersedia}}" placeholder="Masukan Sedia" required name="buku_tersedia">
                        </div>
                        <div class="form-group">
                            <label>Gambar:</label>
                            <input type="text" class="form-control" value="{{$buku->gambar}}" placeholder="Masukan gambar" required name="gambar">
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
    <div class="modal fade" id="delete{{$buku->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('manajemen-buku.destroy', $buku->id)}}" method="POST">
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
