@extends('template.template')
@section('content')

<!-- Popup tambah pertanyaan -->
<form action="{{ route('golf_cart.store') }}" method="POST">
  @method('POST')
  @csrf
  <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">TAMBAH Golf Cart</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="">
                <table class="table">
                  <tr>
                    <td>
                      Nama
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
                      Max Seat
                      <div class="input-group input-group-sm mx-auto my-1">
                        <input type="number" id='pertanyaan' name='max_seat' class="form-control @error('pertanyaan') is-invalid @enderror" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
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
        <h2 class="p-2">KELOLA GOLF CART</h2>
      </div>
    </div>

    <!-- Button Tambah Pertanyaan -->
    <div class="row">
      <div class="d-flex mt-4 justify-content-end" > 
          <button type="button" class="btn btn-success justify-content-center py-2 rounded-3 btn-font" style="color:white" data-toggle="modal" data-target="#detailModal">
            <span class="rounded-3" style="color:white"><i class="fa fa-plus mx-2"></i></span>Tambah Golf Cart
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
              <th class="col-5 p-3 col-sm-1 div-title-admin" style="font-size:18px">Name</th>
              <th class="col-4 p-3 col-sm-1 div-title-admin" style="font-size:18px">Max Seat</th>
              <th class="col-3 p-3 col-sm-1 div-title-admin" style="font-size:18px">Aksi</th>
            </tr>
          </thead>

          <tbody style="font-size:14px">
            
            {{-- @forelse($pertanyaan as $pertanyaan) --}}
            @foreach ($carts as $cart)
              <tr class="shadow-sm" style="background-color:white">

                <!-- Isi Nama-->
                <td class="p-3 fw-bold">
                  <div class="input-group input-group-sm my-lg-1 col-sm-12 justify-content-center">
                      {{ $cart->name }}
                  </div>
                </td>

                <!-- Isi Max Seat-->
                <td class="p-3 fw-bold">
                  <div class="input-group input-group-sm my-lg-1 col-sm-12 justify-content-center">
                      {{ $cart->max_seat }}
                  </div>
                </td>
              
                <!-- Button Edit dan Hapus pertanyaan -->
                <td class="p-lg-3 p-sm-3 text-center">
                  <button type="button" data-toggle="modal" data-target="#editModal-{{ $cart->id }}" class="btn btn-primary col-lg-8 mx-lg-2 my-2 rounded-3">
                    <i class="fa fa-pencil" style="font-size: 20px"></i>        
                  </button>
                  <button type="button" data-toggle="modal" data-target="#HapusModal-{{ $cart->id }}" class="btn btn-danger col-lg-8 mx-lg-2 my-2 rounded-3" >
                    <i class="fa fa-trash" style="font-size: 20px"></i>
                  </button>  
                </td>
            
              </tr>

              {{-- modal konfirmasi hapus --}}
              <div class="modal fade" id="HapusModal-{{ $cart->id }}" tabindex="-1" aria-labelledby="HapusModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" action="{{ route('golf_cart.destroy', $cart->id)}}">
                      @csrf
                      @method('DELETE')
                      <div class="modal-header">
                        <h5 class="modal-title" id="HapusModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Apakah anda yakin ingin menghapus golf cart {{ $cart->name }}?
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
              <div class="modal fade" id="editModal-{{ $cart->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" action="{{ route('golf_cart.update', $cart->id)}}">
                      @csrf
                      @method('PUT')
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Update Golf Cart</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="pertanyaan">Name</label>
                          <input type="text" class="form-control" id="pertanyaan" name="name" value="{{ $cart->name }}" required>
                        </div>
                        <div class="form-group">
                          <label for="pertanyaan">Max Seat</label>
                          <input type="number" class="form-control" id="pertanyaan" name="max_seat" value="{{ $cart->max_seat }}" required>
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
            
            {{-- @empty
              <p>tidak ada record</p>
            @endforelse  --}}

          </tbody>
          
        </table>
      </div>
    </div>

</div>