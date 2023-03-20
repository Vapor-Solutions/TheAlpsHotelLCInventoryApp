<div>
    <div class="container-fluid">
        <x-page-heading>
            Sales Payments Made
        </x-page-heading>

        <div class="card my-5">
            <div class="table-responsive">
                <table
                    class="table table-striped-columns
                table-hover
                table-bordered

                align-middle">
                    <thead class="">
                        <caption></caption>
                        <tr>
                            <th>ID</th>
                            <th>Sale ID</th>
                            <th>Date of Payment</th>
                            <th>Payment Method</th>
                            <th>Amount</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($sales_payments as $payment)
                            <tr class="">
                                <td scope="row">{{ $payment->id }}</td>
                                <td>{{ $payment->sale_id }}</td>
                                <td>{{ Carbon\Carbon::parse($payment->created_at)->format('jS F,Y') }}</td>
                                <td>{{ $payment->method->title }}</td>
                                <td>
                                    <x-currency></x-currency>{{ number_format($payment->amount, 2) }}
                                </td>
                                <td>
                                    <div class="d-flex flex-row justify-content-center">
                                        <div class="flex-col mx-2">
                                            <a href="{{ route('admin.sales-payments.edit', $payment->id) }}"
                                                class="btn btn-secondary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                        <div class="flex-col mx-2">
                                            <button
                                                onclick="confirm('Are You Sure you want to delete this Sales Payment?')||event.stopImmediatePropagation()"
                                                wire:click="delete({{ $payment->id }})" class="btn btn-danger">
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
    </div>
</div>
