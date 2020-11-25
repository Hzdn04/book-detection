@extends('layouts.master')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen User</h1>
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
                            <h4>User</h4>
                            <div class="card-header-action">
                                <form action="{{route('manajemen-user.index')}}" method="GET">
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
                                        <th>UUID</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat, Tgl Lahir</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($dataUser as $index => $user)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->jenis_kelamin}}</td>
                                        <td>{{$user->tempat_lahir}}, {{$user->tanggal_lahir}}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning" data-toggle="modal"
                                                data-target="#edit{{$user->id}}">Edit</a>
                                            <a href="#" class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete{{$user->id}}">Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            {{ $dataUser->links() }}
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
                <form action="{{route('manajemen-user.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>UUID:</label>
                            <input type="text" class="form-control" placeholder="Masukan uuid" required name="id">
                        </div>
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama" required name="name">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" placeholder="Masukan Email" required name="email">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin:</label>
                            <select class="form-control" name="jenis_kelamin" required>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir:</label>
                            <input type="text" class="form-control" placeholder="Masukan tempat lahir" required
                                name="tempat_lahir">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir:</label>
                            <input type="date" class="form-control" placeholder="Masukan tanggal lahir" required
                                name="tanggal_lahir">
                        </div>
                        <div class="form-group">
                            <label>Jurusan:</label>
                            <input type="text" class="form-control" placeholder="Masukan jurusan" required name="jurusan">
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control" placeholder="Masukan password" required
                                name="password">
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

    @foreach ($dataUser as $user)
    <!-- Modal Edit -->
    <div class="modal fade" id="edit{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('manajemen-user.update', $user->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>UUID:</label>
                            <input type="text" class="form-control" placeholder="Masukan uuid" required
                                value="{{$user->id}}" name="id">
                        </div>
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama" required
                                value="{{$user->name}}" name="name">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" placeholder="Masukan Email" required
                                value="{{$user->email}}" name="email">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin:</label>
                            <select class="form-control" name="jenis_kelamin" required>
                                <option @if($user->jenis_kelamin == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                <option @if($user->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir:</label>
                            <input type="text" class="form-control" placeholder="Masukan tempat lahir" required
                                value="{{$user->tempat_lahir}}" name="tempat_lahir">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir:</label>
                            <input type="date" class="form-control" placeholder="Masukan tanggal lahir" required
                                value="{{$user->tanggal_lahir}}" name="tanggal_lahir">
                        </div>
                        <div class="form-group">
                            <label>Jurusan:</label>
                            <input type="text" class="form-control" placeholder="Masukan jurusan" required
                                value="{{$user->jurusan}}" name="jurusan">
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
    <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('manajemen-user.destroy', $user->id)}}" method="POST">
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
