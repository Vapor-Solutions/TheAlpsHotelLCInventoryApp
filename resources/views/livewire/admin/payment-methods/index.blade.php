<div>
    <div class="container-fluid">
        <x-page-heading>Payment Methods</x-page-heading>

        <div class="card">
            <div class="card-header">
                <h5>List of Payment Methods</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title of Method</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Paid In </th>
                                <th scope="col">Paid Out</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paymentMethods as $method)
                                <tr class="">
                                    <td scope="row">{{ $method->id }}</td>
                                    <td>{{ $method->title }}</td>
                                    <td><img src="{{ $method->logo_url }}?{{ rand(0, 999) }}" alt=""
                                            class="img-thumbnail " width="40px"></td>
                                    <td>
                                        <x-currency></x-currency>{{ number_format($method->paid_in, 2) }}
                                    </td>
                                    <td>
                                        <x-currency></x-currency>{{ number_format($method->paid_out, 2) }}
                                    </td>
                                    <td>
                                        <div class="d-flex flex-row justify-content-center">
                                            <div class="flex-col mx-2">
                                                <a href="{{ route('admin.payment-methods.edit', $method->id) }}"
                                                    class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                            </div>
                                            <div class="flex-col mx-2">
                                                <button
                                                    onclick="confirm('Are You Sure you would like to delete this payment method?')||event.stopImmediatePropagation()"
                                                    wire:click="delete({{ $method->id }})" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
