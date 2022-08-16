<div class="modal fade" id="hapusMhs{{$row->id}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle">Hapus Data Mahasiswa</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body text-center">
                 <strong style="color: #fc544b;">Data akun, profil mahasiswa dan tugas</strong> dari mahasiswa atas nama <strong style="color: #fc544b;">{{ $row->mahasiswa->name }}</strong> akan dihapus dari database sistem.
                  Yakin ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                  
                  <form method="POST" action="{{ route ('admin.delakunmhs') }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" value="{{$row->id}}" name="id_user">
                    <input type="hidden" value="{{$row->mahasiswa->id}}" name="mahasiswa_id">
                    <input type="hidden" value="{{$row->mahasiswa->name}}" name="name">
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                  </form>                 

                </div>
              </div>
            </div>
          </div>