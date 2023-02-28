<div>
    <div class="container-fluid">
        <x-page-heading>Suppliers</x-page-heading>

        <div class="card">
            <div class="card-header">
                <h5>Supplier's Table</h5>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Affiliated Company</th>
                            <th scope="col">Address</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $supplier)
                            <tr class="">
                                <td scope="row">{{ $supplier->id }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td>{{ $supplier->phone_number }}</td>
                                <td>{{ $supplier->company_name }}</td>
                                <td>{{ $supplier->address ?? 'NOT SET' }}</td>
                                <td>
                                    <div class="d-flex flex-row justify-content-center">
                                        <a href="{{ route('admin.suppliers.edit', $supplier->id) }}"
                                            class="btn btn-dark flex-col mx-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button
                                            onclick="confirm('Are you Sure you want to delete this supplier?')||event.stopImmediatePropagation()"
                                            wire:click="delete({{ $supplier->id }})"
                                            class="btn btn-danger flex-col mx-2">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $suppliers->links() }}
            </div>

        </div>
    </div>
</div>
