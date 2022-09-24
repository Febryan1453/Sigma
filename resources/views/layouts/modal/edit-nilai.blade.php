<div class="modal fade" id="editNilai{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Nilai {{ $row->mhs->name }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('nilai.edit') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input value="{{ $row->id }}" name="id" type="hidden"/>  
                        <input value="{{ $row->mhs->id }}" name="mhs_id" type="hidden"/>  
                        
                        <div class="form-group text-left">
                            <label for="nilai">Nilai</label>
                            <select name="nilai" class="form-control @error('nilai') is-invalid @enderror" id="nilai">
                                <option value="">Beri Nilai</option>
                                <option value="60" @if ($row->nilai == "60") {{ 'selected' }} @endif>60</option>
                                <option value="65" @if ($row->nilai == "65") {{ 'selected' }} @endif>65</option>
                                <option value="70" @if ($row->nilai == "70") {{ 'selected' }} @endif>70</option>
                                <option value="75" @if ($row->nilai == "75") {{ 'selected' }} @endif>75</option>
                                <option value="80" @if ($row->nilai == "80") {{ 'selected' }} @endif>80</option>
                                <option value="85" @if ($row->nilai == "85") {{ 'selected' }} @endif>85</option>
                                <option value="90" @if ($row->nilai == "90") {{ 'selected' }} @endif>90</option>
                                <option value="95" @if ($row->nilai == "95") {{ 'selected' }} @endif>95</option>
                                <option value="100" @if ($row->nilai == "100") {{ 'selected' }} @endif>100</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
              </div>
              </form>
            </div>
          </div>