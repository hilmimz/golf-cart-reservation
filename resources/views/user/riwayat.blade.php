<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Golf Cart</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <div class="container-fluid">
                        <div class="navbar-header align-items: left mr-4">
                        <a class="navbar-brand font-weight-bold" href="{{ route('dashboard_user') }}">Golf Cart</a> <!-- gabisa digeser ke kanan -->
                        </div>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

            
            <!-- Pesan -->
            <div class="container-fluid d-flex justify-content-center">

                    <!-- Content Row -->

                    <div class="row col-10">

                        <!-- Area Chart -->
                        <div class="col-xl col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-body">

                                <div class="container-fluid custom-container ml-2">
                                    
                                <div class="row">
                                    <div class="col-6 d-flex justify-content-start">
                                        <h5 class="card-title">Kode Pemesanan: QE2</h5> <!-- Replace with your actual reservation code --></h5>
                                    </div>

                                    <div class="col-6 d-flex justify-content-end">
                                        <div>
                                        <span class="badge badge-pill badge-primary">Dipesan</span>         
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-2 mb-4">

                                
                            <div class="row align-items-center">
                                <div class="col-md-5 custom-content">
                                    <h5>Golf Cart 1</h5>
                                </div>
                                <div class="col-md-3 custom-content">
                                    <h6>07:30</h6>
                                    <p>Halte A</p>
                                </div>
                                <div class="col-md-2 custom-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                                </svg>
                                </div>
                                <div class="col-md-2 custom-content">
                                    <h6>07:40</h6>
                                    <p>Halte B</p>
                                </div>
        
                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="container-fluid d-flex justify-content-center">

                <!-- Content Row -->
                <div class="row col-10">

                        <!-- Area Chart -->
                        <div class="col-xl col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-body">

                                <div class="container-fluid custom-container ml-2">
                                    
                                <div class="row">
                                    <div class="col-6 d-flex justify-content-start">
                                        <h5 class="card-title">Kode Pemesanan: QW9</h5> <!-- Replace with your actual reservation code --></h5>
                                    </div>

                                    <div class="col-6 d-flex justify-content-end">
                                        <div>
                                        <span class="badge badge-pill badge-success">Selesai</span>         
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-2 mb-4">

                                
                            <div class="row align-items-center">
                                <div class="col-md-5 custom-content">
                                    <h5>Golf Cart 1</h5>
                                </div>
                                <div class="col-md-3 custom-content">
                                    <h6>07:30</h6>
                                    <p>Halte A</p>
                                </div>
                                <div class="col-md-2 custom-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                                </svg>
                                </div>
                                <div class="col-md-2 custom-content">
                                    <h6>07:40</h6>
                                    <p>Halte B</p>
                                </div>
        
                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>



             </div>
         </div>
         </div> 
            

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Golf Cart 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap core JavaScript-->
    <script src="{{('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{('template/js/sb-admin-2.min.js')}}"></script>

</body>

</html>