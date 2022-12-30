@extends('partials.template')

@section('content')
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark d-flex flex-row-reverse px-3">
        <form action="{{ url('/logout') }}" method="post" class="">
            @csrf
            <button class="btn btn-danger w-100" type="submit">LOGOUT</button>
        </form>
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
            <nav class="mt-4">
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
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h1 class="m-0">CRUD Produk</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-2">
                        <a class="btn btn-primary w-100" href="{{ url('/produk/create') }}">Tambah Produk</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 600px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>Diskon</th>
                                            <th>Jenis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($produk as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->index+1 }}</td>
                                            <td>{{ $item['name'] }}</td>
                                            <td class="text-center">{{ $item['stok'] }}</td>
                                            <td class="text-center">{{ $item['harga'] }}</td>
                                            <td class="text-center">{{ $item['discount'] }}</td>
                                            <td class="text-center">{{ $item['jenis'] }}</td>
                                            <td class="text-center" class="d-flex">
                                                {{-- <a class="border-0 bg-primary rounded p-2" href=""><i
                                                        class="fa-solid fa-circle-info"></i></a> --}}
                                                <a href="{{ url('/produk/'. $item['id'] .'/edit') }}" class="border-0 bg-warning rounded p-2" href=""><i
                                                        class="fa-solid fa-edit"></i></a>
                                                <a href="{{ url('/produk/'. $item['id']) }}" class="border-0 bg-danger rounded p-2" href=""><i
                                                        class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
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