<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper"><a href="{{ route('admin.dashboard') }}"><img class="blur-up lazyloaded" src="{{ asset('assets/back-end/images/dashboard/multikart-logo.png')}}" alt=""></a></div>
    </div>
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle lazyloaded blur-up" src="{{ asset('assets/back-end/images/dashboard/man.png')}}" alt="#">
            </div>
            <h6 class="mt-3 f-14">JOHN</h6>
            <p>general manager.</p>
        </div>
        <ul class="sidebar-menu">
        <li><a class="sidebar-header" href="{{ route('admin.dashboard') }}"><i data-feather="home"></i><span>Dashboard</span></a></li>
            @can('isAdmin')
            <li>
                <a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Products</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('admin.category.index') }}"><i class="fa fa-circle"></i>Category</a></li>
                    <li><a href="{{ route('admin.category.create') }}"><i class="fa fa-circle"></i>Add Category</a></li>
                    <li><a href="{{route('products.index')}}"><i class="fa fa-circle"></i>Product List</a></li>
                    <li><a href="{{route('products.create')}}"><i class="fa fa-circle"></i>Add Product</a></li>
                </ul>
            </li>
            <li>
                <a class="sidebar-header" href="{{route('admin.orderarea.index')}}"><i data-feather="box"></i> <span>Order Area</span></a>
            </li>
            @endcan
            <li><a class="sidebar-header" href="#"><i data-feather="dollar-sign"></i><span>Sales</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="order.html"><i class="fa fa-circle"></i>Orders</a></li>
                    <li><a href="transactions.html"><i class="fa fa-circle"></i>Transactions</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="#"><i data-feather="clipboard"></i><span>Pages</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="pages-list.html"><i class="fa fa-circle"></i>List Page</a></li>
                    <li><a href="page-create.html"><i class="fa fa-circle"></i>Create Page</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="media.html"><i data-feather="camera"></i><span>Media</span></a></li>
            <li><a class="sidebar-header" href="#"><i data-feather="align-left"></i><span>Menus</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="menu-list.html"><i class="fa fa-circle"></i>Menu Lists</a></li>
                    <li><a href="create-menu.html"><i class="fa fa-circle"></i>Create Menu</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="#"><i data-feather="user-plus"></i><span>Users</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="user-list.html"><i class="fa fa-circle"></i>User List</a></li>
                    <li><a href="create-user.html"><i class="fa fa-circle"></i>Create User</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="reports.html"><i data-feather="bar-chart"></i><span>Reports</span></a></li>
            <li><a class="sidebar-header" href="#"><i data-feather="settings" ></i><span>Settings</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="profile.html"><i class="fa fa-circle"></i>Profile</a></li>
                </ul>
            </li>
        {{-- <li><a class="sidebar-header" href="{{ route('oauth.redirect') }}"><i data-feather="archive"></i><span>Authorized</span></a>
            </li> --}}
<li><a class="sidebar-header" href="invoice.html"><i data-feather="archive"></i><span>Invoice</span></a>
            </li>
            <li><a class="sidebar-header" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i data-feather="log-out"></i><span>Logout</span></a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>
</div>