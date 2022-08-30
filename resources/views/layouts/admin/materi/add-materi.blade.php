@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Materi Dibawakan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Materi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Materi Dibawakan</li>
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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Materi Dibawakan</h6>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.store.materi') }}">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="jurusan">Materi Jurusan</label>
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
                                    <label for="dosen">Pengajar</label>
                                    <input type="text" value="{{ old('dosen') }}" name="dosen" class="form-control @error('dosen') is-invalid @enderror" id="dosen" placeholder="Masukkan nama pengajar">
                                    @error('dosen')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- <div class="form-group">
                                    <label for="link_materi">Record Materi</label>
                                    <input type="text" value="{{ old('link_materi') }}" name="link_materi" class="form-control @error('link_materi') is-invalid @enderror" id="link_materi" placeholder="Masukkan link record materi">
                                    @error('link_materi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> -->

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="nama_materi">Materi</label>
                                    <input type="text" value="{{ old('nama_materi') }}" name="nama_materi" class="form-control @error('nama_materi') is-invalid @enderror" id="nama_materi" placeholder="Masukkan materi">
                                    @error('nama_materi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tgl_materi">Tanggal Materi Dibawakan</label>
                                    <input type="date" value="{{ old('tgl_materi') }}" name="tgl_materi" class="form-control @error('tgl_materi') is-invalid @enderror" id="tgl_materi">
                                    @error('tgl_materi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rincian_materi">Rincian Materi</label>
                            <textarea class="form-control @error('rincian_materi') is-invalid @enderror" name="rincian_materi" id="rincian_materi" rows="3">{{ old('soal') }}</textarea>
                            @error('rincian_materi')
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