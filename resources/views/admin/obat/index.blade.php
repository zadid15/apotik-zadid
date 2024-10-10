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
                                <a href="{{ route('obat.create') }}" class="btn btn-primary float-right"><i
                                        class="fas fa-plus"></i>Tambah</a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Obat</th>
                                            <th>Expired</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Stok</th>
                                            <th>ID Supplier</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($obats as $obat)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $obat->nama }}</td>
                                                <td>{{ $obat->expired }}</td>
                                                <td>{{ $obat->harga_beli }}</td>
                                                <td>{{ $obat->harga_jual }}</td>
                                                <td>{{ $obat->stok }}</td>
                                                <td>{{ $obat->id_supplier }}</td>
                                                <td>
                                                    <form action="{{ route('obat.destroy', $obat->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fas fa-trash"></i></button>
                                                        <a href="{{ route('obat.edit', $obat->id) }}"
                                                            class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection