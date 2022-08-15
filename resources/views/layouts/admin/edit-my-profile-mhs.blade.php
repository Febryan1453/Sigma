@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profile {{$detailUserMhs->name}}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Mahasiswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Profile {{$detailUserMhs->name}}</li>
        </ol>
    </div>

    <!-- <div class="row d-flex align-items-center justify-content-center"> -->
    <div class="row">

        <div class="col-lg-12">

            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah data mahasiswa</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.updatemyprofile') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" readonly value="{{ $detailUserMhs->id }}">
                        <div class="form-group">
                            <label for="nim">Nim Mahasiswa</label>
                            <input type="text" value="{{ $detailUserMhs->nim }}" name="nim" class="form-control @error('nim') is-invalid @enderror" id="nim" placeholder="Masukkan nim mahasiswa">
                            @error('nim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" value="{{ $detailUserMhs->name }}" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan nama">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" value="{{ $detailUserMhs->tempat_lahir }}" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Masukkan tempat lahir anda">
                            @error('tempat_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" value="{{ $detailUserMhs->tgl_lahir }}" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" placeholder="Masukkan tanggal lahir anda">
                            @error('tgl_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="telp">Telepon</label>
                            <input type="text" value="{{ $detailUserMhs->telp }}" name="telp" class="form-control @error('telp') is-invalid @enderror" id="telp" placeholder="Masukkan telepon anda">
                            @error('telp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan">
                                <option value="">Masukkan Jurusan</option>
                                <option value="rpl" @if ($detailUserMhs->jurusan == "rpl") {{ 'selected' }} @endif>Rekayasa Perangkat Lunak</option>
                                <option value="tkj" @if ($detailUserMhs->jurusan == "tkj") {{ 'selected' }} @endif>Teknik Komputer dan Jaringan</option>
                                <option value="dmm" @if ($detailUserMhs->jurusan == "dmm") {{ 'selected' }} @endif>Design Multimedia</option>
                            </select>
                            @error('jurusan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender">
                                <option value="">Masukkan gender</option>
                                <option value="L" @if ($detailUserMhs->gender == "L") {{ 'selected' }} @endif>Laki-laki</option>
                                <option value="P" @if ($detailUserMhs->gender == "P") {{ 'selected' }} @endif>Perempuan</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alasan">Alasan kuliah di IDN</label>
                            <textarea class="form-control @error('alasan') is-invalid @enderror" name="alasan" id="alasan" rows="4">{{ $detailUserMhs->alasan }}</textarea>
                            @error('alasan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <hr class="sidebar-divider">

                        <button type="submit" class="btn btn-primary">Submit Data</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection