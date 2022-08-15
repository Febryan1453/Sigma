@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form tambah tugas mahasiswa</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Tugas Mahasiswa</li>
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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah tugas mahasiswa</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.savetugasmhs') }}">
                        @csrf
                        <div class="form-group">
                            <label for="tugas_ke">Tugas Ke</label>
                            <input type="text" value="{{ old('tugas_ke') }}" name="tugas_ke" class="form-control @error('tugas_ke') is-invalid @enderror" id="tugas_ke" placeholder="Contoh : RPL-1 / TKJ-1 / DMM-1">
                            @error('tugas_ke')
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
                            <label for="soal">Soal</label>
                            <textarea class="form-control @error('soal') is-invalid @enderror" name="soal" id="soal" rows="3">{{ old('soal') }}</textarea>
                            @error('soal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="petunjuk">Petunjuk Soal</label>
                            <textarea class="form-control @error('petunjuk') is-invalid @enderror" name="petunjuk" id="petunjuk" rows="4">{{ old('petunjuk') }}</textarea>
                            @error('petunjuk')
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