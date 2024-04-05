<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PIDMS</title>
{{--    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/favicon.png')}}" />--}}
    <link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}" />
</head>

<body>
<div class="col-md-12 col-lg-12 col-xxl-12 d-flex align-items-center ">
    @if(session('msgerror'))
        <div class="alert alert-warning" role="alert">
            {{ session('msgerror') }}
        </div>
    @endif

</div>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card-body">

                            <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src="{{asset('assets/images/logos/logo-jjm.svg')}}" width="80" alt="">
                            </a>
                            <p class="text-center">SMT PIDMS</p>
                            <x-jet-validation-errors class="mb-4" style="color: red" />
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Contact Number</label>
                                    <input type="text" name="username" :value="old('username')" required class="form-control"  aria-describedby="emailHelp">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" required >
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                                {{-- <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-bold">Create account ?</p>
                                    <a class="text-primary fw-bold ms-2" href="{{route('register')}}">Sign up</a>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>