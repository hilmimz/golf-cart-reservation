<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Login</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Custom Google font-->
        <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                        <div class="text-center mb-5">
                            <!-- <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div> -->
                            <h1 class="fw-bolder">Halo selamat datang kembali!</h1>
                            <p class="lead fw-normal text-muted mb-0">Silakan login terlebih dahulu untuk melanjutkan</p>
                        </div>
                        {{-- Perbaiki displaynya --}}
                        @if(session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError')}}
                        </div>
                        @endif
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <form action="{{ route('login.authenticate') }}" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="formGroupExampleInput">Email</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" name="email" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="formGroupExampleInput">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                    </div>
                                    <div class="mt-5 text-center">
                                            <p>Belum memiliki akun? <a href="/register">Daftar di sini</a></p>
                                        </div>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-dark btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" type="submit">Login</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-white py-4 mt-auto">
            <div class="container px-5 justify-content-center">
                    <div class="col-auto"><div class="text-center small m-0">Copyright &copy; Golf Cart 2023</div></div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
