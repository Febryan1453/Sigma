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
      <div class="col-lg-12">
          <div class="card mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">History Login Semua User</h6>
              </div>
              <div class="table-responsive p-3">
                    <table class="table table-striped table-bordered yajra-datatable"> 
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Nama</th>
                                  <th>Waktu Login</th>
                                  <th>Ip</th>
                                  <th>Os</th>
                                  <th>Browser</th>
                                  <th>Device</th>
                                  <th>Action</th>
                                  <th><button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger"><i class="fas fa-trash"></i></button></th>
                              </tr>
                          </thead>
                          <tbody></tbody>
                      </table>
              </div>

              
              <div class="modal fade" id="deleteHistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">   
                          <div class="text-center">
                            Hapus history user ?
                          </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                    <button type="submit" id="hapus" class="btn btn-danger">Hapus</button>
                  </div>
                </div>
              </div>
            </div>



          </div>
      </div>
    </div>

@endsection