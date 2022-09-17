
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
  
  <!-- @stack('css-nya') -->
  @include('layouts.includes.needs.style')

  <style>
    .blink {
      animation: blink-animation 2s steps(5, start) infinite;
      -webkit-animation: blink-animation 2s steps(5, start) infinite;
    }
    @keyframes blink-animation {
      to {
        visibility: hidden;
      }
    }
    @-webkit-keyframes blink-animation {
      to {
        visibility: hidden;
      }
    }
</style>

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

  @include('layouts.includes.needs.js')

</body>

</html>