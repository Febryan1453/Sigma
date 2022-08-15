@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data user admin</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Admin</li>
        </ol>
    </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
              @include('layouts.alert.berhasil')
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">User Admin</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush text-center">
                    <thead class="thead-light">
                      <tr>
                        <th>Admin ID</th>
                        <th>Photo</th>
                        <th>Nama</th>
                        <th>Alamat Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($userAdmin as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td><img class="img-profile" src="https://ui-avatars.com/api/?name={{ $row->name }}" style="max-width: 60px"></td>
                            <td>{{ $row->name }}</td>
                            <td><a href="#">{{ $row->email }}</a></td>
                            <td>
                              @if($row->email == 'febryan1453@gmail.com' || $row->email == 'idn@idn.id')
                                <button disabled style="cursor:not-allowed;" type="button" class="btn btn-sm btn-danger">
                                  <i class="fas fa-trash"></i>
                                </button>
                              @else
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteAdmin{{$row->id}}" id="#myBtn">
                                  <i class="fas fa-trash"></i>
                                </button>
                              @endif
                            </td>
                            @include('layouts.modal.del-user-admin')
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