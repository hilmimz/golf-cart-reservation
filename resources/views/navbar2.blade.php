    <link href="/css/styles.css" rel="stylesheet" />
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/custom.css" rel="stylesheet" />
    <script type="text/javascript" src="/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">


    <!-- start navbar -->
    <nav class="navbar fixed-top navbar-custom">
        <span onclick="toggleSidenav()"><i class="fa fa-bars"></i></span>
        <img class="rounded ml-auto" alt="profile picture" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" />
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href={{route('logout')}}>Logout</a>
            </div>
        </div>
    </nav>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{ url('/dashboard_admin') }}" style="margin-top: 200%"><i class="fa fa-home"></i><p>Home</p></a>
        <a href="{{ url('/dashboard_admin/rute') }}"><i class="fa fa-road"></i><p>Ubah Rute</p></a>
        <a href="{{ url('/dashboard_admin/jadwal') }}"><i class="fa fa-calendar"></i><p>Ubah Jadwal</p></a>
        <a href="{{ url('/dashboard_admin/sopir') }}"><i class="fa fa-male"></i><p>Kelola Supir</p></a>
        <a href="{{ url('/dashboard_admin/kelola_golfcart') }}"><i class="fa fa-bus"></i><p>Kelola Golf Cart</p></a>
    </div>
    <!-- end navbar -->

    <!-- add this at the footer -->
    <!-- <script type="text/javascript" src="/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
function toggleSidenav(){
    var x = document.getElementById("mySidenav");
    if(x.style.width === "0px"){
        x.style.width = "100px";
    }else{
        x.style.width = "0px";
    }
}
</script> -->
