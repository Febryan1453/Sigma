<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">

      @if(Auth::user()->role == 1)

          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route ('admin.index') }}">
            <div class="sidebar-brand-icon">
              <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SIGMA</div>
          </a>
          <hr class="sidebar-divider my-0">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route ('admin.index') }}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
          </li>

      @else

          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route ('mhs.index') }}">
            <div class="sidebar-brand-icon">
              <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SIGMA</div>
          </a>
          <hr class="sidebar-divider my-0">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route ('mhs.index') }}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
          </li>

      @endif


      @if(Auth::user()->role == 1)

          <hr class="sidebar-divider">

          <div class="sidebar-heading">
            Administrator
          </div>
          
          <li class="nav-item {{request()->routeIs('admin.addadmin') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route ('admin.addadmin') }}">
              <i class="fa-solid fa-circle-plus"></i>
              <span>Tambah Admin</span>
            </a>
          </li>

          <li class="nav-item {{request()->routeIs('admin.listadmin') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route ('admin.listadmin') }}">
              <!-- <i class="fa-solid fa-table-list"></i> -->
              <i class="fa-solid fa-table-list"></i>
              <span>Data Admin</span>
            </a>
          </li>
          
          <li class="nav-item {{request()->routeIs('admin.addmhs') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route ('admin.addmhs') }}">
              <i class="fa-solid fa-circle-plus"></i>
              <span>Tambah Mahasiswa</span>
            </a>
          </li>

          <li class="nav-item {{request()->routeIs('admin.listmhs') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route ('admin.listmhs') }}">
              <!-- <i class="fa-solid fa-table-list"></i> -->
              <i class="fa-solid fa-table-list"></i>
              <span>Data Mahasiswa</span>
            </a>
          </li>
          
          <li class="nav-item {{request()->routeIs('admin.addtugasmhs') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route ('admin.addtugasmhs') }}">
              <i class="fa-solid fa-circle-plus"></i>
              <span>Tambah Tugas Mahasiswa</span>
            </a>
          </li>

          <li class="nav-item {{request()->routeIs('admin.listtugasmhs') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route ('admin.listtugasmhs') }}">
              <!-- <i class="fas fa-fw fa-chart-area"></i> -->
              <i class="fa-solid fa-table-list"></i>
              <span>Tugas Mahasiswa</span>
            </a>
          </li>

          <li class="nav-item
            @if(request()->routeIs('nilai.index'))
              active
            @elseif(request()->routeIs('nilai.tugas'))
              active
            @endif
          ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
              <i class="fa-solid fa-list-ol"></i>
              <span>Nilai Mahasiswa</span>
            </a>
            <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Nilai</h6>
                <a class="collapse-item {{request()->routeIs('nilai.index') ? 'active' : '' }}" href="{{route('nilai.index')}}">Per Mahasiswa</a>
                <a class="collapse-item {{request()->routeIs('nilai.tugas') ? 'active' : '' }}" href="{{route('nilai.tugas')}}">Per Tugas</a>            
              </div>
            </div>
          </li>

          <li class="nav-item
            @if(request()->routeIs('admin.add.materi'))
              active
            @elseif(request()->routeIs('admin.materi'))
              active
            @endif
          ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
              <i class="fab fa-fw fa-wpforms"></i>
              <span>Materi</span>
            </a>
            <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Materi</h6>
                <a class="collapse-item {{request()->routeIs('admin.materi') ? 'active' : '' }}" href="{{route('admin.materi')}}">List Materi</a>
                <a class="collapse-item {{request()->routeIs('admin.add.materi') ? 'active' : '' }}" href="{{route('admin.add.materi')}}">Tambah Materi</a>            
              </div>
            </div>
          </li>

          @if(Auth::user()->email == 'febryan1453@gmail.com')
          <!-- <li class="nav-item {{request()->routeIs('history.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route ('history.index') }}">
              <i class="fa-solid fa-clock-rotate-left"></i>
              <span>History Login User</span>
            </a>
          </li> -->

          <li class="nav-item
            @if(request()->routeIs('history.index'))
              active
            @elseif(request()->routeIs('history.yajra'))
              active
            @endif
          ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#historyLogin" aria-expanded="false" aria-controls="historyLogin">
              <i class="fa-solid fa-clock-rotate-left"></i>
              <span>History</span>
            </a>
            <div id="historyLogin" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">History Login</h6>
                <a class="collapse-item {{request()->routeIs('history.index') ? 'active' : '' }}" href="{{route('history.index')}}">Semua User v1</a>
                <a class="collapse-item {{request()->routeIs('history.yajra') ? 'active' : '' }}" href="{{route('history.yajra')}}">Semua User v2</a>            
              </div>
            </div>
          </li>
          @endif

          <li class="nav-item {{request()->routeIs('admin.deltugasid') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route ('admin.deltugasid') }}">
              <!-- <i class="fas fa-fw fa-chart-area"></i> -->
              <i class="fa-solid fa-trash"></i>
              <span>Delete Tugas ID</span>
            </a>
          </li>

      @endif

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <i class="fa-solid fa-file-pen"></i>
          <span>Tambah Tugas</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Peminatan</h6>
            <a class="collapse-item" href="#">Input Data</a>
          </div>
        </div>
      </li> -->

      @if(Auth::user()->role == 0)

          @if(Auth::user()->mahasiswa->isready == 1)
      
          <hr class="sidebar-divider">

          <div class="sidebar-heading">
            Tugas
          </div>

          <li class="nav-item {{request()->routeIs('mhs.materi') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route ('mhs.materi') }}">
              <i class="fab fa-fw fa-wpforms"></i>
              <span>Materi</span>
            </a>
          </li>
          
          <li class="nav-item {{request()->routeIs('mhs.tugassaya') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route ('mhs.tugassaya') }}">
              <i class="fa-solid fa-file-pen"></i>
              <span>Tugas Saya</span>
            </a>
          </li>
          
          <li class="nav-item {{request()->routeIs('mhs.tugasselesai') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route ('mhs.tugasselesai') }}">
              <i class="fa-solid fa-check-to-slot"></i>
              <span>Tugas Terkirim</span>
            </a>
          </li>

          @endif

      @endif

      
      <hr class="sidebar-divider">
      
      <div class="sidebar-heading">
        Akun
      </div>
      
      @if(Auth::user()->role == 0)

            <li class="nav-item {{request()->routeIs('mhs.myprofile') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('mhs.myprofile') }}">
                <i class="fa-solid fa-user"></i>
                <span>My Profile</span>
              </a>
            </li>

            <li class="nav-item {{request()->routeIs('mhs.gantipass') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('mhs.gantipass') }}">
                <i class="fa-solid fa-lock"></i>
                <span>Ganti Password</span>
              </a>
            </li>

      @endif

      <li class="nav-item">
        <a class="nav-link" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
          <i class="fa-solid fa-right-from-bracket"></i>
          <span>Logout</span>
        </a>
      </li>

      <hr class="sidebar-divider">
      <!-- <div class="version" id="version-ruangadmin"></div> -->
</ul>




    