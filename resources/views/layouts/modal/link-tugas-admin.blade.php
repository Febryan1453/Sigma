<div class="modal fade" id="linkTugas{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Link Tugas {{ $row->mhs->name }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        <div class="text-center">
                          Judul video<br>
                          <strong>{{ $info->title }}</strong><br><br>
                          Link video<br>
                          <a target="_blank" href="{{ $row->link_tugas }}"><strong>{{ $row->link_tugas }}</strong></a>
                        </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>