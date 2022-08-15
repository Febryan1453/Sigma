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

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Mahasiswa</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countMhs }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span>Terdaftar</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa-solid fa-user-graduate fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->            
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
                      <i class="fa-solid fa-code fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
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
            <!-- Pending Requests Card Example -->
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
            
          </div>
@endsection