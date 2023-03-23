<div>
    <div class="container-fluid">
        <x-page-heading>
            Dispatches List
        </x-page-heading>

        <div class="card my-5 shadow-sm">
            <div class="card-header">
                <h5>List of Dispatches Made</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered
                align-middle">
                        <thead class="">
                            <caption></caption>
                            <tr>
                                <th>ID</th>
                                <th>Dispatch Date</th>
                                <th>Number of Products</th>
                                <th>Total Spent</th>
                                <th>Total Paid</th>
                                <th>Balance</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($dispatches as $dispatch)
                                <tr class="">
                                    <td scope="row">{{ $dispatch->id }}</td>
                                    <td>{{ Carbon\Carbon::parse($dispatch->dispatch_date)->format('jS F, Y') }}</td>
                                    <td>{{ count($dispatch->productItems) }}</td>
                                    <td>
                                        <x-currency></x-currency>{{ number_format($dispatch->total_cost, 2) }}
                                    </td>
                                    <td>
                                        <x-currency></x-currency>
                                        {{ number_format($dispatch->total_cost - $dispatch->balance, 2) }}
                                    </td>
                                    <td>
                                        <x-currency></x-currency>{{ number_format($dispatch->balance, 2) }}
                                    </td>
                                    <td>
                                        <div class="d-flex flex-row justify-content-center">
                                            <div class="flex-col mx-2">
                                                <a href="{{ route('admin.dispatches.show', $dispatch->id) }}"
                                                    class="btn btn-dark">
                                                    <i class="fas fa-list"></i>
                                                </a>
                                            </div>
                                            <div class="flex-col mx-2">
                                                <a href="{{ route('admin.dispatches.edit', $dispatch->id) }}"
                                                    class="btn btn-secondary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="flex-col mx-2">
                                                <button
                                                    onclick="confirm('Are You Sure you want to delete this Product Dispatch?')||event.stopImmediatePropagation()"
                                                    wire:click="delete({{ $dispatch->id }})" class="btn btn-danger">
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
                {{ $dispatches->links() }}
            </div>
        </div>
    </div>
</div>
