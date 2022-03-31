<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('category_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/computers*") ? "menu-open" : "" }} {{ request()->is("admin/phones*") ? "menu-open" : "" }} {{ request()->is("admin/tablets*") ? "menu-open" : "" }} {{ request()->is("admin/laptops*") ? "menu-open" : "" }} {{ request()->is("admin/producthistories*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-align-justify">

                            </i>
                            <p>
                                {{ trans('cruds.category.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('computer_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.computers.index") }}" class="nav-link {{ request()->is("admin/computers") || request()->is("admin/computers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-desktop">

                                        </i>
                                        <p>
                                            {{ trans('cruds.computer.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('phone_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.phones.index") }}" class="nav-link {{ request()->is("admin/phones") || request()->is("admin/phones/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-mobile-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.phone.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tablet_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tablets.index") }}" class="nav-link {{ request()->is("admin/tablets") || request()->is("admin/tablets/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-tablet">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tablet.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('laptop_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.laptops.index") }}" class="nav-link {{ request()->is("admin/laptops") || request()->is("admin/laptops/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-laptop">

                                        </i>
                                        <p>
                                            {{ trans('cruds.laptop.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('producthistory_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.producthistories.index") }}" class="nav-link {{ request()->is("admin/producthistories") || request()->is("admin/producthistories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-product-hunt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.producthistory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('manufacturer_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/item-manufacturers*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.manufacturer.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('item_manufacturer_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.item-manufacturers.index") }}" class="nav-link {{ request()->is("admin/item-manufacturers") || request()->is("admin/item-manufacturers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-building">

                                        </i>
                                        <p>
                                            {{ trans('cruds.itemManufacturer.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>