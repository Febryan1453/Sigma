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
                  <table class="table align-items-center table-flush text-center" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <!-- <th>Nim</th> -->
                        <th>Email</th>
                        <th>Nama</th>
                        <th>JK</th>
                        <th>Jurusan</th>
                        <th>Tugas</th>
                        <th>Profil</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($userMhs as $row)
                        <tr>
                            <!-- <td>{{ $row->mahasiswa->nim }}</td> -->
                            <td><a href="#">{{ $row->email }}</a></td>
                            <td>{{ $row->mahasiswa->name }}</td>
                            <td>{{ $row->mahasiswa->gender }}</td>
                            <td style="text-transform: uppercase;">{{ $row->mahasiswa->jurusan }}</td>
                            <td>
                              <?php
                                $jumlahTugas = App\Models\HasilTugas::where('mahasiswa_id', $row->mahasiswa->id)->count();
                              ?>
                              {{ $jumlahTugas }}
                            </td>
                            <td>
                              @if($row->mahasiswa->isready == 0)
                              <span class="badge badge-danger">No</span>
                              @else
                              <span class="badge badge-success">Yes</span>
                              @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.detailmhs',$row->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#resetPwMhs{{$row->id}}" id="#myBtn">
                                    <i class="fa-solid fa-key"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusMhs{{$row->id}}" id="#myBtn">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                            @include('layouts.modal.reset-pw-mhs')
                            @include('layouts.modal.hapus-akun-mhs')
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="6">User mahasiswa belum ada !</td>
                        </tr>
                        @endforelse
                    </tbody>
                  </table>
                  
                </div>
                            
                <div class="card-footer">
                  <!-- Current Page: {{ $userMhs->currentPage() }}<br> -->
                <!-- Jumlah Data Mahasiswa : {{ $userMhs->total() }}<br> -->
                <!-- Data perhalaman: {{ $userMhs->perPage() }}<br>  -->
                  {{ $userMhs->links() }}
                </div>
              </div>
            </div>
        </div>

@endsection