<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Register</title>
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
                            <h1 class="fw-bolder">Halo, selamat datang!</h1>
                            <p class="lead fw-normal text-muted mb-0">Silakan registrasi terlebih dahulu untuk melanjutkan</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <form id="contactForm" action="{{ route('register_sopir.store') }}" method="POST">
                                @csrf
                                    <div class="form-group mb-3">
                                        <label for="formGroupExampleInput">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="formGroupExampleInput">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="formGroupExampleInput">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="formGroupExampleInput">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                    </div>
                                    <div class="mt-5 text-center">
                                            <p>Sudah memiliki akun? <a href="/login">Login di sini</a></p>
                                        </div>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-dark btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" type="submit">Register</button></div>
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
