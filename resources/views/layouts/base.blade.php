
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="img/logo/logo.png">
  <title>{{ $title ?? 'Dashboard' }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link type="text/css" href="{{ asset ('RuangGuru/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link type="text/css" href="{{ asset ('RuangGuru/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('RuangGuru/css/ruang-admin.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
</head>

<body id="page-top">

  <div id="wrapper">
    
    <!-- Sidebar -->
    @include('layouts.includes.sidebar')
    <!-- Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <!-- TopBar -->
        @include('layouts.includes.navbar')
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          
          <!-- Main Content -->
          @yield('content')
          <!-- Main Content -->

          <!-- Modal Logout -->
          @include('layouts.modal.logout')
          <!-- Modal Logout -->
          
        </div>
        <!---Container Fluid-->

      </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://github.com/Febryan1453" target="_blank">febryan1453</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{ asset ('RuangGuru/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset ('RuangGuru/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset ('RuangGuru/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset ('RuangGuru/js/ruang-admin.min.js') }}"></script>
  <script src="{{ asset ('RuangGuru/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset ('RuangGuru/js/demo/chart-area-demo.js') }}"></script>  

  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</body>

</html>