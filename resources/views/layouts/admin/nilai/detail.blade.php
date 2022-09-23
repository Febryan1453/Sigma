@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
          Nilai {{ $mhs->name }}         
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Nilai Mahasiswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nilai {{ $mhs->name }}  </li>
        </ol>
    </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
              <div class="card mb-4">
                <div class="card-body">                  
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush text-center">
                      
                        <tr>
                          <td class="text-right" width="20%">Nim</td> 
                          <td width="1%">:</td> 
                          <td width="auto" class="text-left" style="font-weight: bold;">{{ $mhs->nim }} </td>
                        </tr>
                        <tr>
                          <td class="text-right" width="20%">Nama Mahasiswa</td> 
                          <td width="1%">:</td> 
                          <td width="auto" class="text-left" style="font-weight: bold;">{{ $mhs->name }} </td>
                        </tr>
                        <tr>
                          <td class="text-right" width="20%">Tanggal Lahir</td> 
                          <td width="1%">:</td> 
                          <td width="auto" class="text-left" style="font-weight: bold;">
                            @if (empty($mhs->tgl_lahir)) 
                            - 
                            @else 
                            {{ \Carbon\Carbon::parse($mhs->tgl_lahir)->translatedFormat('l, d F Y')}}
                            @endif
                          </td>
                        </tr>
                        <tr>
                            <td class="text-right" width="20%">Umur Sekarang</td> 
                            <td width="1%">:</td> 
                            <td width="auto" class="text-left" style="font-weight: bold;">
                            @if (empty($mhs->tgl_lahir)) 
                                - 
                            @else 
                                {{ $y }} Tahun {{ $m }} Bulan {{ $d }} Hari
                            @endif
                            </td>
                        </tr>
                        <tr>
                          <td class="text-right" width="20%">Tabel Nilai</td> 
                          <td width="1%">:</td> 
                          <td width="auto">
                        
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush text-center">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Tugas</th>  
                                        <th>Nilai</th>                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($nilai as $row)
                                        <tr>
                                            <td>{{ $row->tugas->tugas_ke }}</td>
                                            <td>{{ $row->nilai }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="text-center" colspan="2">Belum ada nilai !</td>
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