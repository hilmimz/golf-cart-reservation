@extends('template.template')
@section('content')

<!-- Popup tambah pertanyaan -->
<form action="{{ route('rute.store') }}" method="POST">
  @csrf
  @method('POST')
  <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Tambah Rute</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="">
                <table class="table">
                  <tr>
                    <td>
                      Name
                      <div class="input-group input-group-sm mx-auto my-1">
                        <input type="text" id='pertanyaan' name='name' class="form-control @error('pertanyaan') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
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
                      Order
                      <div class="input-group input-group-sm mx-auto my-1">
                        <input type="number" id='pertanyaan' name='order' class="form-control @error('pertanyaan') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
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
                      Time To Next Stop
                      <div class="input-group input-group-sm mx-auto my-1">
                        <input type="number" id='pertanyaan' name='time_to_next_stop' class="form-control @error('pertanyaan') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
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
        <h2 class="p-2">KELOLA RUTE</h2>
      </div>
    </div>

    <!-- Button Tambah Pertanyaan -->
    <div class="row">
      <div class="d-flex mt-4 justify-content-end" > 
          <button type="button" class="btn btn-success justify-content-center py-2 rounded-3 btn-font" style="color:white" data-toggle="modal" data-target="#detailModal">
            <span class="rounded-3" style="color:white"><i class="fa fa-plus mx-2"></i></span>Tambah Rute
          </button>
      </div> 
    </div>
    <div class="row">
      <div class="d-flex mt-2 justify-content-end" > 
        <form action="{{ route('rute.fix') }}" method="POST">
          @method('PUT')
          @csrf
          <button type="submit" class="btn btn-light">fixx</button>
        </form>
      </div> 
    </div>
    <!-- Tabel -->
    <div class="row">
      <div class="col-12 col-sm-12">
        <table class="table-responsive mt-4 table-hover rounded-corners">
          <thead class="shadow-sm" style="background-color:white">
            <!-- Judul Tabel -->
            <tr class="rounded-3 text-center p-3">
              <th class="col-2 p-3 col-sm-3 div-title-admin" style="font-size:18px">Name</th>
              <th class="col-3 p-3 col-sm-3 div-title-admin" style="font-size:18px">Order</th>
              <th class="col-2 p-3 col-sm-2 div-title-admin" style="font-size:18px">Time To Next Stop</th>
              <th class="col-2 p-3 col-sm-2 div-title-admin" style="font-size:18px">Aksi</th>
            </tr>
          </thead>

          <tbody style="font-size:14px">
            @foreach ($routes as $route)
                
            
            
              <tr class="shadow-sm" style="background-color:white">

                <!-- Isi time -->
                <td class="p-3">
                  <div class="col-12 text-center" style="background-color:white; font-size:15px; font-weight:500">
                    {{ $route->name }}
                  </div>
                </td>       
                
                <!-- Isi route start-->
                <td class="p-3 fw-bold">
                  <div class="input-group input-group-sm my-lg-1 col-sm-12 justify-content-center">
                    
                      <div class="col-12 text-center" style="background-color:white; font-size:15px; font-weight:500">
                        {{ $route->order }}
                      </div>
                    
                  </div>
                </td>

                <!-- Isi Skor-->
                <td class="p-3 fw-bold">
                  <div class="input-group input-group-sm my-lg-1 col-sm-12 justify-content-center">
                    
                      <div class="col-12 text-center" style="background-color:white; font-size:15px; font-weight:500">
                        {{ $route->time_to_next_stop }} minutes
                      </div>
                                      
                  </div>
                </td>
              
                <!-- Button Edit dan Hapus pertanyaan -->
                <td class="p-lg-3 p-sm-3 text-center">
                  <button type="button" data-toggle="modal" data-target="#editModal-{{ $route->id }}" class="btn btn-primary col-lg-10 col-sm-12 mx-lg-2 my-2 rounded-3">
                    <i class="fa fa-pencil" style="font-size: 20px"></i>        
                  </button>
                  <button type="button" data-toggle="modal" data-target="#HapusModal-{{ $route->id }}" class="btn btn-danger col-lg-10 col-sm-12 mx-lg-2 my-2 rounded-3" >
                    <i class="fa fa-trash" style="font-size: 20px"></i>
                  </button>  
                </td>
            
              </tr>
            @endforeach

              {{-- modal konfirmasi hapus --}}
              @foreach ($routes as $route)
              <div class="modal fade" id="HapusModal-{{ $route->id }}" tabindex="-1" aria-labelledby="HapusModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" action="{{ route('rute.destroy',$route->id) }}">
                      @csrf
                      @method('DELETE')
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
              @endforeach

              @foreach ($routes as $route)
              {{-- modal update --}}
              <div class="modal fade" id="editModal-{{ $route->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" action="{{route('rute.update', $route->id)}}">
                      @csrf
                      @method('PUT')
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Update Rute</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="pertanyaan">Name</label>
                          <input type="text" class="form-control" id="pertanyaan" name="name" value="{{ $route->name }}" required>
                        
                        </div>
                        <div class="form-group">
                          <label for="pertanyaan">Order</label>
                          <input type="text" class="form-control" id="pertanyaan" name="order" value="{{ $route->order }}" required>
                        
                        </div>
                        <div class="form-group">
                            <label for="pertanyaan">Time To Next Stop(minutes)</label>
                            <input type="text" class="form-control" id="pertanyaan" name="time_to_next_stop" value="{{ $route->time_to_next_stop }}" required>
                          
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
              @endforeach
        
          </tbody>
          
        </table>
      </div>
    </div>

</div>
