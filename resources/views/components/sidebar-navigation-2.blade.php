 <!-- Sidebar Menu -->
 <nav class="mt-2">
     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

         <li class="nav-header">Initialization</li>

         {{-- Dashboard --}}
         <x-new-nav-link title="Dashboard" route="admin.dashboard" fa_icon="fa-tachometer-alt"></x-new-nav-link>

         <li class="nav-header">System Relations</li>

         {{-- Users --}}

         @if (auth()->user()->hasPermissionTo('Read Users'))
             <x-new-nav-link-dropdown title="Users" route="admin.users*" fa_icon="fa-users">
                 <x-new-nav-link title="View Users" route="admin.users.index"></x-new-nav-link>
                 <x-new-nav-link title="Create a New User" route="admin.users.create"></x-new-nav-link>
             </x-new-nav-link-dropdown>
         @endif
         {{-- Roles --}}

         @if (auth()->user()->hasPermissionTo('Read Roles'))
             <x-new-nav-link-dropdown title="Roles" route="admin.roles*" fa_icon="fa-hard-hat">
                 <x-new-nav-link title="View Roles" route="admin.roles.index"></x-new-nav-link>
                 <x-new-nav-link title="Create a New Role" route="admin.roles.create"></x-new-nav-link>
             </x-new-nav-link-dropdown>
         @endif

         @if (auth()->user()->hasPermissionTo('Read Departments'))
             {{-- Departments --}}
             <x-new-nav-link-dropdown title="Departments" route="admin.departments*" fa_icon="fa-cubes">
                 <x-new-nav-link title="View Departments" route="admin.departments.index"></x-new-nav-link>
                 <x-new-nav-link title="Create a New Department" route="admin.departments.create"></x-new-nav-link>
             </x-new-nav-link-dropdown>
         @endif

         @if (auth()->user()->hasPermissionTo('Read Suppliers'))
             {{-- Suppliers --}}
             <x-new-nav-link-dropdown title="Suppliers" route="admin.suppliers*" fa_icon="fa-truck-loading">
                 <x-new-nav-link title="Create a New Supplier" route="admin.suppliers.create"></x-new-nav-link>
             </x-new-nav-link-dropdown>
         @endif


         <li class="nav-header">Inventory Management</li>

         @if (auth()->user()->hasPermissionTo('Read unit Types'))
         {{-- Unit Types --}}
         <x-new-nav-link-dropdown title="Unit types" route="admin.unit-types*" fa_icon="fa-weight">
             <x-new-nav-link title="View Unit Types" route="admin.unit-types.index"></x-new-nav-link>
             <x-new-nav-link title="Create a New Unit Type" route="admin.unit-types.create"></x-new-nav-link>
         </x-new-nav-link-dropdown>
         @endif

         @if (auth()->user()->hasPermissionTo('Read Units'))
         {{-- Units --}}
         <x-new-nav-link-dropdown title="Units" route="admin.units*" fa_icon="fa-balance-scale">
             <x-new-nav-link title="View Units" route="admin.units.index"></x-new-nav-link>
             <x-new-nav-link title="Create a New Unit" route="admin.units.create"></x-new-nav-link>
         </x-new-nav-link-dropdown>
         @endif

         @if (auth()->user()->hasPermissionTo('Read Brands'))
         {{-- Brands --}}
         <x-new-nav-link-dropdown title="Brands" route="admin.brands*" fa_icon="fa-copyright">
             <x-new-nav-link title="View Brands" route="admin.brands.index"></x-new-nav-link>
             <x-new-nav-link title="Create a New Brand" route="admin.brands.create"></x-new-nav-link>
         </x-new-nav-link-dropdown>

         @endif


         @if (auth()->user()->hasPermissionTo('Read Product Categories'))
         {{-- Product-categories --}}
         <x-new-nav-link-dropdown title="Product Categories" route="admin.product-categories*" fa_icon="fa-layer-group">
             <x-new-nav-link title="View Product Categories" route="admin.product-categories.index"></x-new-nav-link>
             <x-new-nav-link title="Create a New Product Category" route="admin.product-categories.create">
             </x-new-nav-link>
         </x-new-nav-link-dropdown>

         @endif

         @if (auth()->user()->hasPermissionTo('Read Product Descriptions'))
         {{-- Products --}}
         <x-new-nav-link-dropdown title="Products" route="admin.product-descriptions*" fa_icon="fa-layer-group">
             <x-new-nav-link title="View Products" route="admin.product-descriptions.index"></x-new-nav-link>
             <x-new-nav-link title="Create a New Product" route="admin.product-descriptions.create"></x-new-nav-link>
         </x-new-nav-link-dropdown>

         @endif

         @if (auth()->user()->hasPermissionTo('Read Purchases'))
         {{-- Purchases --}}
         <x-new-nav-link-dropdown title="Purchases" route="admin.purchases*" fa_icon="fa-shopping-cart">
             <x-new-nav-link title="View Purchases" route="admin.purchases.index"></x-new-nav-link>
             <x-new-nav-link title="Create a New Purchase" route="admin.purchases.create"></x-new-nav-link>
         </x-new-nav-link-dropdown>

         @endif
         @if (auth()->user()->hasPermissionTo('Read Dispatches'))
         {{-- Dispatches --}}
         <x-new-nav-link-dropdown title="Dispatches" route="admin.dispatches*" fa_icon="fa-cash-register">
             <x-new-nav-link title="View Dispatches" route="admin.dispatches.index"></x-new-nav-link>
             <x-new-nav-link title="Create a New Dispatch" route="admin.dispatches.create"></x-new-nav-link>
         </x-new-nav-link-dropdown>

         @endif

         <li class="nav-header">Accounts & Billing</li>

         @if (auth()->user()->hasPermissionTo('Read Payment Methods'))
         {{-- Payment Methods --}}
         <x-new-nav-link-dropdown title="Payment Methods" route="admin.payment-methods*" fa_icon="fa-credit-card">
             <x-new-nav-link title="View Payment Methods" route="admin.payment-methods.index"></x-new-nav-link>
             <x-new-nav-link title="Create a New Payment Method" route="admin.payment-methods.create"></x-new-nav-link>
         </x-new-nav-link-dropdown>

         @endif
         @if (auth()->user()->hasPermissionTo('Read Quotations'))
         {{-- Purchase Orders --}}
         <x-new-nav-link-dropdown title="Local Purchase Orders" route="admin.purchase-orders*"
             fa_icon="fa-file-invoice">
             <x-new-nav-link title="View Purchase Orders" route="admin.purchase-orders.index"></x-new-nav-link>
             <x-new-nav-link title="Create a New Purchase Order" route="admin.purchase-orders.create"></x-new-nav-link>
         </x-new-nav-link-dropdown>
         @endif
         @if (auth()->user()->hasPermissionTo('Read Purchase Payments'))
         {{-- Purchase Payments --}}
         <x-new-nav-link-dropdown title="Purchase Payments " route="admin.purchase-payments*"
             fa_icon="fa-money-bill">
             <x-new-nav-link title="View Purchase Payments" route="admin.purchase-payments.index"></x-new-nav-link>
             <x-new-nav-link title="Add a New Purchase Payment" route="admin.purchase-payments.create">
             </x-new-nav-link>
         </x-new-nav-link-dropdown>
         @endif

         <li class="nav-header">App Settings & Management</li>


         {{-- Activity Log --}}

         @if (auth()->user()->hasRole('Super Administrator'))
         <x-new-nav-link-dropdown title="Activity Log" route="admin.users*" fa_icon="fa-user-clock">
             <x-new-nav-link title="View Users" route="admin.users.index"></x-new-nav-link>
             <x-new-nav-link title="Create a New User" route="admin.users.create"></x-new-nav-link>
         </x-new-nav-link-dropdown>

         @endif

     </ul>
 </nav>
 <!-- /.sidebar-menu -->
