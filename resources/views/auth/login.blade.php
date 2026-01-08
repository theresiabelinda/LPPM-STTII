<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - STTII</title>
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        body {

            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("{{ asset('assets-fe/assets/img/logo.png') }}");

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: #070000;
        }

        .card {
            /* Sedikit transparansi pada card login */
            background-color: rgba(255, 255, 255, 0.95);
        }
    </style>
</head>
<body>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">

                            @if(session()->has('pesan'))
                                <div class="alert alert-danger">
                                    {{session()->get('pesan')}}
                                </div>
                            @endif

                            <div class="card-header">
                                {{-- --- UPDATE LOGO DI SINI --- --}}
                                {{-- Pastikan kamu punya file logo (misal: logo-sttii.png) di folder assets-fe/assets/img/ --}}
                                <div class="text-center mt-3">
                                    <img src="{{ asset('assets/img/logo.png') }}"
                                         alt="Logo STTII"
                                         style="width: 80px; height: auto;"> </div>

                                <h3 class="text-center font-weight-light my-3">
                                    Login STTII
                                </h3>
                            </div>

                            <div class="card-body">
                                <form class="user" method="post" action="{{route('auth.verify')}}">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input name="email" class="form-control" id="inputEmail" type="email" placeholder="email" />
                                        <label for="inputEmail">Username / Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="password" class="form-control" id="inputPassword" type="password" placeholder="Password" />
                                        <label for="inputPassword">Password</label>
                                    </div>

                                    <div class="d-grid gap-2 mt-4 mb-0">
                                        <input type="submit" value="Login" class="btn btn-primary btn-block">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
</body>
</html>
