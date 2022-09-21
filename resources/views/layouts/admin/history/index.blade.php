@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">History Login</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">History Login</li>
        </ol>
    </div>

    <div class="row">
            <div class="col-lg-12 mb-4">
              @include('layouts.alert.berhasil')
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">History Login Semua User</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush text-center">
                    <thead class="thead-light">
                      <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat IP</th>
                        <th>Waktu Login</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($history as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td><a href="#">{{ $row->email }}</a></td>
                            <td>{{ $row->ip }}</td>
                            <td>{{ \Carbon\Carbon::parse($row->waktu_login)->translatedFormat('l, d F Y, H:i:s')}}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteHistory{{$row->id}}" id="#myBtn">
                                  <i class="fas fa-trash"></i>
                                </button>
                            </td>
                            @include('layouts.modal.del-history')
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="5">User admin belum ada !</td>
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