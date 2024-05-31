<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
{{--            <div class="sidebar-brand-icon rotate-n-15">--}}
{{--                <i class="fas fa-laugh-wink"></i>--}}
{{--            </div>--}}
            <div class="sidebar-brand-text mx-3">Admin Panel</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Apps
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('backend.category.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Categories</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('product.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Products</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Users</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('order.list') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Orders</span></a>
        </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('invoice.list') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Invoice</span></a>
    </li>




{{--    <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"--}}
{{--               aria-expanded="true" aria-controls="collapseTwo">--}}
{{--                <i class="fas fa-fw fa-cog"></i>--}}
{{--                <span>Components</span>--}}
{{--            </a>--}}
{{--            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                    <h6 class="collapse-header">Custom Components:</h6>--}}
{{--                    <a class="collapse-item" href="buttons.html">Buttons</a>--}}
{{--                    <a class="collapse-item" href="cards.html">Cards</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}

    </ul>
