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
                                <a href="{{ route('obat.index') }}" class="btn btn-warning float-right">Kembali</a>
                            </div>
                            <div class="card-body">
                                <form method="post" id="form-obat">
                                    <label for="nama">Nama Obat</label>
                                    <input type="text" class="form-control mb-3" name="nama" id="nama" required>
                                
                                    <label for="expired">Tanggal Kedaluwarsa</label>
                                    <input type="date" class="form-control mb-3" name="expired" id="expired" required>
                                
                                    <label for="harga_beli">Harga Beli</label>
                                    <input type="number" class="form-control mb-3" name="harga_beli" id="harga_beli" required>
                                
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="number" class="form-control mb-3" name="harga_jual" id="harga_jual" required>
                                
                                    <label for="stok">Stok</label>
                                    <input type="number" class="form-control mb-3" name="stok" id="stok" required>
                                
                                    <label for="id_supplier">Supplier</label>
                                    <select name="id_supplier" id="id_supplier" class="form-control mb-3" required>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->perusahaan }}</option>
                                        @endforeach
                                    </select>
                                
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
            $('#form-obat').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "{{ route('obat.store') }}",
                    data: $(this).serialize() + "&_token={{ csrf_token() }}",
                    success: function(response) {
                        console.log(response);
                        alert(response
                        .message);
                        window.location.href = "{{ route('obat.index') }}";
                    },
                    error: function(response) {
                        alert(response.message);
                    }
                });
            });
        });
    </script>
@endsection
