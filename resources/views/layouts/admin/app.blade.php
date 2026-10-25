<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SiGudang - Admin Dashboard</title>

  <!-- SEO Optimization -->
  <meta name="description" content="Spark Admin - Premium Bootstrap 5 Admin Dashboard Template">
  <meta name="author" content="Spark Admin Team">

  {{-- start css --}}
  @include('layouts.admin.css')
  {{-- end css --}}
</head>

<body>

  <!-- ==========================================
         START: Sidebar Component
         Highly polished, dark-green sticky navigation
         ========================================== -->
  {{-- start sidebar --}}
  @include('layouts.admin.sidebar')
  {{-- end sidebar --}}
  <!-- ==========================================
         END: Sidebar Component
         ========================================== -->


  <!-- ==========================================
         START: Main Content Area
         ========================================== -->
  <div class="main-wrapper">

    {{-- start header --}}
    @include('layouts.admin.header')
    {{-- end header --}}

    {{-- start main content --}}
    @yield('content')
    {{-- end main content --}}

    {{-- start footer --}}
    @include('layouts.admin.footer')
    {{-- end footer --}}

  </div>
  <!-- ==========================================
         END: Main Content Area
         ========================================== -->

  {{-- start js --}}
  @include('layouts.admin.js')
  {{-- end js --}}
</body>

</html>
