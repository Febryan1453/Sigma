@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Welcome, {{Auth::user()->name}}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>

<div class="row mb-3">

            @if(Auth::user()->mahasiswa->isready == 0)  
                @include('layouts.alert.info-baru-login')
            @endif
            
            @if(Auth::user()->mahasiswa->jurusan == 'rpl')     

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Tugas RPL</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countRpl }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span>Tugas</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa-solid fa-code fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Tugas Selesai</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tugasSelesai }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span>Tugas Diselesaikan</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa-solid fa-check-double fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            @elseif(Auth::user()->mahasiswa->jurusan == 'tkj') 

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Tugas TKJ</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $countTkj }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span>Tugas</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa-solid fa-network-wired fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Tugas Selesai</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tugasSelesai }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span>Tugas Diselesaikan</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa-solid fa-check-double fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            @else

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Tugas DMM</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countDmm }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span>Tugas</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa-solid fa-photo-film fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Tugas Selesai</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tugasSelesai }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span>Tugas Diselesaikan</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa-solid fa-check-double fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            @endif
            
          </div>
@endsection