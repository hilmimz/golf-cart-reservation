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
                        <a class="navbar-brand font-weight-bold" href="{{ route('dashboard_user') }}">Golf Cart</a> 
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="{{ route('cek_rute') }}">
                                            <div class="text-xL font-weight-bold text-primary text-uppercase mt-2">Lihat Rute</div>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="{{ route('riwayat') }}">
                                            <div class="text-xl font-weight-bold text-success text-uppercase mt-2">Riwayat Pemesanan</div>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-history fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-body mb-4 mt-4">

                                    <h2 class="text-center mt-4 mb-4">Masukkan Tujuan Anda</h2>

                                   <div class="row mb-4 pt-4 pb-4">
                                    <!-- Dari -->
                                    <div class="col-6 col-md-6 mb-4">
                                        <label class="text-xs font-weight-bold text-primary text-uppercase mb-1">Dari</label>
                                        <div class="d-flex">
                                            <select class="form-control" id="dari">
                                                <option selected>Pilih Halte</option>
                                                <option value="1">Halte A</option>
                                                <option value="2">Halte B</option>
                                                <option value="3">Halte C</option>
                                            </select>

                                            <button onclick="switchHalte()" type="submit" class="btn btn-primary ml-4">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect width="20" height="20" fill="url(#pattern0)"/>
                                                <defs>
                                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_621_1210" transform="scale(0.0078125)"/>
                                                </pattern>
                                                <image id="image0_621_1210" width="128" height="128" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACAEAQAAAA5p3UDAAAAIGNIUk0AAHomAACAhAAA+gAAAIDoAAB1MAAA6mAAADqYAAAXcJy6UTwAAAACYktHRAAAqo0jMgAAAAlwSFlzAAAAYAAAAGAA8GtCzwAAAAd0SU1FB+cMEREYCQzjtdsAAAdBSURBVHja7d1NTBVXGAbg9wxXiSkaAzSGok0kxr9dE9OFcQvU0tYuNKSRhS7qgiKpm6bLdtXUlYoxaTfd0DbELpTGmMbtjbWJaBdeMcaoKahNxbYGbKtcztvFBEG5F+bOD+fO3PdJWMAMl2/O93Hm/xxAREREJCFkUxPZ1OQ6DllmtJ2dtKOjfK5QoO3ocB2XLAPaffvI6WkuUCzS9vS4jk8SVD75KoLMWzr5KoLMCp58FUHmVJ58FUFmkN3d4ZI/a3paZwcpFT35swoF19siFQrf7Zdhm5tdb5MEFHvyaS3Z2Oh6uySA+Lp97QJSJ5nkT0/Ttre73jZZQvzdPkkWi+T+/a63TZag5NcwJb+GKfk1TMnPPlNuAdndDQwOArmc6yBry7NnwJMnwN9/A2Nj4M2bMKOjYD4PMzJizMxMnH+tZAEo+dXq8WPgwgVgcBA8f954z55F/cQFBaDkpwQnJmBOnQJOnDDm0aOwH/NCASj5aTQ1BRw7BnzxhTH//FPpbz8vACU/7e7eBfr6jDl3rpLfMoB/tA/z3XdKfhZ8/TXY32+8p0+DrG3I998HTp9W8jOEly/DvPuuMb//vtSqhhwbA9avdx2zxIy3bwOdnca7dWux1TzXcUpCTFsbTD5Pu2nTYqt5wOHDQLHoOl5Jwrp1wE8/kS0t5dbwjDlzBujpURFklGlrA4eHaevrSy32AMCYoSHwgw9UBBllduyAOXq05KL53+haQNa9887L1wkWXgq2e/fCfP+9iiCLfvsN2L7dmCdPZn+y4CzAeD/8oGOCrHr9deCTT+b/pPztYPUEGTU1BW7caLyJiSVXTewJYHZ3u26GakW+8gq5dSu5ezd58iQ5NhZv+5PkZ59VEJCKwCXaXI72ww/Je/fia/8//qBdsSJ4ECoC52hXryaHh+Nr//feqywAFYFzpOeRAwPxtP3QUOUB2L17E3lIVOMDBOYXwdmz0dv9r7/IuroQAST1apjGBwiKds0a8v79yM1ud+wIF4BeDnWOPHQoept//HGEAJIoAg0mGRRtLkeOj0dr76++Cv08QPw3kEj/S4IwXrEInD0b7VO2bIkciIaIcYfs6orW5rdvxxRIHINEaXyASvlXDCOwDx/GF0zoU0S9KxgWbUNDtB7gv/9iDqjSIlDyoyInJ8MXwOPHCQQUdHegq4BxoL10KXwBXLyYTFBLFoGSHxfy8OHwBdDbm2Bg5YpAyY8TbX097dWrlSd/ZIR25cqEg+voIAuFuT967ZqO9uNHtrZWVgQjI+Rrry1jgI2NGgQyWbQrV9L29ZEXL5Y+MJyc9Jf19ib+ny8iIiIiIiIiIiIiIiIiIiLVwX+0qL+f9tIl2qmpBc8T2Kkpf1lfnx4oSBbZ1LSsr8mRra3kr78GfqLIXr1Ktra6bqisoe3sJK9fn2vo69cTf2uatr6+ouQ/L4IrV9QTxMfZQ7S0/f2VP1E666OPXDdcFjh9jJ785ZfQ+bc//+y68dLO+Ys00V4tmpx03YBpVvm8jAkMp0M+fRq+AEja1atdN2QahZ+UM+YiICcmohXA5s2uGzNt/KP9iK/Tx7U7IO/ciVQA3L3bdYOmDe3oaLQ2j68IPGB8PNpHdHW5btA0oW1uhtm6Nfon5XLAt99G3R144I0b0QLZs4dWA0q7UVcH8803UXoCD2Z0NFoQ69cDBw+6boq0MN7ERPR/uvlyOWBwMHQR0L75ZvT90b17OhsIzn9rukqG3SXr6vxhQ6M6fz7U0KM1qqqG3SVPn44ngIEB0tNchAFVzQDc5J498QXw44+0a9a4bty0qIoi8AcXePgwvgDu3ycPHdLZQTDVUQT8/PN4AyD9sWxPnSLffpvcto22ocF1Y1crV0Vg5gJobPTnoNfRfLbMzIAHDhhvcLDU0ucHbMb8+Sdw/LjrcCVui18semnm0FWrgEIB2LjRddgSt9I9wQunbMb8+68/m7hkT+meYOHMoebcOWBgwHW4koSFN5BKzhzqTzWez8OEnFNGqlyxCPT0GDM0VH7qWLa0gPk8TFub63AlCcUisG+fWWwV2k2bYPJ5YN061+FKEsbHF71ub7xbt8BduxDX1CJSZUgTbLWWFnB4WMcEWeLvAgLduTPmwQNg507gyy81s1cWzMwABw4Yc+ZMoB5gPrKryz9N1MWidJo7AwDKnAYuxb9i+OmnwJEjuneQJi8mHwhZALP8G0j9/UBvL/Dqq643TxazMPlAxAKYRbtiBfDWWzA9PUBHB7B2revNlflKJx+IqQDmI+vqwDfegNm1C9i2DdiyBdywAWbtWqChAdAr5curfPKlioR/V3AxmpcxFZT8Gqbk1zAlv4Yp+TUs+vgApWhG1tSIZ3wAJT+VaJub1e3XMH8UUCW/plXTEDHiQPTxAZT81As/PoC6/cyovAiU/MwJXgRKfmYtXQRKfuaVLwIlv2bQtreThcJc8q9do21vdx2XLDOysdF/3lJEREQkGf8DS/3ekS0JN9gAAAAASUVORK5CYII="/>
                                                </defs>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Tujuan -->
                                    <div class="col-6 col-md-6 mb-4">
                                        <label class="text-xs font-weight-bold text-success text-uppercase mb-1">Tujuan</label>
                                        <div class="d-flex">
                                            <select class="form-control" id="tujuan">
                                                <option selected>Pilih halte</option>
                                                <option value="1">Halte A</option>
                                                <option value="2">Halte B</option>
                                                <option value="3">Halte C</option>
                                            </select>

                                            <a href="{{ route('reservasi') }}">
                                            <button type="submit" class="btn btn-primary ml-4 mr-2">
                                                <i class="fas fa-search"></i>   
                                            </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                      

                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- End of Main Content -->

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
                    <a class="btn btn-primary" href={{route('logout')}}>Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    function switchHalte() {
    var dari = document.getElementById("dari");
    var tujuan = document.getElementById("tujuan");
    var temp = dari.value;
    dari.value = tujuan.value;
    tujuan.value = temp;
    }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{('template/js/sb-admin-2.min.js')}}"></script>

</body>

</html>