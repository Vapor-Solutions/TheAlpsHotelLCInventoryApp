<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-ricnel sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fab fa-phoenix-framework"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Ricnel <sup>24-7</sup></div>
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
        Customer Relationship
    </div>

    <!-- ustomers Links-->
    <li class="nav-item {{ request()->routeIs('admin.customers*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('admin.customers*') ? '' : 'collapsed' }}" href="#"
            data-toggle="collapse" data-target="#collapseCustomers" aria-expanded="true"
            aria-controls="collapseCustomers">
            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span>
        </a>
        <div id="collapseCustomers" class="collapse {{ request()->routeIs('admin.customers*') ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Options:</h6>
                <a class="collapse-item {{ request()->routeIs('admin.customers.index') ? 'active' : '' }}"
                    href="{{ route('admin.customers.index') }}">View Customers</a>
                <a class="collapse-item {{ request()->routeIs('admin.customers.create') ? 'active' : '' }}"
                    href="{{ route('admin.customers.create') }}">Create a new Customer</a>
            </div>
        </div>
    </li>
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


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Inventory Management
    </div>

    <li class="nav-item {{ request()->routeIs('admin.units*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('admin.units*') ? '' : 'collapsed' }}" href="#"
            data-toggle="collapse" data-target="#collapseUnits" aria-expanded="true" aria-controls="collapseUnits">
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
    <li class="nav-item {{ request()->routeIs('admin.product-categories*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('admin.product-categories*') ? '' : 'collapsed' }}" href="#"
            data-toggle="collapse" data-target="#collapseproduct-categories" aria-expanded="true"
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
    <li class="nav-item {{ request()->routeIs('admin.product-descriptions*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('admin.product-descriptions*') ? '' : 'collapsed' }}" href="#"
            data-toggle="collapse" data-target="#collapseproduct-descriptions" aria-expanded="true"
            aria-controls="collapseproduct-descriptions">
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
    <li class="nav-item {{ request()->routeIs('admin.sales*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('admin.sales*') ? '' : 'collapsed' }}" href="#"
            data-toggle="collapse" data-target="#collapsesales" aria-expanded="true" aria-controls="collapsesales">
            <i class="fas fa-fw fa-cash-register"></i>
            <span>Sales</span>
        </a>
        <div id="collapsesales" class="collapse {{ request()->routeIs('admin.sales*') ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Options:</h6>
                <a class="collapse-item {{ request()->routeIs('admin.sales.index') ? 'active' : '' }}"
                    href="{{ route('admin.sales.index') }}">View Sales List</a>
                <a class="collapse-item {{ request()->routeIs('admin.sales.create') ? 'active' : '' }}"
                    href="{{ route('admin.sales.create') }}">Add a new Sale</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


    <!-- Heading -->
    <div class="sidebar-heading">
        Bill Management
    </div>

    <li class="nav-item {{ request()->routeIs('admin.payment-methods*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('admin.payment-methods*') ? '' : 'collapsed' }}" href="#"
            data-toggle="collapse" data-target="#collapsepayment-methods" aria-expanded="true" aria-controls="collapsepayment-methods">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Payment Methods</span>
        </a>
        <div id="collapsepayment-methods" class="collapse {{ request()->routeIs('admin.payment-methods*') ? 'show' : '' }}"
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
    <li class="nav-item {{ request()->routeIs('admin.quotations*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('admin.quotations*') ? '' : 'collapsed' }}" href="#"
            data-toggle="collapse" data-target="#collapsequotations" aria-expanded="true" aria-controls="collapsequotations">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span>Quotations</span>
        </a>
        <div id="collapsequotations" class="collapse {{ request()->routeIs('admin.quotations*') ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Options:</h6>
                <a class="collapse-item {{ request()->routeIs('admin.quotations.index') ? 'active' : '' }}"
                    href="{{ route('admin.quotations.index') }}">View quotations List</a>
                <a class="collapse-item {{ request()->routeIs('admin.quotations.create') ? 'active' : '' }}"
                    href="{{ route('admin.quotations.create') }}">Add a new Quotation</a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ request()->routeIs('admin.invoices*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('admin.invoices*') ? '' : 'collapsed' }}" href="#"
            data-toggle="collapse" data-target="#collapseinvoices" aria-expanded="true" aria-controls="collapseinvoices">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>Invoices</span>
        </a>
        <div id="collapseinvoices" class="collapse {{ request()->routeIs('admin.invoices*') ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Options:</h6>
                <a class="collapse-item {{ request()->routeIs('admin.invoices.index') ? 'active' : '' }}"
                    href="{{ route('admin.invoices.index') }}">View Invoices List</a>
                <a class="collapse-item {{ request()->routeIs('admin.invoices.create') ? 'active' : '' }}"
                    href="{{ route('admin.invoices.create') }}">Add a new Invoice</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ request()->routeIs('admin.payments*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('admin.payments*') ? '' : 'collapsed' }}" href="#"
            data-toggle="collapse" data-target="#collapsepayments" aria-expanded="true" aria-controls="collapsepayments">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>Sales Payments</span>
        </a>
        <div id="collapsepayments" class="collapse {{ request()->routeIs('admin.payments*') ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Options:</h6>
                <a class="collapse-item {{ request()->routeIs('admin.payments.index') ? 'active' : '' }}"
                    href="{{ route('admin.payments.index') }}">View Payments</a>
                <a class="collapse-item {{ request()->routeIs('admin.payments.create') ? 'active' : '' }}"
                    href="{{ route('admin.payments.create') }}">New Sales Payment</a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ request()->routeIs('admin.purchase-payments*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('admin.purchase-payments*') ? '' : 'collapsed' }}" href="#"
            data-toggle="collapse" data-target="#collapsepurchase-payments" aria-expanded="true" aria-controls="collapsepurchase-payments">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>Purchase Payments</span>
        </a>
        <div id="collapsepurchase-payments" class="collapse {{ request()->routeIs('admin.purchase-payments*') ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Options:</h6>
                <a class="collapse-item {{ request()->routeIs('admin.purchase-payments.index') ? 'active' : '' }}"
                    href="{{ route('admin.purchase-payments.index') }}">View Purchase Payments</a>
                <a class="collapse-item {{ request()->routeIs('admin.purchase-payments.create') ? 'active' : '' }}"
                    href="{{ route('admin.purchase-payments.create') }}">New Purchase Payment</a>
            </div>
        </div>
    </li>



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
