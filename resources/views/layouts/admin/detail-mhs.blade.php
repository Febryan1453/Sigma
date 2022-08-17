@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Mahasiswa</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Mahasiswa</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
          @include('layouts.alert.berhasil')
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-end">
                  <a href="{{ route('admin.lengkapimyprofile',$detailUserMhs->id) }}" class="btn btn-sm btn-primary">
                      <i class="fa-solid fa-pencil"></i>
                    </a>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img alt="Detail {{ $detailUserMhs->name }}" class="img-profile rounded-circle" src="https://ui-avatars.com/api/?name={{ $detailUserMhs->name }}" style="width: 120px">
                    </div>
                    <div class="table-responsive mt-5">
                  <table class="table align-items-center table-flush text-center">
                    <thead class="thead-light">
                      <tr>
                        <td class="text-right" width="20%">Nim</td> <td width="1%">:</td> <td width="auto" class="text-left">{{ $detailUserMhs->nim }}</td>
                      </tr>
                      <tr>
                        <td class="text-right" width="20%">Nama Mahasiswa</td> <td width="1%">:</td> <td width="auto" class="text-left">{{ $detailUserMhs->name }}</td>
                      </tr>
                      <tr>
                        <td class="text-right" width="20%">Tempat Lahir</td> <td width="1%">:</td> <td width="auto" class="text-left">@if (empty($detailUserMhs->tempat_lahir)) - @else {{$detailUserMhs->tempat_lahir}} @endif</td>
                      </tr>
                      <tr>
                        <td class="text-right" width="20%">Tanggal Lahir</td> 
                        <td width="1%">:</td> 
                        <td width="auto" class="text-left">
                          @if (empty($detailUserMhs->tgl_lahir)) 
                          - 
                          @else 
                          {{ \Carbon\Carbon::parse($detailUserMhs->tgl_lahir)->translatedFormat('l, d F Y')}}
                          @endif</td>
                      </tr>
                      <tr>
                        <td class="text-right" width="20%">Umur</td> 
                        <td width="1%">:</td> 
                        <td width="auto" class="text-left">
                          @if (empty($detailUserMhs->tgl_lahir)) 
                            - 
                          @else 
                            {{ $y }} Tahun {{ $m }} Bulan {{ $d }} Hari
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td class="text-right" width="20%">Jurusan</td> 
                        <td width="1%">:</td> 
                        <td width="auto" class="text-left">
                            @if($detailUserMhs->jurusan == 'rpl')
                                Rekayasa Perangkat Lunak
                            @elseif($detailUserMhs->jurusan == 'tkj')
                                Teknik Komputer & Jaringan
                            @else
                                Design Multimedia
                            @endif
                        </td>
                      </tr>
                      <tr>
                        <td class="text-right" width="20%">Jenis Kelamin</td> 
                        <td width="1%">:</td> 
                        <td width="auto" class="text-left">
                            @if($detailUserMhs->gender == 'L')
                                Laki-laki
                            @else
                                Perempuan
                            @endif
                        </td>
                      </tr>
                      <tr>
                        <td class="text-right" width="20%">Telepon</td> 
                        <td width="1%">:</td> 
                        <td width="auto" class="text-left">
                          @if (empty($detailUserMhs->telp)) 
                          - 
                          @else 
                          {{ $detailUserMhs->telp }}
                          @endif</td>
                      </tr>
                      <tr>
                        <td class="text-right" width="20%">Alasan kuliah di IDN</td> 
                        <td width="1%">:</td> 
                        <td width="auto" class="text-left">
                          @if (empty($detailUserMhs->alasan)) 
                          - 
                          @else 
                          {{ $detailUserMhs->alasan }}
                          @endif</td>
                      </tr>
                      <tr>
                        <td></td><td></td><td></td>
                      </tr>
                    </thead>
                  </table>
                </div>
                </div>
              </div>
            </div>
    </div>

    <div class="row">
            <div class="col-lg-12 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">List tugas {{ $detailUserMhs->name }}</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush text-center">
                    <thead class="thead-light">
                      <tr>
                        <th>Tugas Ke</th>
                        <th>Link / Soal</th>
                        <!-- <th>Soal</th> -->
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
                              // https://github.com/oscarotero/Embed
                              $embed = new Embed\Embed();
                              $info = $embed->get($row->link_tugas);
                          ?>
                          <tr>
                              <td>{{ $row->tugas->tugas_ke }}</td>
                              <td>
                                  {!! $info->code !!} 
                                  <!-- <br/> {{ $info->title }} -->
                                  <br>
                                  {{ $row->tugas->soal }}
                              </td>
                              <!-- <td>{{ $row->tugas->soal }}</td> -->
                              <td>{{ $row->kendala }}</td>
                              <td>{{ \Carbon\Carbon::parse($row->tugas->created_at)->translatedFormat('l, d F Y, H:i:s')}}</td>
                              <td>{{ \Carbon\Carbon::parse($row->updated_at)->translatedFormat('l, d F Y, H:i:s')}}</td>
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
                               <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editStatusPeriksaTugas{{$row->id}}" id="#myBtn">
                                  <i class="fa-solid fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteTugas{{$row->id}}" id="#myBtn">
                                  <i class="fas fa-trash"></i>
                                </button>
                            </td>
                            @include('layouts.modal.edit-status-periksa-tugas')
                            @include('layouts.modal.del-tugas-admin')
                          </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="8">{{ $detailUserMhs->name }} belum mengirim tugas !</td>
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