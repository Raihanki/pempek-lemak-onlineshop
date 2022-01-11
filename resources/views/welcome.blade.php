<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito';
            background: #f7fafc;
        }
    </style>
</head>
<body class="bg-home-page">

    <div class="mb-5">
        <div class="container-fluid bg-custom-nav p-4">
            <div class="col-12">
                <div class="d-flex justify-content-end color-text-cus">
                    @if (Route::has('login'))
                        <div class="">
                            @auth
                                @if(Auth::user()->hasRole("admin"))
                                    <a href="{{ url('/admin/dashboard') }}" class="text-warning">Dashboard</a>
                                @else
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn-sm btn-primary">Logout</button>
                                    </form>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="text-warning ">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-warning">Register</a>
                                @endif
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

    <div class="container text-pempek">
        <div class="row mt-5">
            <div class="col-md-7 border-right border-dark">
                <h1>Ayo Nikmati Makanan Khas Palembang di Pempek Lema'k 179</h1>
                <p>Restoran khas palembang yang telah berdiri sejak tahun 2012</p>
                <hr>
            </div>
            <div class="col-ms-5 mt-4 ml-5">
                <a href="/menu" class="daftar-menu-text ml-5">Daftar Menu</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="custom-footer text-center text-lg-start text-white">
        <!-- Section: Social media -->
        <section
            class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
        >
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span class="span-custom font-weight-bold">Dapatkan informasi lebih lanjut tentang toko kami :</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="informasi-custom text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>PEMPEK LEMA'K 179
                        </h6>
                        <p>
                            Pempek Lema'k 179, Pas Gurihnya.. Pas Pedasnya..
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="informasi-custom text-uppercase fw-bold mb-4">
                            Produk
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pempek</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Tekwan</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Kerupuk</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Es Kacang Merah</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="informasi-custom text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="informasi-custom text-uppercase fw-bold mb-4">
                            Kontak
                        </h6>
                        <p><i class="fas fa-home me-3"></i> Bogor, 16969, Indonesia</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            pempeklemak179@gmail.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> +62 821 1746 9247</p>
                        <p><i class="fas fa-print me-3"></i> +62 816 1358 560</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">SkuyTic 3.0</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

</body>
</html>
