<div>
    <div class="container-fluid">
        <x-page-heading>
            Purchases List
        </x-page-heading>

        <div class="card my-5 shadow-sm">
            <div class="card-header">
                <h5>List of Purchases Made</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered
                align-middle">
                        <thead class="">
                            <caption></caption>
                            <tr>
                                <th>ID</th>
                                <th>Purchase Date</th>
                                <th>Supplier's Name</th>
                                <th>Number of Products</th>
                                <th>Total Spent</th>
                                <th>Total Paid</th>
                                <th>Balance</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($purchases as $purchase)
                                <tr class="">
                                    <td scope="row">{{ $purchase->id }}</td>
                                    <td>{{ Carbon\Carbon::parse($purchase->purchase_date)->format('jS F, Y') }}</td>
                                    <td>{{ $purchase->supplier->company_name??$purchase->supplier->name }}</td>
                                    <td>{{ count($purchase->productItems) }}</td>
                                    <td>
                                        <x-currency></x-currency>{{ number_format($purchase->total_cost, 2) }}
                                    </td>
                                    <td>
                                        <x-currency></x-currency>
                                        {{ number_format($purchase->total_cost - $purchase->balance, 2) }}
                                    </td>
                                    <td class=" @if ($purchase->balance > 0) text-danger @endif">
                                        <x-currency></x-currency>{{ number_format($purchase->balance, 2) }}
                                    </td>
                                    <td>
                                        <div class="d-flex flex-row justify-content-center">
                                            <div class="flex-col mx-2">
                                                <a href="{{ route('admin.purchases.show', $purchase->id) }}"
                                                    class="btn btn-dark">
                                                    <i class="fas fa-list"></i>
                                                </a>
                                            </div>
                                            <div class="flex-col mx-2">
                                                <a href="{{ route('admin.purchases.edit', $purchase->id) }}"
                                                    class="btn btn-secondary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="flex-col mx-2">
                                                <button
                                                    onclick="confirm('Are You Sure you want to delete this Product Purchase?')||event.stopImmediatePropagation()"
                                                    wire:click="delete({{ $purchase->id }})" class="btn btn-danger">
                                                    <i class="fas fa-edit"></i>
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
                {{ $purchases->links() }}
            </div>
        </div>
    </div>
</div>
