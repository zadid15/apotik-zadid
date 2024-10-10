@extends('admin.template.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $menu }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ $subMenu }}</a></li>
                            <li class="breadcrumb-item active">{{ $menu }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-2">Data {{ $menu }}</h3>
                                <a href="{{ route('supplier.index') }}" class="btn btn-warning float-right">Kembali</a>
                            </div>
                            <div class="card-body">
                                <form method="post" id="form-supplier">
                                    <label for="">Perusahaan</label>
                                    <input type="text" class="form-control mb-3" name="perusahaan" id="perusahaan">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control mb-3" name="alamat" id="alamat">
                                    <label for="">Telp</label>
                                    <input type="text" class="form-control mb-3" name="telepon" id="telepon">
                                    <button type="submit" class="btn btn-primary">Buat !</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#form-supplier').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "{{ route('supplier.store') }}",
                    data: $(this).serialize() + "&_token={{ csrf_token() }}",
                    success: function(response) {
                        console.log(response);
                        alert(response
                        .message); // Mengakses pesan dari response yang dikembalikan oleh server
                        window.location.href = "{{ route('supplier.index') }}";
                    },
                    error: function(response) {
                        alert(response.message); // Mengakses pesan error dari response
                    }
                });
            });
        });
    </script>
@endsection
