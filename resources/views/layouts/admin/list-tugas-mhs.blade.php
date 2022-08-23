@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Tugas Mahasiswa</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tugas Mahasiswa</li>
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
                  <h6 class="m-0 font-weight-bold text-primary">Tugas Mahasiswa RPL</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush text-center">
                    <thead class="thead-light">
                      <tr>
                        <th>Tugas Ke</th>
                        <th>Soal</th>
                        <th>Petunjuk</th>
                        <th>Tanggal Tugas</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($tugasMhsRpl as $row)
                        <tr>
                            <td><a href="{{ route('admin.lihattugasmhs',$row->id) }}">{{ $row->tugas_ke }}</a></td>
                            <td>{!! $row->soal !!}</td>
                            <td>{!! $row->petunjuk !!}</td>
                            <!-- <td>{{ \Carbon\Carbon::parse($row->created_at)->translatedFormat('l, d F Y, H:i:s')}}</td> -->
                            <td>{{ \Carbon\Carbon::parse($row->created_at)->translatedFormat('d F Y, H:i:s')}}</td>
                            <td style="color: #ffa426; font-weight:bold;">                            
                              {{ \Carbon\Carbon::parse($row->deadline)->translatedFormat('d F Y,')}} {{$row->jam_deadline}}                           
                            </td>
                            <td>
                              @if($row->status == 1)
                              <span class="badge badge-success">Ditugaskan</span>
                              @else
                              <span class="badge badge-danger">Deadline</span>
                              @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editTugas{{$row->id}}" id="#myBtn">
                                  <i class="fa-solid fa-stopwatch"></i>
                                </button>

                                <a href="{{ route('admin.edittugasmhs',$row->id) }}" class="btn btn-sm btn-primary">
                                  <i class="fa-solid fa-pencil"></i>
                                </a>
                            </td>
                            @include('layouts.modal.edit-status-tugas')
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="6">Belum ada tugas untuk mahasiswa RPL !</td>
                        </tr>
                        @endforelse
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">{{ $tugasMhsRpl->links() }}</div>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tugas Mahasiswa TKJ</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush text-center">
                    <thead class="thead-light">
                      <tr>
                        <th>Tugas Ke</th>
                        <th>Soal</th>
                        <th>Petunjuk Soal</th>
                        <th>Tanggal Penugasan</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($tugasMhsTkj as $row)
                        <tr>
                            <td><a href="{{ route('admin.lihattugasmhs',$row->id) }}">{{ $row->tugas_ke }}</a></td>
                            <<td>{!! $row->soal !!}</td>
                            <td>{!! $row->petunjuk !!}</td>
                            <td>{{ \Carbon\Carbon::parse($row->created_at)->translatedFormat('l, d F Y')}}</td>
                            <td>
                              @if($row->status == 1)
                              <span class="badge badge-success">Ditugaskan</span>
                              @else
                              <span class="badge badge-danger">Pending</span>
                              @endif
                            </td>
                            <td>
                               <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editTugas{{$row->id}}" id="#myBtn">
                                  <i class="fa-solid fa-stopwatch"></i>
                                </button>
                              <a href="{{ route('admin.edittugasmhs',$row->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa-solid fa-pencil"></i>
                              </a>
                            </td>
                            @include('layouts.modal.edit-status-tugas')
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="6">Belum ada tugas untuk mahasiswa TKJ !</td>
                        </tr>
                        @endforelse
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">{{ $tugasMhsTkj->links() }}</div>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tugas Mahasiswa DMM</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush text-center">
                    <thead class="thead-light">
                      <tr>
                        <th>Tugas Ke</th>
                        <th>Soal</th>
                        <th>Petunjuk Soal</th>
                        <th>Tanggal Penugasan</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($tugasMhsDmm as $row)
                        <tr>
                            <td><a href="{{ route('admin.lihattugasmhs',$row->id) }}">{{ $row->tugas_ke }}</a></td>
                            <td>{!! $row->soal !!}</td>
                            <td>{!! $row->petunjuk !!}</td>
                            <td>{{ \Carbon\Carbon::parse($row->created_at)->translatedFormat('l, d F Y')}}</td>
                            <td>
                              @if($row->status == 1)
                              <span class="badge badge-success">Ditugaskan</span>
                              @else
                              <span class="badge badge-danger">Pending</span>
                              @endif
                            </td>
                             <td>
                                
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editTugas{{$row->id}}" id="#myBtn">
                                  <i class="fa-solid fa-stopwatch"></i>
                                </button>
                                <a href="{{ route('admin.edittugasmhs',$row->id) }}" class="btn btn-sm btn-primary">
                                  <i class="fa-solid fa-pencil"></i>
                                </a>

                            </td>
                            @include('layouts.modal.edit-status-tugas')
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="6">Belum ada tugas untuk mahasiswa DMM !</td>
                        </tr>
                        @endforelse
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">{{ $tugasMhsDmm->links() }}</div>
              </div>
            </div>
        </div>

@endsection