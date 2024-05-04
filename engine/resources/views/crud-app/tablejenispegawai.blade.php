@extends('crud-app.master')

@section('title', 'Data Jenis Pegawai')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Jenis Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
              <li class="breadcrumb-item active">Daftar Jenis Pegawai</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Jenis Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="{{ url('/formjenispegawai') }}" class="btn btn-primary mb-3">Tambah Jenis Pegawai</a>
              <table class="table table-bordered">
                <thead>
                  <?php $no=1; ?>
                  <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Jenis Pegawai</th>
                    <th>Tools</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($datajenispegawai as $jenispegawai)
                  <tr>
                    <td>{{ $no; }}</td>
                    <td>{{ $jenispegawai->id }}</td>
                    <td>{{ $jenispegawai->jenis_pegawai }}</td>
                    <td>
                      <a href="{{ route('crud-app.editjenispegawai', $jenispegawai->id) }}" class="btn btn-warning">Edit</a>
                      <form 
                      onsubmit="return confirm('Apakah anda yakin?')" 
                      action="{{ route('crud-app.destroyjenispegawai', $jenispegawai->id) }}" 
                      method="post"
                      style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </form>
                    </td>
                  </tr>
                  <?php $no++; ?>
                  @endforeach
                </tbody>
              </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
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
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
@endpush