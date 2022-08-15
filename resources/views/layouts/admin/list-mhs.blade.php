@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Mahasiswa</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
        </ol>
    </div>

        <div class="row">
            <div class="col-lg-12 mb-4">

            @include('layouts.alert.berhasil')

              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">User Mahasiswa</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush text-center">
                    <thead class="thead-light">
                      <tr>
                        <th>Nim</th>
                        <th>Alamat Email</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Jurusan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($userMhs as $row)
                        <tr>
                            <td>{{ $row->mahasiswa->nim }}</td>
                            <td><a href="#">{{ $row->email }}</a></td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->mahasiswa->gender }}</td>
                            <td style="text-transform: uppercase;">{{ $row->mahasiswa->jurusan }}</td>
                            <td>
                                <a href="{{ route('admin.detailmhs',$row->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#resetPwMhs{{$row->id}}" id="#myBtn">
                                    <!-- <i class="fa-solid fa-unlock-keyhole"></i> -->
                                    <i class="fa-solid fa-key"></i>
                                </button>
                            </td>
                            @include('layouts.modal.reset-pw-mhs')
                            <!-- @include('layouts.modal.identitas-mhs') -->
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="6">User mahasiswa belum ada !</td>
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