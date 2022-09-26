@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Materi</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Mahasiswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Materi</li>
        </ol>
    </div>

        <div class="row">
            <div class="col-lg-12 mb-4">

            @include('layouts.alert.berhasil')

              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Materi Tersampaikan</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush text-center" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <!-- <th>Jurusan</th> -->
                        <th>Tanggal Materi</th>
                        <th>Materi</th>
                        <th>Rincian Materi</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($materi as $row)
                        <tr>
                            <!-- <td style="text-transform: uppercase;">{{ $row->jurusan }}</td> -->        
                            <td>{{ \Carbon\Carbon::parse($row->tgl_materi)->translatedFormat('l, d F Y')}}</td>
                            <td style="text-align: left;">{{ $row->nama_materi }} <br> oleh: {{ $row->dosen }}</td>
                            <td style="text-align: left;">{!! $row->rincian_materi !!}</td>
                            <td>
                              <a target="_blank" href="{{ route('materi.detail',[$row->tgl_materi, $row->id]) }}" class="btn btn-sm btn-success">
                                <i class="fa-solid fa-eye"></i>
                              </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="6">Materi belum ada !</td>
                        </tr>
                        @endforelse
                    </tbody>
                  </table>
                  
                </div>
                            
                <div class="card-footer">
                  {{ $materi->links() }}
                </div>
              </div>
            </div>
        </div>

@endsection