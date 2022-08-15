@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Mahasiswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
          @include('layouts.alert.berhasil')
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-end">
                    <a href="{{ route('mhs.lengkapimyprofile') }}" class="btn btn-sm btn-primary">
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
                        <td class="text-right" width="20%">Tempat Lahir</td> 
                        <td width="1%">:</td> 
                        <td width="auto" class="text-left">
                          @if (empty($detailUserMhs->tempat_lahir)) 
                            - 
                          @else 
                            {{$detailUserMhs->tempat_lahir}} 
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td class="text-right" width="20%">Tanggal Lahir</td> 
                        <td width="1%">:</td> 
                        <td width="auto" class="text-left">
                          @if (empty($detailUserMhs->tgl_lahir)) 
                            - 
                          @else 
                            {{ \Carbon\Carbon::parse($detailUserMhs->tgl_lahir)->translatedFormat('l, d F Y')}}
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

@endsection