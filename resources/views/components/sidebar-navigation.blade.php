<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-ricnel sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <img width="50px" src="/logo_2.png" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">The Alps Hotel <sup>KCBLC</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        System Relations
    </div>
    @if (auth()->user()->hasPermissionTo('Read Users'))
        <!-- Users Links-->
        <li class="nav-item {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
            <a class="nav-link {{ request()->routeIs('admin.users*') ? '' : 'collapsed' }}" href="#"
                data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>Users</span>
            </a>
            <div id="collapseUsers" class="collapse {{ request()->routeIs('admin.users*') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Options:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.users.index') ? 'active' : '' }}"
                        href="{{ route('admin.users.index') }}">View Users</a>
                    <a class="collapse-item {{ request()->routeIs('admin.users.create') ? 'active' : '' }}"
                        href="{{ route('admin.users.create') }}">Create a new User</a>
                </div>
            </div>
        </li>
    @endif



    @if (auth()->user()->hasPermissionTo('Read Roles'))
        <!-- Roles Links-->
        <li class="nav-item {{ request()->routeIs('admin.roles*') ? 'active' : '' }}">
            <a class="nav-link {{ request()->routeIs('admin.roles*') ? '' : 'collapsed' }}" href="#"
                data-toggle="collapse" data-target="#collapseRoles" aria-expanded="true" aria-controls="collapseRoles">
                <i class="fas fa-fw fa-hard-hat"></i>
                <span>Roles</span>
            </a>
            <div id="collapseRoles" class="collapse {{ request()->routeIs('admin.roles*') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Options:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.roles.index') ? 'active' : '' }}"
                        href="{{ route('admin.roles.index') }}">View Roles</a>
                    <a class="collapse-item {{ request()->routeIs('admin.roles.create') ? 'active' : '' }}"
                        href="{{ route('admin.roles.create') }}">Create a new Role</a>
                </div>
            </div>
        </li>
    @endif
    @if (auth()->user()->hasPermissionTo('Read Departments'))
        <!-- Departments Links-->
        <li class="nav-item {{ request()->routeIs('admin.departments*') ? 'active' : '' }}">
            <a class="nav-link {{ request()->routeIs('admin.departments*') ? '' : 'collapsed' }}" href="#"
                data-toggle="collapse" data-target="#collapseDepartments" aria-expanded="true"
                aria-controls="collapseDepartments">
                <i class="fas fa-fw fa-cubes"></i>
                <span>Departments</span>
            </a>
            <div id="collapseDepartments" class="collapse {{ request()->routeIs('admin.departments*') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Options:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.departments.index') ? 'active' : '' }}"
                        href="{{ route('admin.departments.index') }}">View Departments</a>
                    <a class="collapse-item {{ request()->routeIs('admin.departments.create') ? 'active' : '' }}"
                        href="{{ route('admin.departments.create') }}">Create a new Department</a>
                </div>
            </div>
        </li>
    @endif
    @if (auth()->user()->hasPermissionTo('Read Suppliers'))
        <!-- Suppliers Links-->
        <li class="nav-item {{ request()->routeIs('admin.suppliers*') ? 'active' : '' }}">
            <a class="nav-link {{ request()->routeIs('admin.suppliers*') ? '' : 'collapsed' }}" href="#"
                data-toggle="collapse" data-target="#collapseSuppliers" aria-expanded="true"
                aria-controls="collapseSuppliers">
                <i class="fas fa-fw fa-truck-loading"></i>
                <span>Suppliers</span>
            </a>
            <div id="collapseSuppliers" class="collapse {{ request()->routeIs('admin.suppliers*') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Options:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.suppliers.index') ? 'active' : '' }}"
                        href="{{ route('admin.suppliers.index') }}">View Suppliers</a>
                    <a class="collapse-item {{ request()->routeIs('admin.suppliers.create') ? 'active' : '' }}"
                        href="{{ route('admin.suppliers.create') }}">Create a new Supplier</a>
                </div>
            </div>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Inventory Management
    </div>
    @if (auth()->user()->hasPermissionTo('Read Unit Types'))
        <!-- Unit Types Links-->
        <li class="nav-item {{ request()->routeIs('admin.unit-types*') ? 'active' : '' }}">
            <a class="nav-link {{ request()->routeIs('admin.unit-types*') ? '' : 'collapsed' }}" href="#"
                data-toggle="collapse" data-target="#collapseUnitTypes" aria-expanded="true"
                aria-controls="collapseUnitTypes">
                <i class="fas fa-fw fa-weight"></i>
                <span>Units Types</span>
            </a>
            <div id="collapseUnitTypes" class="collapse {{ request()->routeIs('admin.unit-types*') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Options:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.unit-types.index') ? 'active' : '' }}"
                        href="{{ route('admin.unit-types.index') }}">View Unit Types</a>
                    <a class="collapse-item {{ request()->routeIs('admin.unit-types.create') ? 'active' : '' }}"
                        href="{{ route('admin.unit-types.create') }}">New Unit Type</a>
                </div>
            </div>
        </li>
    @endif
    @if (auth()->user()->hasPermissionTo('Read Units'))
        <!-- Units Links-->
        <li class="nav-item {{ request()->routeIs('admin.units*') ? 'active' : '' }}">
            <a class="nav-link {{ request()->routeIs('admin.units*') ? '' : 'collapsed' }}" href="#"
                data-toggle="collapse" data-target="#collapseUnits" aria-expanded="true"
                aria-controls="collapseUnits">
                <i class="fas fa-fw fa-balance-scale"></i>
                <span>Measurement Units</span>
            </a>
            <div id="collapseUnits" class="collapse {{ request()->routeIs('admin.units*') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Options:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.units.index') ? 'active' : '' }}"
                        href="{{ route('admin.units.index') }}">View Measurement Units</a>
                    <a class="collapse-item {{ request()->routeIs('admin.units.create') ? 'active' : '' }}"
                        href="{{ route('admin.units.create') }}">New Measurement Unit</a>
                </div>
            </div>
        </li>
    @endif
    @if (auth()->user()->hasPermissionTo('Read Brands'))
        <!-- Brands Links-->
        <li class="nav-item {{ request()->routeIs('admin.brands*') ? 'active' : '' }}">
            <a class="nav-link {{ request()->routeIs('admin.brands*') ? '' : 'collapsed' }}" href="#"
                data-toggle="collapse" data-target="#collapseBrands" aria-expanded="true"
                aria-controls="collapseBrands">
                <i class="fas fa-fw fa-copyright"></i>
                <span>Brands</span>
            </a>
            <div id="collapseBrands" class="collapse {{ request()->routeIs('admin.brands*') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Options:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.brands.index') ? 'active' : '' }}"
                        href="{{ route('admin.brands.index') }}">View Brands</a>
                    <a class="collapse-item {{ request()->routeIs('admin.brands.create') ? 'active' : '' }}"
                        href="{{ route('admin.brands.create') }}">New Brand</a>
                </div>
            </div>
        </li>
    @endif
    @if (auth()->user()->hasPermissionTo('Read Product Categories'))
        <!-- Product Categories Links-->
        <li class="nav-item {{ request()->routeIs('admin.product-categories*') ? 'active' : '' }}">
            <a class="nav-link {{ request()->routeIs('admin.product-categories*') ? '' : 'collapsed' }}"
                href="#" data-toggle="collapse" data-target="#collapseproduct-categories" aria-expanded="true"
                aria-controls="collapseproduct-categories">
                <i class="fas fa-fw fa-layer-group"></i>
                <span>Product Categories</span>
            </a>
            <div id="collapseproduct-categories"
                class="collapse {{ request()->routeIs('admin.product-categories*') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Options:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.product-categories.index') ? 'active' : '' }}"
                        href="{{ route('admin.product-categories.index') }}">View Product Categories</a>
                    <a class="collapse-item {{ request()->routeIs('admin.product-categories.create') ? 'active' : '' }}"
                        href="{{ route('admin.product-categories.create') }}">New Product Category</a>
                </div>
            </div>
        </li>
    @endif
    @if (auth()->user()->hasPermissionTo('Read Product Descriptions'))
        <!-- Products Links-->
        <li class="nav-item {{ request()->routeIs('admin.product-descriptions*') ? 'active' : '' }}">
            <a class="nav-link {{ request()->routeIs('admin.product-descriptions*') ? '' : 'collapsed' }}"
                href="#" data-toggle="collapse" data-target="#collapseproduct-descriptions"
                aria-expanded="true" aria-controls="collapseproduct-descriptions">
                <i class="fas fa-fw fa-layer-group"></i>
                <span>Products</span>
            </a>
            <div id="collapseproduct-descriptions"
                class="collapse {{ request()->routeIs('admin.product-descriptions*') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Options:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.product-descriptions.index') ? 'active' : '' }}"
                        href="{{ route('admin.product-descriptions.index') }}">View Products List</a>
                    <a class="collapse-item {{ request()->routeIs('admin.product-descriptions.create') ? 'active' : '' }}"
                        href="{{ route('admin.product-descriptions.create') }}">Create a New Product</a>
                </div>
            </div>
        </li>
    @endif
    @if (auth()->user()->hasPermissionTo('Read Purchases'))
        <!-- Purchases Links-->
        <li class="nav-item {{ request()->routeIs('admin.purchases*') ? 'active' : '' }}">
            <a class="nav-link {{ request()->routeIs('admin.purchases*') ? '' : 'collapsed' }}" href="#"
                data-toggle="collapse" data-target="#collapsepurchases" aria-expanded="true"
                aria-controls="collapsepurchases">
                <i class="fas fa-fw fa-shopping-cart"></i>
                <span>Purchases</span>
            </a>
            <div id="collapsepurchases" class="collapse {{ request()->routeIs('admin.purchases*') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Options:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.purchases.index') ? 'active' : '' }}"
                        href="{{ route('admin.purchases.index') }}">View Purchases List</a>
                    <a class="collapse-item {{ request()->routeIs('admin.purchases.create') ? 'active' : '' }}"
                        href="{{ route('admin.purchases.create') }}">Add a new Purchase</a>
                </div>
            </div>
        </li>
    @endif
    @if (auth()->user()->hasPermissionTo('Read Dispatches'))
        <!-- Dispatches Links-->
        <li class="nav-item {{ request()->routeIs('admin.dispatches.*') ? 'active' : '' }}">
            <a class="nav-link {{ request()->routeIs('admin.dispatches.*') ? '' : 'collapsed' }}" href="#"
                data-toggle="collapse" data-target="#collapsedispatches" aria-expanded="true"
                aria-controls="collapsedispatches">
                <i class="fas fa-fw fa-cash-register"></i>
                <span>Dispatches</span>
            </a>
            <div id="collapsedispatches"
                class="collapse {{ request()->routeIs('admin.dispatches.*') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Options:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.dispatches.index') ? 'active' : '' }}"
                        href="{{ route('admin.dispatches.index') }}">View Dispatches List</a>
                    <a class="collapse-item {{ request()->routeIs('admin.dispatches.create') ? 'active' : '' }}"
                        href="{{ route('admin.dispatches.create') }}">Add a new Dispatch</a>
                </div>
            </div>
        </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        Bill Management
    </div>
    @if (auth()->user()->hasPermissionTo('Read Payment Methods'))
        <!-- Payment Methods Links-->
        <li class="nav-item {{ request()->routeIs('admin.payment-methods*') ? 'active' : '' }}">
            <a class="nav-link {{ request()->routeIs('admin.payment-methods*') ? '' : 'collapsed' }}" href="#"
                data-toggle="collapse" data-target="#collapsepayment-methods" aria-expanded="true"
                aria-controls="collapsepayment-methods">
                <i class="fas fa-fw fa-credit-card"></i>
                <span>Payment Methods</span>
            </a>
            <div id="collapsepayment-methods"
                class="collapse {{ request()->routeIs('admin.payment-methods*') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Options:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.payment-methods.index') ? 'active' : '' }}"
                        href="{{ route('admin.payment-methods.index') }}">View Payment Methods</a>
                    <a class="collapse-item {{ request()->routeIs('admin.payment-methods.create') ? 'active' : '' }}"
                        href="{{ route('admin.payment-methods.create') }}">New Payment Method</a>
                </div>
            </div>
        </li>
    @endif
    @if (auth()->user()->hasPermissionTo('Read Quotations'))
        <!-- Purchase Orders Links-->
        <li class="nav-item {{ request()->routeIs('admin.purchase-orders*') ? 'active' : '' }}">
            <a class="nav-link {{ request()->routeIs('admin.purchase-orders*') ? '' : 'collapsed' }}" href="#"
                data-toggle="collapse" data-target="#collapsepurchase-orders" aria-expanded="true"
                aria-controls="collapsepurchase-orders">
                <i class="fas fa-fw fa-file-invoice"></i>
                <span>Purchase Orders</span>
            </a>
            <div id="collapsepurchase-orders"
                class="collapse {{ request()->routeIs('admin.purchase-orders*') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Options:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.purchase-orders.index') ? 'active' : '' }}"
                        href="{{ route('admin.purchase-orders.index') }}">View LPO List</a>
                    <a class="collapse-item {{ request()->routeIs('admin.purchase-orders.create') ? 'active' : '' }}"
                        href="{{ route('admin.purchase-orders.create') }}">Make a new LPO</a>
                </div>
            </div>
        </li>
    @endif
    @if (auth()->user()->hasPermissionTo('Read Purchase Payments'))
        <!-- Purchase Payments Links-->
        <li class="nav-item {{ request()->routeIs('admin.purchase-payments*') ? 'active' : '' }}">
            <a class="nav-link {{ request()->routeIs('admin.purchase-payments*') ? '' : 'collapsed' }}"
                href="#" data-toggle="collapse" data-target="#collapsepurchase-payments" aria-expanded="true"
                aria-controls="collapsepurchase-payments">
                <i class="fas fa-fw fa-money-bill"></i>
                <span>Purchase Payments</span>
            </a>
            <div id="collapsepurchase-payments"
                class="collapse {{ request()->routeIs('admin.purchase-payments*') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Options:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.purchase-payments.index') ? 'active' : '' }}"
                        href="{{ route('admin.purchase-payments.index') }}">View Purchase
                        Payments</a>
                    <a class="collapse-item {{ request()->routeIs('admin.purchase-payments.create') ? 'active' : '' }}"
                        href="{{ route('admin.purchase-payments.create') }}">New Purchase
                        Payment</a>
                </div>
            </div>
        </li>
    @endif


    <!-- Sidebar Toggler (Sidebar) -->
    {{-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="/img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components,
            and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to
            Pro!</a>
    </div> --}}

</ul>
<!-- End of Sidebar -->
