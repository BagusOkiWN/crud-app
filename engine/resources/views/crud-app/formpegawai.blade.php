@extends('crud-app.master')

@section('title', 'Form Pegawai')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Tambah Data Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
              <li class="breadcrumb-item active">Form Tambah Data Pegawai</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data" id="quickForm" novalidate="novalidate" method="POST"  action="{{ url('prosesaddpegawai') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pegawai</label>
                    <input type="text" class="form-control" id="pegawai" name="nama_pegawai" placeholder="Masukkan Nama">
                    @error('nama_pegawai')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK">
                    @error('nik')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="jenis_pegawai">Jenis Pegawai</label>
                    <select class="form-control" id="jenis_pegawai" name="jenis_pegawai_id">
                    <option value="" disabled selected hidden>Pilih Jenis Pegawai</option>
                        @foreach($datajenispegawai as $jnspgw)
                            <option value="{{$jnspgw->id}}">{{$jnspgw->jenis_pegawai}}</option>
                        @endforeach
                    </select>
                    @error('jenis_pegawai_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="status_pegawai">Status Pegawai</label>
                    <select class="form-control" id="status_pegawai" name="status_pegawai_id">
                    <option value="" disabled selected hidden>Pilih Status Pegawai</option>
                        @foreach($datastatuspegawai as $stspgw)
                            <option value="{{$stspgw->id}}">{{$stspgw->status_pegawai}}</option>
                        @endforeach
                    </select>
                    @error('status_pegawai_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Unit</label>
                    <input type="text" class="form-control" id="unit" name="unit" placeholder="Masukkan Unit">
                    @error('unit')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sub.Unit</label>
                    <input type="text" class="form-control" id="sub_unit" name="sub_unit" placeholder="Masukkan Sub.Unit">
                    @error('sub_unit')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="pendidikan">Pendidikan</label>
                    <select class="form-control" id="pendidikan" name="pendidikan_id">
                          <option value="" disabled selected hidden>Pilih Pendidikan</option>
                          @foreach($datapendidikan as $pendidikan)
                          <option value="{{$pendidikan->id}}">{{$pendidikan->pendidikan}}</option>
                          @endforeach
                    </select>
                    @error('pendidikan_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir">
                    @error('tgl_lahir')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tpt_lahir" name="tpt_lahir" placeholder="Masukkan Tempat Lahir">
                    @error('tpt_lahir')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenkel_id">
                    <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                      @foreach($datajeniskelamin as $jeniskelamin)
                        <option value="{{$jeniskelamin->id}}">{{$jeniskelamin->jenis_kelamin}}</option>
                      @endforeach
                    </select>
                    @error('jenkel_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="agama">Agama</label>
                    <select class="form-control" id="agama" name="agama_id">
                    <option value="" disabled selected hidden>Pilih Agama</option>
                      @foreach($dataagama as $agama)
                        <option value="{{$agama->id}}">{{$agama->nama}}</option>
                      @endforeach
                    </select>
                    @error('agama_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                      <label for="gambar">Upload KTP</label>
                      <input type="file" class="form-control" id="gambar" name="gambar">
                      @error('gambar')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@push('aditional-css')
    <link rel="stylesheet" href="path-to-aditional-css.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
@endpush

@push('aditional-js')
    <script src="path-to-aditional-script.js"></script>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
    $(function () {
    bsCustomFileInput.init();
    });
    </script>
@endpush