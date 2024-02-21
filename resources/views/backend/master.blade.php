@include('backend.includes.header')
@include('backend.includes.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  @include('backend.includes.footer')
