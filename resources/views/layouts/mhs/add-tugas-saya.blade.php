@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tugas {{ $tugas->tugas_ke }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Mahasiswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kirim Tugas {{ $tugas->tugas_ke }}</li>
        </ol>
    </div>

    <!-- <div class="row d-flex align-items-center justify-content-center"> -->
    <div class="row">

        <div class="col-lg-12">

            

            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kirim Tugas {{ $tugas->tugas_ke }}</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('mhs.savetugassaya') }}">
                        @csrf

                        <input type="hidden" value="{{ $tugas->id }}" name="tugas_id">

                        <input type="hidden" value="{{ $tugas->tugas_ke }}" name="tugas_ke">

                        <div class="form-group">
                            <label for="link_tugas">Link Tugas</label>
                            <input type="text" value="{{ old('link_tugas') }}" name="link_tugas" class="form-control @error('link_tugas') is-invalid @enderror" id="link_tugas" placeholder="Masukkan link">
                            @error('link_tugas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- <div class="form-group">
                            <label for="link_tugas">Link Tugas</label>
                            <textarea class="form-control @error('link_tugas') is-invalid @enderror" name="link_tugas" id="link_tugas" rows="1">{{ old('link_tugas') }}</textarea>
                            @error('link_tugas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> -->

                        <div class="form-group">
                            <label for="kendala">Kendala Tugas</label>
                            <textarea class="form-control @error('kendala') is-invalid @enderror" name="kendala" id="kendala" rows="4">{{ old('kendala') }}</textarea>
                            @error('kendala')
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