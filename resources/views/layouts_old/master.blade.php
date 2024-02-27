<!DOCTYPE html>
<html lang="en" class="">
@include('layouts_old.head')
<body>

<div id="app">

    @include('layouts_old.navbar')

    @include('layouts_old.sidebar')

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li></li>
    </ul>
    {{-- <a href="https://justboil.me/" onclick="alert('Coming soon'); return false" target="_blank" class="button blue">
      <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
      <span>Premium Demo</span>
    </a> --}}
  </div>
</section>



  <section class="section main-section">
    @yield('main-body')
  </section>

  @include('layouts_old.footer')




</div>

<!-- Scripts below are for demo only -->
@include('layouts_old.script')
@yield('main-script')
</body>
</html>
