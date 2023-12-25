@extends('template.template')
@section('content')


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


    <!-- Tabel -->
    <div class="row">
      <div class="row mt-3">
        <div class="col-lg-8 offset-lg-2 col-sm-8 offset-sm-2 text-center div-title-admin" style="font-weight: 900">
          <h4 class="p-2">Sopir Tidak Aktif</h4>
        </div>
      </div>
      <div class="col-12 col-sm-12">
        <table class="table-responsive mt-4 mb-5 table-hover rounded-corners">
          <thead class="shadow-sm" style="background-color:white">
            <!-- Judul Tabel -->
            <tr class="rounded-3 text-center p-3">
              <th class="col-5 p-3 col-sm-5 div-title-admin" style="font-size:18px">Name</th>
              <th class="col-3 p-3 col-sm-3 div-title-admin" style="font-size:18px">Email</th>
              <th class="col-2 p-3 col-sm-2 div-title-admin" style="font-size:18px">Phone</th>
              <th class="col-2 p-3 col-sm-2 div-title-admin" style="font-size:18px">Aksi</th>
            </tr>
          </thead>

          <tbody style="font-size:14px">
            
            {{-- @forelse($pertanyaan as $pertanyaan) --}}
            @foreach ($sopirinaktifs as $sopirinaktif)
                
              <tr class="shadow-sm" style="background-color:white">

                <!-- Isi Pertanyaan -->
                <td class="p-3">
                  {{$sopirinaktif->name}}
                </td>       
                
                <td class="p-3">
                  {{$sopirinaktif->email}}
                </td>  

                <td class="p-3">
                  {{$sopirinaktif->phone}}
                </td>  
              
                <!-- Button Edit dan Hapus pertanyaan -->
                <td class="p-lg-3 p-sm-3 text-center">
                  <button type="button"  data-toggle="modal" data-target="#AktifModal-{{$sopirinaktif->id}}" class="btn btn-success col-lg-10 col-sm-12 mx-lg-2 my-2 rounded-3">
                    <i class="fa fa-check" style="font-size: 20px"></i>        
                  </button>
                  <button type="button" data-toggle="modal" data-target="#HapusModal-{{$sopirinaktif->id}}" class="btn btn-danger col-lg-10 col-sm-12 mx-lg-2 my-2 rounded-3" >
                    <i class="fa fa-trash" style="font-size: 20px"></i>
                  </button>  
                </td>
            
              </tr>

              {{-- modal konfirmasi hapus --}}
              <div class="modal fade" id="HapusModal-{{$sopirinaktif->id}}"" tabindex="-1" aria-labelledby="HapusModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" action="{{route('sopir.destroy', $sopirinaktif->id)}}">
                      @csrf
                      @method('delete')
                      <div class="modal-header">
                        <h5 class="modal-title" id="HapusModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                          {{-- <span aria-hidden="true">&times;</span> --}}
                        </button>
                      </div>
                      <div class="modal-body">
                        Apakah anda yakin ingin menghapus sopir {{$sopirinaktif->name}}?
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
              <div class="modal fade" id="AktifModal-{{$sopirinaktif->id}}"" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" action="{{route('sopir.validasi', $sopirinaktif->id)}}">
                      @csrf
                      @method('put')
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Update Sopir</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                          {{-- <span aria-hidden="true">&times;</span> --}}
                        </button>
                      </div>
                      <div class="modal-body">
                        Apakah anda yakin ingin memvalidasi sopir {{$sopirinaktif->name}}?
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ya</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                    </form>             
                  </div>
                </div>
              </div>
            @endforeach
            {{-- @empty
              <p>tidak ada record</p>
            @endforelse  --}}

          </tbody>

          {{---------------------- TABLE SUPIR UNAKTIFFFF ---------------------}}
        </table>
        <div class="row mt-3">
            <div class="col-lg-8 offset-lg-2 col-sm-8 offset-sm-2 text-center div-title-admin" style="font-weight: 900">
              <h4 class="p-2">Sopir Aktif</h4>
            </div>
          </div>
      </div>
      <div class="col-12 col-sm-12">
        <table class="table-responsive table-hover rounded-corners">
          <thead class="shadow-sm" style="background-color:white">
            <!-- Judul Tabel -->
            <tr class="rounded-3 text-center p-3">
              <th class="col-5 p-3 col-sm-5 div-title-admin" style="font-size:18px">Pertanyaan</th>
              <th class="col-3 p-3 col-sm-3 div-title-admin" style="font-size:18px">Jawaban</th>
              <th class="col-2 p-3 col-sm-2 div-title-admin" style="font-size:18px">Skor</th>
              <th class="col-2 p-3 col-sm-2 div-title-admin" style="font-size:18px">Aksi</th>
            </tr>
          </thead>

          <tbody style="font-size:14px">
            @foreach ($sopiraktifs as $sopiraktif)
            {{-- @forelse($pertanyaan as $pertanyaan) --}}
              <tr class="shadow-sm" style="background-color:white">

                <!-- Isi Pertanyaan -->
                <td class="p-3">
                  {{$sopiraktif->name}}
                </td>       
                
                <td class="p-3">
                  {{$sopiraktif->email}}
                </td>  

                <td class="p-3">
                  {{$sopiraktif->phone}}
                </td>
              
                <!-- Button Edit dan Hapus pertanyaan -->
                <td class="p-lg-3 p-sm-3 text-center">
                  <button type="button" data-toggle="modal" data-target="#NonaktifModal-{{$sopiraktif->id}}" class="btn btn-danger col-lg-10 col-sm-12 mx-lg-4 my-2 rounded-3" >
                    <i class="fa fa-trash" style="font-size: 20px"></i>
                  </button>  
                </td>
            
              </tr>

              {{-- modal konfirmasi hapus --}}
              <div class="modal fade" id="NonaktifModal-{{$sopiraktif->id}}" tabindex="-1" aria-labelledby="HapusModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" action="{{route('sopir.nonaktif', $sopiraktif->id)}}">
                      @csrf
                      @method('put')
                      <div class="modal-header">
                        <h5 class="modal-title" id="HapusModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                          {{-- <span aria-hidden="true">&times;</span> --}}
                        </button>
                      </div>
                      <div class="modal-body">
                        Apakah anda yakin ingin menonaktifkan sopir {{$sopiraktif->name}}?
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
                        <h5 class="modal-title" id="editModalLabel">Update Sopir</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                          {{-- <span aria-hidden="true">&times;</span> --}}
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="pertanyaan">Pertanyaan</label>
                          <input type="text" value="" class="form-control" id="pertanyaan" name="pertanyaan" required>
                          {{-- @if($errors->has('pertanyaan'))
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('pertanyaan') }}</strong>
                            </div>
                          @endif --}}
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