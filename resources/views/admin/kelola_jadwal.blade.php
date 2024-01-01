@extends('template.template')
@section('content')

<!-- Popup tambah pertanyaan -->
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
<form action="{{ route('jadwal.store') }}" method="POST">
  @method('POST')
  @csrf
  <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Tambah Jadwal</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                  <tr>
                    <td>
                      Time Start
                      <div class="input-group input-group-sm mx-auto my-1">
                        <input type="time" id='pertanyaan' name='time_start' class="form-control @error('pertanyaan') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Time End
                      <div class="input-group input-group-sm mx-auto my-1">
                        <input type="time" id='pertanyaan' name='time_end' class="form-control @error('pertanyaan') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Route Start
                          <div class="form-group">
                            <select class="form-control" name="route_start" id="exampleFormControlSelect1">
                              @foreach ($routes as $route)
                              <option value="{{ $route->id }}">{{ $route->name }}</option>
                              @endforeach
                            </select>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                          Golf Cart ID
                          <div class="form-group">
                            <select class="form-control" name="golf_cart_id" id="exampleFormControlSelect1">
                              @foreach ($golf_carts as $golf_cart)
                              <option value="{{ $golf_cart->id }}">{{ $golf_cart->name }}</option>
                              @endforeach
                            </select>
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
              <th class="col-2 p-3 col-sm-1 div-title-admin" style="font-size:18px">Time Start</th>
              <th class="col-3 p-3 col-sm-1 div-title-admin" style="font-size:18px">Time End</th>
              <th class="col-2 p-3 col-sm-1 div-title-admin" style="font-size:18px">Golf Cart Id</th>
              <th class="col-2 p-3 col-sm-1 div-title-admin" style="font-size:18px">Aksi</th>
            </tr>
          </thead>

          <tbody style="font-size:14px">
            @foreach ($schedules_time as $schedule_time)
              <tr class="shadow-sm" style="background-color:white">

                <!-- Isi time start-->
                <td class="p-3">
                  <div class="input-group input-group-sm my-lg-1 col-sm-12 justify-content-center">
                    
                    <div class="col-12 text-center" style="background-color:white; font-size:15px; font-weight:500">
                      {{ \Carbon\Carbon::parse($schedule_time->start)->format('H:i') }}
                    </div>
                  
                </div>
                </td>       
                
                <!-- Isi time end-->
                <td class="p-3 fw-bold">
                  <div class="input-group input-group-sm my-lg-1 col-sm-12 justify-content-center">
                    
                      <div class="col-12 text-center" style="background-color:white; font-size:15px; font-weight:500">
                        {{ \Carbon\Carbon::parse($schedule_time->end)->format('H:i') }}
                      </div>
                    
                  </div>
                </td>

                <!-- Isi golf  cart id-->
                <td class="p-3 fw-bold">
                  <div class="input-group input-group-sm my-lg-1 col-sm-12 justify-content-center">
                    
                      <div class="col-12 text-center" style="background-color:white; font-size:15px; font-weight:500">
                        {{ $schedule_time->golf_cart->name }}
                      </div>
                                      
                  </div>
                </td>
              
                <!-- Button Edit dan Hapus pertanyaan -->
                <td class="p-lg-3 p-sm-3 text-center">
                  <button type="button" data-toggle="modal" data-target="#editModal-{{ $schedule_time->id }}" class="btn btn-primary col-lg-10 col-sm-12 mx-lg-2 my-2 rounded-3">
                    <i class="fa fa-pencil" style="font-size: 20px"></i>        
                  </button>
                  <button type="button" data-toggle="modal" data-target="#HapusModal-{{ $schedule_time->id }}" class="btn btn-danger col-lg-10 col-sm-12 mx-lg-2 my-2 rounded-3" >
                    <i class="fa fa-trash" style="font-size: 20px"></i>
                  </button>  
                </td>
            
              </tr>
            @endforeach

              {{-- modal konfirmasi hapus --}}
              @foreach ($schedules_time as $schedule_time)
              <div class="modal fade" id="HapusModal-{{ $schedule_time->id }}" tabindex="-1" aria-labelledby="HapusModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" action="{{route('jadwal.destroy',$schedule_time->id)}}">
                      @csrf
                      @method('delete')
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

              {{-- modal update --}}
              @foreach ($schedules_time as $schedule_time)
              <div class="modal fade" id="editModal-{{ $schedule_time->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" action="{{route('jadwal.update', $schedule_time->id)}}">
                      @csrf
                      @method('put')
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Update Jadwal</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="pertanyaan">Time Start</label>
                          <input type="time" class="form-control" id="pertanyaan" name="time_start" value="{{ \Carbon\Carbon::parse($schedule_time->start)->format('H:i') }}" required>
                        
                        </div>
                        <div class="form-group">
                          <label for="pertanyaan">Time End</label>
                          <input type="time" class="form-control" id="pertanyaan" name="time_end" value="{{ \Carbon\Carbon::parse($schedule_time->end)->format('H:i') }}" required>
                        
                        </div>
                          <div class="form-group">
                            <label for="pertanyaan">Golf Cart ID</label>
                            <select class="form-control" name="golf_cart_id" id="exampleFormControlSelect1">
                              @foreach ($golf_carts as $golf_cart)
                              <option value="{{ $golf_cart->id }}" {{ ($golf_cart->id == $schedule_time->golf_cart_id) ? "selected" : "" }}>{{ $golf_cart->name }}</option>
                              @endforeach
                            </select>
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
