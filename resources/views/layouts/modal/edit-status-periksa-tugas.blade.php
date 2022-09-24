<div class="modal fade" id="editStatusPeriksaTugas{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Status Tugas {{$row->mhs->name }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.periksatugasmhs') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input value="{{ $row->id }}" name="id" type="hidden"/>
                        
                        <div class="form-group">
                            <label for="soal">Saran Untuk Mahasiswa</label>
                            <textarea class="form-control" name="komentar" id="soal" rows="3">{{ $row->komentar }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                                <option value="1" @if ($row->status == "1") {{ 'selected' }} @endif>Diperiksa</option>
                                <option value="2" @if ($row->status == "2") {{ 'selected' }} @endif>Diterima</option>
                                <option value="3" @if ($row->status == "3") {{ 'selected' }} @endif>Ditolak</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>  
                      
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
              </form>
            </div>
          </div>