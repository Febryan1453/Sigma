@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form tambah mahasiswa</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Mahasiswa</li>
        </ol>
    </div>

    <!-- <div class="row d-flex align-items-center justify-content-center"> -->
    <div class="row">

        <div class="col-lg-12">

            @if(Session::get('Ok'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h6><i class="fas fa-check"></i><b> Berhasil !</b></h6>
                    {{Session::get('Ok')}}
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah data mahasiswa</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.savemhs') }}">
                        @csrf

                        <div class="form-group">
                            <label for="nim">Nim Mahasiswa</label>
                            <input type="text" value="{{ old('nim') }}" name="nim" class="form-control @error('nim') is-invalid @enderror" id="nim" placeholder="Masukkan nim mahasiswa">
                            @error('nim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="name">Nama Mahasiswa</label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan nama mahasiswa">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan">
                                <option value="">Masukkan Jurusan</option>
                                <option value="rpl" @if (old('jurusan') == "rpl") {{ 'selected' }} @endif>Rekayasa Perangkat Lunak</option>
                                <option value="tkj" @if (old('jurusan') == "tkj") {{ 'selected' }} @endif>Teknik Komputer dan Jaringan</option>
                                <option value="dmm" @if (old('jurusan') == "dmm") {{ 'selected' }} @endif>Design Multimedia</option>
                            </select>
                            @error('jurusan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender">
                                <option value="">Masukkan gender</option>
                                <option value="L" @if (old('gender') == "L") {{ 'selected' }} @endif>Laki-laki</option>
                                <option value="P" @if (old('gender') == "P") {{ 'selected' }} @endif>Perempuan</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat Email</label>
                            <input type="text" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukkan email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Password Default</label>
                            <input type="text" value="idn123" readonly class="form-control" id="exampleInputEmail1">
                        </div>

                        <!-- <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" value="idn123" placeholder="Password">
                            <small id="emailHelp" class="form-text text-muted">Password default adalah <b>"idn123"</b>.</small>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> -->

                        <hr class="sidebar-divider">

                        <button type="submit" class="btn btn-primary">Submit Data</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection