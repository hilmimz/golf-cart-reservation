@extends('template.template')
@section('content')

<!-- Popup tambah pertanyaan -->
<form action="{{ url('tambah-pertanyaan') }}" method="POST">
  @method('POST')
  @csrf
  <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Tambah Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="">
                <table class="table">
                  <tr>
                    <td>
                      Time
                      <div class="input-group input-group-sm mx-auto my-1">
                        <input type="text" id='pertanyaan' name='pertanyaan' class="form-control @error('pertanyaan') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                        @error('pertanyaan')
                          <span class="invalid-feedback" role="alert">
                            <strong>{!! $message !!}</strong>
                          </span>
                        @enderror 
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Route Start
                      <div class="input-group input-group-sm mx-auto my-1">
                        <input type="text" id='pertanyaan' name='pertanyaan' class="form-control @error('pertanyaan') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                        @error('pertanyaan')
                          <span class="invalid-feedback" role="alert">
                            <strong>{!! $message !!}</strong>
                          </span>
                        @enderror 
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Direction
                      <div class="input-group input-group-sm mx-auto my-1">
                        <input type="text" id='pertanyaan' name='pertanyaan' class="form-control @error('pertanyaan') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                        @error('pertanyaan')
                          <span class="invalid-feedback" role="alert">
                            <strong>{!! $message !!}</strong>
                          </span>
                        @enderror 
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Golf Cart ID
                      <div class="input-group input-group-sm mx-auto my-1">
                        <input type="text" id='pertanyaan' name='pertanyaan' class="form-control @error('pertanyaan') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                        @error('pertanyaan')
                          <span class="invalid-feedback" role="alert">
                            <strong>{!! $message !!}</strong>
                          </span>
                        @enderror 
                      </div>
                    </td>
                  </tr>
                </table>

                <div class="d-flex mt-4 justify-content-center" > 
                  <button type="button" class="btn btn-danger justify-content-center py-2 rounded-3 btn-font mx-3" style="color:white" data-dismiss="modal">
                    <span class="rounded-3" style="color:white"><i class="fa fa-trash mx-2"></i></span>Batal
                  </button>
                  <button type="submit" class="btn btn-success justify-content-center py-2 rounded-3 btn-font mx-3" style="color:white">
                    <span class="rounded-3" style="color:white"><i class="fa fa-check mx-2"></i></span>Simpan
                  </button>
                </div> 
                 
              </form>
            </div>
        </div>
    </div>
  </div>
</form>

<div class="container " style="padding-bottom:5%">
  
    <!-- alert sukses-->
    <div class="row mt-3">
      <div class="col-12 text-center" style="font-weight: 900">
        @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show">
            <strong>Success!</strong> <p>{{ session('success') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        @endif
      </div>
    </div>

    <!-- Judul Halaman --> 
    <div class="row mt-3">
      <div class="col-lg-8 offset-lg-2 col-sm-8 offset-sm-2 text-center div-title-admin" style="font-weight: 900">
        <h2 class="p-2">KELOLA JADWAL</h2>
      </div>
    </div>

    <!-- Button Tambah Pertanyaan -->
    <div class="row">
      <div class="d-flex mt-4 justify-content-end" > 
          <button type="button" class="btn btn-success justify-content-center py-2 rounded-3 btn-font" style="color:white" data-toggle="modal" data-target="#detailModal">
            <span class="rounded-3" style="color:white"><i class="fa fa-plus mx-2"></i></span>Tambah Jadwal
          </button>
      </div> 
    </div>

    <!-- Tabel -->
    <div class="row">
      <div class="col-12 col-sm-12">
        <table class="table-responsive mt-4 table-hover rounded-corners">
          <thead class="shadow-sm" style="background-color:white">
            <!-- Judul Tabel -->
            <tr class="rounded-3 text-center p-3">
              <th class="col-2 p-3 col-sm-3 div-title-admin" style="font-size:18px">Time</th>
              <th class="col-3 p-3 col-sm-3 div-title-admin" style="font-size:18px">Route Start</th>
              <th class="col-2 p-3 col-sm-2 div-title-admin" style="font-size:18px">Direction</th>
              <th class="col-2 p-3 col-sm-2 div-title-admin" style="font-size:18px">Golf Cart Id</th>
              <th class="col-2 p-3 col-sm-2 div-title-admin" style="font-size:18px">Aksi</th>
            </tr>
          </thead>

          <tbody style="font-size:14px">
            
              <tr class="shadow-sm" style="background-color:white">

                <!-- Isi time -->
                <td class="p-3">
                  <a href="" style="font-size:15px">
                
                  </a>
                </td>       
                
                <!-- Isi route start-->
                <td class="p-3 fw-bold">
                  <div class="input-group input-group-sm my-lg-1 col-sm-12 justify-content-center">
                    
                      <div class="col-12 text-center" style="background-color:white; font-size:15px; font-weight:500">
                        babi
                      </div>
                    
                  </div>
                </td>

                <!-- Isi Skor-->
                <td class="p-3 fw-bold">
                  <div class="input-group input-group-sm my-lg-1 col-sm-12 justify-content-center">
                    
                      <div class="col-12 text-center" style="background-color:white; font-size:15px; font-weight:500">
                       babi
                      </div>
                                      
                  </div>
                </td>

                <!-- Isi Skor-->
                <td class="p-3 fw-bold">
                  <div class="input-group input-group-sm my-lg-1 col-sm-12 justify-content-center">
                    
                      <div class="col-12 text-center" style="background-color:white; font-size:15px; font-weight:500">
                       babi
                      </div>
                                      
                  </div>
                </td>
              
                <!-- Button Edit dan Hapus pertanyaan -->
                <td class="p-lg-3 p-sm-3 text-center">
                  <button type="button" data-toggle="modal" data-target="#editModal" class="btn btn-primary col-lg-10 col-sm-12 mx-lg-2 my-2 rounded-3">
                    <i class="fa fa-pencil" style="font-size: 20px"></i>        
                  </button>
                  <button type="button" data-toggle="modal" data-target="#HapusModal" class="btn btn-danger col-lg-10 col-sm-12 mx-lg-2 my-2 rounded-3" >
                    <i class="fa fa-trash" style="font-size: 20px"></i>
                  </button>  
                </td>
            
              </tr>

              {{-- modal konfirmasi hapus --}}
              <div class="modal fade" id="HapusModal" tabindex="-1" aria-labelledby="HapusModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" action="{{url('admin-setting/delete/')}}">
                      @csrf
                      <div class="modal-header">
                        <h5 class="modal-title" id="HapusModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Apakah anda yakin ingin menghapus data 
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ya</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                      </div>
                    </form>             
                  </div>
                </div>
              </div>

              {{-- modal update --}}
              <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" action="{{url('admin-setting/update/')}}">
                      @csrf
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Update Pertanyaan</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="pertanyaan">Time</label>
                          <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" required>
                        
                        </div>
                        <div class="form-group">
                          <label for="pertanyaan">Route Start</label>
                          <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" required>
                        
                        </div>
                        <div class="form-group">
                            <label for="pertanyaan">Direction</label>
                            <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" required>
                          
                          </div>
                          <div class="form-group">
                            <label for="pertanyaan">Golf Cart ID</label>
                            <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" required>
                          
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                      </div>
                    </form>             
                  </div>
                </div>
              </div>
        
          </tbody>
          
        </table>
      </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
