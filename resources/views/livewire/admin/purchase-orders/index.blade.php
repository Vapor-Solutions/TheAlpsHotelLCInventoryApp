<div>
    <div class="container-fluid">
        <x-page-heading>
            Purchase Orders List
        </x-page-heading>

        <div class="card my-5 shadow-sm">
            <div class="card-header">
                <h5>List of Purchase Orders Made</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered
                align-middle">
                        <thead class="">
                            <caption></caption>
                            <tr>
                                <th>ID</th>
                                <th>Created On</th>
                                <th>Number of Products</th>
                                <th>Total Cost</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($orders as $order)
                                <tr class="">
                                    <td scope="row">{{ $order->id }}</td>
                                    <td>{{ Carbon\Carbon::parse($order->created_at)->format('jS F, Y h:i:sA') }}</td>
                                    <td>{{ count($order->productDescriptions) }}</td>
                                    <td>
                                        <x-currency></x-currency>{{ number_format($order->total_cost, 2) }}
                                    </td>

                                    <td>
                                        <div class="d-flex flex-row justify-content-center">
                                            <div class="flex-col mx-2">
                                                <a href="{{ route('admin.purchase-orders.order', $order->id) }}"
                                                    class="btn btn-dark" target="_blank">
                                                    <i class="fas fa-file-pdf"></i>
                                                </a>
                                            </div>
                                        <div class="d-flex flex-row justify-content-center">
                                            <div class="flex-col mx-2">
                                                <a href="{{ route('admin.purchase-orders.show', $order->id) }}"
                                                    class="btn btn-dark">
                                                    <i class="fas fa-list"></i>
                                                </a>
                                            </div>
                                            <div class="flex-col mx-2">
                                                <a href="{{ route('admin.purchase-orders.edit', $order->id) }}"
                                                    class="btn btn-secondary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="flex-col mx-2">
                                                <button
                                                    onclick="confirm('Are You Sure you want to delete this Purchase Order?')||event.stopImmediatePropagation()"
                                                    wire:click="delete({{ $order->id }})" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>

            </div>
            <div class="card-footer">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>
