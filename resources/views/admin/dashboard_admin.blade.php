@extends('template.template')
@section('content')

<!-- Judul Halaman --> 
<div class="row mt-3">
    <div class="col-lg-8 offset-lg-2 col-sm-8 offset-sm-2 text-center div-title-admin" style="font-weight: 900; margin-bottom: 40px">
      <h2 class="p-2"> Selamat Datang di Halaman Admin</h2>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card-group" style= "margin-bottom: 20px">
          <div class="card bg-light">
            <div class="card-body" style= "display: flex; flex-direction: column; align-items: center; text-align: center;">
                <i class="fa fa-road fa-4x mb-2"></i>
                <h5 class="card-title"><a href="{{ url('/dashboard_admin/rute') }}">Kelola Rute</a></h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card-group" style= "margin-bottom: 20px">
            <div class="card bg-light">
                <div class="card-body" style= "display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <i class="fa fa-calendar fa-4x mb-2"></i>
                    <h5 class="card-title"><a href="{{ url('/dashboard_admin/jadwal') }}">Kelola Jadwal</a></h5>
                </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="card-group" style= "margin-bottom: 20px">
            <div class="card bg-light">
                <div class="card-body" style= "display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <i class="fa fa-male fa-4x mb-2"></i>
                    <h5 class="card-title"><a href="{{ url('/dashboard_admin/sopir') }}">Kelola Supir</a></h5>
                </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card-group">
            <div class="card bg-light" style= "margin-bottom: 20px">
                <div class="card-body" style= "display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <i class="fa fa-bus fa-4x mb-2"></i>
                    <h5 class="card-title"><a href="{{ url('/dashboard_admin/golf_cart') }}">Kelola Golf Cart</a></h5>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>