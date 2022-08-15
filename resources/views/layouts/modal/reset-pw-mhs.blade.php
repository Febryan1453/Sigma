<div class="modal fade" id="resetPwMhs{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.resetpass') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input value="{{ $row->id }}" name="id" type="hidden"/>     
                        <div class="text-center">
                          Reset password {{ $row->mahasiswa->name }} ke password default ? <br> Password default adalah "idn123"
                        </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-warning">Reset</button>
                </div>
              </div>
              </form>
            </div>
          </div>