@extends('crud-app.master')

@section('title', 'Edit Data Pegawai')

@section('content')
<!-- Content Wrapper. Contains page content -->

<!-- < div class = "content-wrapper" >
Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Data Pegawai</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
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
                        <h3 class="card-title">Edit Data Pegawai</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form
                        enctype="multipart/form-data"
                        action="{{ route('crud-app.updatepegawai', $datapegawai->id) }}"
                        method="post">
                        @csrf @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_pegawai">Nama Pegawai:</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama_pegawai"
                                    name="nama_pegawai"
                                    value="{{ $datapegawai->nama_pegawai }}">
                                    <label for="nik">NIK Pegawai :</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nik"
                                        name="nik"
                                        value="{{ $datapegawai->nik }}">
                                        <label for="jns_pegawai">Jenis Pegawai :</label>
                                        <select name="jenis_pegawai_id" id="jenis_pegawai_id" class="form-control">
                                                            @foreach($datajenispegawai as $jenispegawai)
                                                                <option value="{{ $jenispegawai->id }}" {{ $datapegawai->jenis_pegawai_id == $jenispegawai->id ? 'selected' : '' }}>
                                                                    {{ $jenispegawai->jenis_pegawai }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                        <label for="status_pegawai">Status Pegawai :</label>
                                        <select name="status_pegawai_id" id="status_pegawai_id" class="form-control">
                                                            @foreach($datastatuspegawai as $statuspegawai)
                                                                <option value="{{ $statuspegawai->id }}" {{ $datapegawai->status_pegawai_id == $statuspegawai->id ? 'selected' : '' }}>
                                                                    {{ $statuspegawai->status_pegawai }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                        <label for="unit">Unit :</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="unit"
                                            name="unit"
                                            value="{{ $datapegawai->unit }}">
                                            <label for="sub_unit">Sub-Unit :</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="sub_unit"
                                                name="sub_unit"
                                                value="{{ $datapegawai->sub_unit }}">
                                                <label for="pendidikan">Pendidikan :</label>
                                                <select name="pendidikan_id" id="pendidikan_id" class="form-control">
                                                            @foreach($datapendidikan as $pendidikan)
                                                                <option value="{{ $pendidikan->id }}" {{ $datapegawai->pendidikan_id == $pendidikan->id ? 'selected' : '' }}>
                                                                    {{ $pendidikan->pendidikan }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                <label for="tgl_lahir">Tanggal Lahir :</label>
                                                <input
                                                    type="date"
                                                    class="form-control"
                                                    id="tgl_lahir"
                                                    name="tgl_lahir"
                                                    value="{{ $datapegawai->tgl_lahir }}">
                                                    <label for="tmpt_lahir">Kota Kelahiran :</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="tmpt_lahir"
                                                        name="tpt_lahir"
                                                        value="{{ $datapegawai->tpt_lahir }}">
                                                        <label for="jns_kel">Jenis Kelamin :</label>
                                                        <select name="jenkel_id" id="jenkel_id" class="form-control">
                                                            @foreach($datajeniskelamin as $jeniskelamin)
                                                                <option value="{{ $jeniskelamin->id }}" {{ $datapegawai->jenkel_id == $jeniskelamin->id ? 'selected' : '' }}>
                                                                    {{ $jeniskelamin->jenis_kelamin }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <label for="agama_id">Agama</label>
                                                        <select name="agama_id" id="agama_id" class="form-control">
                                                            @foreach($dataagama as $agama)
                                                                <option value="{{ $agama->id }}" {{ $datapegawai->agama_id == $agama->id ? 'selected' : '' }}>
                                                                    {{ $agama->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="form-group">
                                                            <label for="gambar_sebelum">Gambar Sebelum Diedit</label>
                                                            <img src="{{ url('upload/' . $datapegawai->gambar) }}" alt="Gambar Sebelum Diedit" width="100">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="gambar_baru">Gambar Baru</label>
                                                            <input type="file" name="gambar" id="gambar" class="form-control">
                                                        </div>
                                                        @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->

                                            </form>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!--/.col (right) -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->
                    </div>
                </div>
                    <!-- /.content-wrapper -->
                    @endsection @push('aditional-css')
                    <link rel="stylesheet" href="path-to-aditional-css.css">
                        <!-- Google Font: Source Sans Pro -->
                        <link
                            rel="stylesheet"
                            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
                            <!-- Font Awesome -->
                            <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
                                <!-- Theme style -->
                                <link rel="stylesheet" href="dist/css/adminlte.min.css">
                                    @endpush @push('aditional-js')
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