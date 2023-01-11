@extends('layout.app')
@section('app_content')
<div class="wrapper">

  <!-- Preloader -->

  <!-- Navbar -->
  @includeIf('includes.navbar')

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->




  @includeIf('includes.sidebar')

  <!-- Main Sidebar Container -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @includeIf('includes.breadcumb')
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            @yield('main_content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



</div>
<!-- ./wrapper -->
@endsection
