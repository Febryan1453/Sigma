@extends('layouts.base')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nilai Mahasiswa</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nilai Mahasiswa</li>
        </ol>
    </div>

    <div class="row">
      <div class="col-lg-12">
          <div class="card mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Semua Nilai Per Tugas</h6>
              </div>
              <div class="table-responsive p-3">
                    <table class="table table-striped table-bordered table-nilai"> 
                          <thead>
                              <tr>
                                  <th width="10%">ID</th>
                                  <th width="15%">Tugas</th>
                                  <th width="20%">Deadline</th>
                                  <th width="20%">Action</th>
                                </tr>
                          </thead>
                          <tbody>                          
                          </tbody>
                      </table>
              </div>
          </div>
      </div>
    </div>

@endsection