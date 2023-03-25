<div wire:init="loadStuff">
    <div class="container-fluid">
        <!-- Page Heading -->
        <x-page-heading>
            Welcome {{ auth()->user()->name }}
        </x-page-heading>
        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Number of Products</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    @if ($products)
                                        {{ number_format(count($products)) }}
                                    @else
                                        <div class="spinner-grow" role="status"></div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-box fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Inventory Value ({{ env('DEFAULT_CURRENCY') }})</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    @if ($products)
                                        <x-currency></x-currency>{{ number_format($inventory_value, 2) }}
                                    @else
                                        <div class="spinner-grow" role="status"></div>
                                    @endif

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        <div class="row mx-3">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Purchases ({{ Carbon\Carbon::now()->format('F, Y') }}) ({{ env('DEFAULT_CURRENCY_SYMBOL') }})</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    @if ($purchasesThisMonth)
                                        <x-currency></x-currency>{{ number_format($purchasevalue, 2) }}
                                    @else
                                        <div class="spinner-grow" role="status"></div>
                                    @endif

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        <div class="row mx-3">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total No. of Departments</div>

                                @if ($departments)
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ number_format(count($departments)) }}</div>
                                @else
                                    <div class="spinner-grow" role="status"></div>
                                @endif
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
