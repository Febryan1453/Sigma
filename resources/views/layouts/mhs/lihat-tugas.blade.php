@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tugas Saya</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Mahasiswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tugas Saya</li>
        </ol>
    </div>
    
        <div class="row">
            <div class="col-lg-12 mb-4">

            @if(Session::get('Ok'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h6><i class="fas fa-check"></i><b> Berhasil !</b></h6>
                    {{Session::get('Ok')}}
                </div>
            @endif

              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tugas {{ Auth::user()->mahasiswa->name }}</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush text-center">
                    <thead class="thead-light">
                      <tr>
                        <th>Tugas Ke</th>
                        <th>Soal</th>
                        <th>Petunjuk Soal</th>
                        <th>Tanggal Tugas</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($tugasMhs as $row)
                        <tr>
                            <td>{{ $row->tugas_ke }}</td>
                            <td>{{ $row->soal }}</td>
                            <td>{{ $row->petunjuk }}</td>
                            <td>{{ \Carbon\Carbon::parse($row->created_at)->translatedFormat('l, d F Y, H:i:s')}}</td>
                            <td>
                              @if($row->status == '1')
                              <span class="badge badge-success">Ditugaskan</span>
                              @else
                              <span class="badge badge-danger">Pending</span>
                              @endif
                            </td>
                            <td><a href="{{ route('mhs.addtugassaya',$row->id) }}" class="btn btn-sm btn-primary">Kerjakan</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="6">Belum ada tugas untuk {{ Auth::user()->mahasiswa->name }} !</td>
                        </tr>
                        @endforelse
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
        </div>

@endsection