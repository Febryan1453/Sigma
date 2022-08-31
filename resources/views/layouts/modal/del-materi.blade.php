<div class="modal fade" id="deleteMateri{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form action="{{ route('admin.del.materi') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input value="{{ $row->id }}" name="id" type="hidden"/>     
                        <div class="text-center">
                          Hapus Materi <span style="color: red;">{{ $row->nama_materi}}</span> pada tanggal <span style="color: red;">{{ \Carbon\Carbon::parse($row->tgl_materi)->translatedFormat('l, d F Y')}}</span> ?
                        </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
              </div>
              </form>
            </div>
          </div>