@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nilai Mahasiswa</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nilai Mahasiswa</li>
        </ol>
    </div>

    <div class="row">
            <div class="col-lg-12 mb-4">
              @include('layouts.alert.berhasil')
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Semua Nilai</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush text-center">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>                        
                        <th>Nama</th>                        
                        <th>Nilai</th>                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($mhs as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>
                                <a href="{{ route('nilai.detail',$row->id) }}">Lihat Nilai Mahasiswa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
        </div>


@endsection