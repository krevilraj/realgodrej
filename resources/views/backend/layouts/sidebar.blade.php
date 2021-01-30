@php($route = Route::currentRouteName())
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="/" class="brand-link">
        <img src="{{ url('storage') . '/' . getConfiguration('site_logo') }}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{getConfiguration('site_title')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="/dashboard/index" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>


                <li class="nav-item has-treeview {{ ($route == 'dashboard.slideshows.index' || $route == 'dashboard.slideshows.create' || $route == 'dashboard.slideshows.edit') ? 'menu-open': null }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Slideshows
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.slideshows.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All
                                    Slideshows</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.slideshows.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview {{ ($route == 'dashboard.product.index' || $route == 'dashboard.product.create' || $route == 'dashboard.product.edit') ? 'menu-open': null }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="{{route('dashboard.product.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dashboard.product.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview {{ ($route == 'dashboard.categories.index' || $route == 'dashboard.categories.create' || $route == 'dashboard.categories.edit') ? 'menu-open': null }}">
                    <a href="{{route('dashboard.categories.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>



                <li class="nav-item has-treeview {{ ($route == 'dashboard.page.index' || $route == 'dashboard.page.create' || $route == 'dashboard.page.edit')  ? 'menu-open': null }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            Page
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.page.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Pages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.page.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Page</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview {{ ($route == 'dashboard.career.index' || $route == 'dashboard.career.create' || $route == 'dashboard.career.edit')  ? 'menu-open': null }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            Career
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.career.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Careers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.career.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Career Vacancies</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item has-treeview {{ ($route == 'dashboard.team.index' || $route == 'dashboard.team.create' || $route == 'dashboard.team.edit')  ? 'menu-open': null }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Team Member
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.team.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Team member</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.team.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Team member</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview {{ ($route == 'dashboard.settings'? 'menu-open': null) }}">
                    <a href="{{ route('dashboard.settings') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview {{ ($route == 'dashboard.message.index'? 'menu-open': null) }}">
                    <a href="{{ route('dashboard.message.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Message
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview {{ ($route == 'dashboard.unit.index'? 'menu-open': null) }}">
                    <a href="{{ route('dashboard.unit.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Business Units
                        </p>
                    </a>
                </li>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
