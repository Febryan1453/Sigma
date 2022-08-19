@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
          Periksa Tugas          
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
            <li class="breadcrumb-item active" aria-current="page">Periksa Tugas</li>
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

              <div class="card mb-4">
                <div class="card-body">                  
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush text-center">
                      
                        <tr>
                          <td class="text-right" width="20%">Tugas Ke</td> 
                          <td width="1%">:</td> 
                          <td width="auto" class="text-left" style="font-weight: bold;">{{ $tugas->tugas_ke }}</td>
                        </tr>
                        <tr>
                          <td class="text-right" width="20%">Tanggal Tugas</td> 
                          <td width="1%">:</td> 
                          <td width="auto" class="text-justify" style="font-weight: bold;">
                            {{ \Carbon\Carbon::parse($tugas->created_at)->translatedFormat('l, d F Y, H:i:s')}}
                          </td>
                        </tr>
                        <tr>
                          <td class="text-right" width="20%">Deadline Tugas</td> 
                          <td width="1%">:</td> 
                          <td width="auto" class="text-justify" style="color: #ffa426; font-weight:bold;">
                            {{ \Carbon\Carbon::parse($tugas->deadline)->translatedFormat('l, d F Y,')}} {{ $tugas->jam_deadline }}
                          </td>
                        </tr>
                        <tr>
                          <td class="text-right" width="20%">Status Tugas</td> 
                          <td width="1%">:</td> 
                          <td width="auto" class="text-left">
                            <h5>
                              @if($tugas->status == 1)
                              <span class="badge badge-success">Ditugaskan</span>
                              @else
                              <span class="badge badge-danger">Deadline</span>
                              @endif
                            </h5>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-right" width="20%">Soal Tugas</td> 
                          <td width="1%">:</td> 
                          <td width="auto" class="text-justify">{{ $tugas->soal }}</td>
                        </tr>
                        <tr>
                          <td class="text-right" width="20%">Petunjuk Tugas</td> 
                          <td width="1%">:</td> 
                          <td width="auto" class="text-justify">{{ $tugas->petunjuk }}</td>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>                    
                    </table>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">
                    Tugas Masuk
                  </h6>
                </div>

                <div class="table-responsive">
                  <table class="table align-items-center table-flush text-center">
                    <thead class="thead-light">
                      <tr>
                        <th>Link / Mahasiswa</th>
                        <!-- <th>Nim / Nama</th> -->
                        <th>Kendala</th>
                        <th>Tanggal Kirim</th>
                        <th>Saran</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($hasilTugas as $row)
                        <?php 
                              // https://github.com/oscarotero/Embed
                              $embed = new Embed\Embed();
                              $info = $embed->get($row->link_tugas);
                        ?>
                        <tr>
                            <td>
                              {!! $info->code !!} <br>
                              {{ $row->mhs->nim }} <br> 
                              {{ $row->mhs->name }}
                            </td>
                            <!-- <td>{{ $row->mhs->nim }} <br> {{ $row->mhs->name }}</td> -->
                            <td>{{ $row->kendala }}</td>
                            <td>{{ \Carbon\Carbon::parse($row->created_at)->translatedFormat('l, d F Y, H:i:s')}}</td>
                            <td>
                                @if(empty($row->komentar))
                                  <span class="badge badge-warning">Ditunggu</span>
                                @else
                                  {{ $row->komentar }}
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
                              <a href="{{ route('admin.detailmhs',$row->mhs->user_id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                               <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editStatusPeriksaTugas{{$row->id}}" id="#myBtn">
                                  <i class="fa-solid fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#linkTugas{{$row->id}}" id="#myBtn">
                                  <i class="fa-solid fa-link"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteTugas{{$row->id}}" id="#myBtn">
                                  <i class="fas fa-trash"></i>
                                </button>
                            </td>
                            @include('layouts.modal.edit-status-periksa-tugas')
                            @include('layouts.modal.del-tugas-admin')
                            @include('layouts.modal.link-tugas-admin')
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="6">Mahasiswa belum mengirim tugas ke <b>{{  $tugas->tugas_ke  }}</b> !</td>
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