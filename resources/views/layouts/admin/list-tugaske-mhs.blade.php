@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
          Periksa Tugas {{ $tugas->tugas_ke }} 
          @if($tugas->status == 1)
          <span class="badge badge-success">Ditugaskan</span>
          @else
          <span class="badge badge-danger">Pending</span>
          @endif
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
            <li class="breadcrumb-item active" aria-current="page">Periksa Tugas {{ $tugas->tugas_ke }}</li>
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
                  <h6 class="m-0 font-weight-bold text-primary">
                    {{ $tugas->tugas_ke }} - ({{ $tugas->soal }})
                  </h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush text-center">
                    <thead class="thead-light">
                      <tr>
                        <th>Link</th>
                        <th>Nim / Nama</th>
                        <th>Kendala</th>
                        <th>Tanggal Tugas</th>
                        <th>Tanggal Kirim</th>
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
                            <td>{!! $info->code !!}</td>
                            <td>{{ $row->mhs->nim }} <br> {{ $row->mhs->name }}</td>
                            <td>{{ $row->kendala }}</td>
                            <td>{{ \Carbon\Carbon::parse($row->tugas->created_at)->translatedFormat('l, d F Y, H:i:s')}}</td>
                            <td>{{ \Carbon\Carbon::parse($row->updated_at)->translatedFormat('l, d F Y, H:i:s')}}</td>
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