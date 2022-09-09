@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tugas Terkirim</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Mahasiswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tugas Terkirim</li>
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
                  <h6 class="m-0 font-weight-bold text-primary">Tugas Terkirim {{ Auth::user()->mahasiswa->name }}</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush text-center">
                    <thead class="thead-light">
                      <tr>
                        <th>Tugas Ke</th>
                        <th>Link / Soal</th>
                        <th>Kendala</th>
                        <th>Tanggal Tugas</th>
                        <th>Tanggal Dikirim</th>
                        <th>Saran</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($hasiltugas as $row)
                          <?php 
                              $embed = new Embed\Embed();
                              $info = $embed->get($row->link_tugas);
                          ?>
                          <tr>
                              <td>{{ $row->tugas->tugas_ke }}</td>
                              <td>
                                  {!! $info->code !!} 
                                  <!-- <br/> {{ $info->title }} -->
                                  <br>
                                  {!! $row->tugas->soal !!}
                              </td>
                              <td>{!! $row->kendala !!}</td>
                              <td>{{ \Carbon\Carbon::parse($row->tugas->created_at)->translatedFormat('l, d F Y, H:i:s')}}</td>
                              <td>{{ \Carbon\Carbon::parse($row->created_at)->translatedFormat('l, d F Y, H:i:s')}}</td>
                              <td>
                                @if(empty($row->komentar))
                                  <span class="badge badge-warning">Tunggu</span>
                                @else
                                  {!! $row->komentar !!}
                                @endif
                              </td>
                              <td>
                                @if($row->status == '1')
                                <span class="badge badge-warning">Diperiksa</span>
                                @elseif($row->status == '2')
                                <span class="badge badge-success">Diterima</span>
                                @else
                                <span class="badge badge-danger">Ditolak</span>
                                @endif
                              </td>
                              <td>
                                @if($row->status == '2' || $row->status == '3')
                                <button style="cursor:not-allowed;" disabled type="button" class="btn btn-sm btn-primary">
                                  <i class="fa-solid fa-pencil"></i>
                                </button>
                                <button style="cursor:not-allowed;" disabled type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteTugas{{$row->id}}" id="#myBtn">
                                  <i class="fas fa-trash"></i>
                                </button>
                                @else   
                                <a href="{{ route('mhs.edittugassaya',$row->id) }}" class="btn btn-sm btn-primary">
                                  <i class="fa-solid fa-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteTugas{{$row->id}}" id="#myBtn">
                                  <i class="fas fa-trash"></i>
                                </button>
                                @endif
                              </td>
                              @include('layouts.modal.del-tugas-saya')
                          </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="9">Kamu belum menyelesaikan tugas !</td>
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