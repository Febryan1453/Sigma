    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h3 class="h5 mb-0 text-gray-800">Informasi Tugas RPL</h3>
    </div>    
    
    <div class="row mb-3">

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Tugas Masuk</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $masuk }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span>Tersimpan</span>
                      </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-inbox fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                   
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Tugas Diterima</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $diterima }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span>Tugas Telah Diterima</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa-solid fa-check-double fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Tugas Ditolak</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $ditolak }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span>Tugas Telah Ditolak</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa-solid fa-xmark fa-2x text-danger"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">TUGAS DIPERIKSA</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $periksa }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span>Menunggu Diperiksa</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa-solid fa-check fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
    </div>