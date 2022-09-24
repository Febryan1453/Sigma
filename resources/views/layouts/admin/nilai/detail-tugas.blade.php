@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
          Nilai Tugas {{ $tugas->tugas_ke }}         
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Nilai Mahasiswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nilai Tugas {{ $tugas->tugas_ke }}  </li>
        </ol>
    </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
              @include('layouts.alert.berhasil')
              <div class="card mb-4">
                <div class="card-body">                  
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush text-center">
                      
                        <tr>
                          <td class="text-right" width="20%">Tugas Ke</td> 
                          <td width="1%">:</td> 
                          <td width="auto" class="text-left" style="font-weight: bold;">{{ $tugas->tugas_ke }} </td>
                        </tr>
                        <tr>
                          <td class="text-right" width="20%">Deadline Tugas</td> 
                          <td width="1%">:</td> 
                          <td width="auto" class="text-left" style="font-weight: bold;">
                            {{ \Carbon\Carbon::parse($tugas->deadline)->translatedFormat('l, d F Y')}}
                          </td>
                        </tr>
                        <tr>
                          <td class="text-right" width="20%">Status Tugas</td> 
                          <td width="1%">:</td> 
                          <td width="auto" class="text-left" style="font-weight: bold;">
                              @if($tugas->status == 1)
                              <span class="badge badge-success">Ditugaskan</span>
                              @else
                              <span class="badge badge-danger">Deadline</span>
                              @endif
                          </td>
                        </tr>
                        <tr>
                          <td class="text-right" width="20%">Soal Tugas</td> 
                          <td width="1%">:</td> 
                          <td width="auto" class="text-justify">{!! $tugas->soal !!}</td>
                        </tr>
                        <tr>
                          <td class="text-right" width="20%">Nilai Tugas</td> 
                          <td width="1%">:</td> 
                          <td width="auto">
                        
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush text-center">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Mahasiswa</th>  
                                        <th>Nilai</th>                        
                                        <th>Link</th>  
                                        <th>Action</th>                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($nilai as $row)
                                        <tr>                                            
                                            <td>{{ $row->mhs->name }}</td>
                                            <td>{{ $row->nilai }}</td>
                                            <td>
                                              <a target="_blank" href="{{ $row->hasilTugas->link_tugas }}" class="btn btn-sm btn-primary">
                                                <i class="fa-solid fa-link"></i>
                                              </a>
                                            </td>
                                            <td>
                                              <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editNilai{{$row->id}}" id="#myBtn">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                              </button>
                                              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteNilai{{$row->id}}" id="#myBtn">
                                                <i class="fas fa-trash"></i>
                                              </button>
                                            </td>
                                            @include('layouts.modal.del-nilai')
                                            @include('layouts.modal.edit-nilai')
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="text-center" colspan="4">Belum ada nilai !</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                          </td>
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

            </div>
        </div>

@endsection