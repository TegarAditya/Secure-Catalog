@extends('partials.template')

@section('content')
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark" style="height: 58px;">
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="{{  url('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ url('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/produk') }}" class="nav-link">
                            <p>CRUD Produk</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary mt-4">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Produk</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('/produk/create') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama Produk</label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Masukkan nama produk" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="stok">Stok Produk</label>
                                        <input type="number" class="form-control" id="stok" name="stok">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Produk</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" data-select2-id="1" tabindex="-1"
                                            aria-hidden="true" name="jenis">
                                            <option selected="selected" data-select2-id="3" value="makanan">Makanan</option>
                                            <option value="minuman">Minuman</option>
                                
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Produk</label>
                                        <textarea class="form-control" rows="3"
                                            placeholder="Masukkan deskripsi produk" name="deskripsi"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga Produk</label>
                                        <input type="number" class="form-control" id="harga" name="harga">
                                    </div>
                                    <div class="form-group">
                                        <label for="discount">Diskon Produk</label>
                                        <input type="number" class="form-control" id="discount" name="discount">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    name="gambar">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary w-25">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

</div>
@endsection