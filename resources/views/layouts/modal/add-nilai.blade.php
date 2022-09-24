<div class="modal fade" id="addNilaiMhs{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Beri Nilai {{$row->mhs->name }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('nilai.simpan') }}" method="POST">
                        @csrf

                        <input value="{{ $row->id }}" name="id" type="hidden"/>  
                        
                        <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <select name="nilai" class="form-control @error('nilai') is-invalid @enderror" id="nilai">
                                <option value="">Beri Nilai</option>
                                <option value="60">60</option>
                                <option value="65">65</option>
                                <option value="70">70</option>
                                <option value="75">75</option>
                                <option value="80">80</option>
                                <option value="85">85</option>
                                <option value="90">90</option>
                                <option value="95">95</option>
                                <option value="100">100</option>
                            </select>
                        </div>

                        <input value="{{ $row->mhs->name }}" name="nama" type="hidden"/>
                        <input value="{{ $row->mhs->id }}" name="mahasiswa_id" type="hidden"/>
                        <input value="{{ $row->tugas->id }}" name="tugas_id" type="hidden"/>
                        <input value="{{ $row->mhs->jurusan }}" name="jurusan" type="hidden"/>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
              </form>
            </div>
          </div>