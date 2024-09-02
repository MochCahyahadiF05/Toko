<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                {{-- <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-boxes-stacked"></i>
                        <p>
                            Product
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('product.index')}}" class="nav-link">
                              <i class="nav-icon fa-solid fa-box"></i>
                                <p>
                                    Semua Product
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('produk.jenis_satuan', 'Kg')}}" class="nav-link">
                              <i class="nav-icon fa-solid fa-box"></i>
                                <p>
                                    Product PerKG
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('produk.jenis_satuan', 'Tabung')}}" class="nav-link">
                              <i class="nav-icon fa-solid fa-box"></i>
                                <p>
                                    Product PerTabung
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="{{route('custemer.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Customer
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('supplier.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Supplier
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-money-bill-transfer"></i>
                        <p>
                            Transaksi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('sales.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Input Transaksi
                                </p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket nav-icon"></i>
                        <p>
                            logout
                        </p>
                    </a>
                    <form action="{{route('logout')}}" method="post" id="logout-form">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
