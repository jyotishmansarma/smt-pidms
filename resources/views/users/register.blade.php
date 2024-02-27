<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
{{--    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/favicon.png')}}" />--}}
    <link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}" />
    @livewireStyles
</head>

<body>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">

    <div class="col-md-12 col-lg-12 col-xxl-12 d-flex align-items-center ">
        @if(session('msgerror'))
            <div class="alert alert-warning" role="alert">
                {{ session('msgerror') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">

        <div class="d-flex align-items-center justify-content-center w-100">

            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-6">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src="{{asset('assets/images/logos/logo-jjm.svg')}}" width="80" alt="">
                            </a>
                            <p class="text-center">ISSUE TRACKING SYSTEM</p>

                            <livewire:register-form/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
@livewireScripts
</body>

</html>