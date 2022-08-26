@if(Session::get('Failed'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h6><i class="fas fa-check"></i><b> Kesalahan !</b></h6>
                    {{Session::get('Failed')}}
                </div>
              @endif