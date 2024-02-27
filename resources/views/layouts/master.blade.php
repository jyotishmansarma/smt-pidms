<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
     @include('layouts.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        @include('layouts.navbar')
        <!--  Header End -->
{{--        <div class="container-fluid">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title fw-semibold mb-4">Sample Page</h5>--}}
{{--                    <p class="mb-0">This is a sample page </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        @yield('main-body')
    </div>
</div>
@include('layouts.script')
</body>

</html>