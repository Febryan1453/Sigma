@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tugas mahasiswa</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tugas mahasiswa</li>
        </ol>
    </div>

    <!-- <div class="row d-flex align-items-center justify-content-center"> -->
    <div class="row">

        <div class="col-lg-12">

            @include('layouts.alert.berhasil')
            @include('layouts.alert.kesalahan')

            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Hapus tugas mahasiswa</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.actiondeltugasid') }}">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <label for="id_tugas">ID Tugas Mahasiswa</label>
                            <input type="text" value="{{ old('id_tugas') }}" name="id_tugas" class="form-control @error('id_tugas') is-invalid @enderror" id="id_tugas" placeholder="Masukkan ID tugas per mahasiswa">
                            @error('id_tugas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <hr class="sidebar-divider">

                        <button type="submit" class="btn btn-primary">Delete Data</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection