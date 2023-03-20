<div>
    <div class="container">
        <x-page-heading>
            Purchase No. #{{ sprintf('%010d', $purchase->id) }}
        </x-page-heading>
        <div class="row justify-content-start">
            <div class="col-12">
                Ricnel Logistics
            </div>
            <div class="col-12">
                9 Kabarsiran Ave.,
            </div>
            <div class="col-12">
                +254712345678
            </div>
            <div class="col-12">
                Nairobi, KE</div>
        </div>
        <div class="row justify-content-end mt-3">
            <div class="col-12 "><p class="me-auto"><u>Supplier</u>: {{ $purchase->supplier->name }}</p></div>
        </div>

        <div class="row">
            <div class="col-md-8 col-12">
                <div class="card" style="height:600px">
                    <div class="table-responsive">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Product Description</th>
                                    <th scope="col">Product Unit Size</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_count = 0;
                                    $total_cost = 0;
                                @endphp
                                @foreach (App\Models\ProductDescription::all() as $product)
                                    @php
                                        $count = 0;
                                        $cost = 0;
                                    @endphp
                                    @foreach ($purchase->productItems as $item)
                                        @if ($product->id == $item->product_description_id)
                                            @php
                                                $cost += $item->price;
                                                $count++;
                                                $total_count++;
                                                $total_cost += $item->price;
                                            @endphp
                                        @endif
                                    @endforeach


                                    @if ($count > 0)
                                        <tr class="">
                                            <td scope="row">{{ $product->id }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->quantity . $product->unit->symbol }}</td>
                                            <td>{{ $count }}</td>
                                            <td>
                                                <x-currency></x-currency>{{ number_format($cost, 2) }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <td colspan="3">
                                        <h5 class="text-center">Totals</h5>
                                    </td>
                                    <td><h5 class="text-dark"><strong>{{ $total_count }} items</strong></h5></td>
                                    <td><h5 class="text-success"><strong><x-currency/>{{ number_format($total_cost, 2) }}</strong></h5></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Payments Made</h6>
                    </div>
                    <div class="card-body table-responsive">
                        <table
                            class="table table-striped-columns
                        table-hover
                        table-bordered

                        ">
                            <thead class="">
                                <caption></caption>
                                <tr>
                                    <th>ID</th>
                                    <th>Payment Method</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($purchase->payments as $payment)
                                    <tr class="">
                                        <td scope="row">{{ $payment->id }}</td>
                                        <td>{{ $payment->method->title }}</td>
                                        <td>
                                            <x-currency></x-currency>{{ number_format($payment->amount, 2) }}
                                        </td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td colspan="3"></td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <strong>Balance</strong>
                                    </td>
                                    <td>
                                        <strong>
                                            <x-currency></x-currency>{{ number_format($purchase->balance, 2) }}
                                        </strong>

                                    </td>
                                </tr>

                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
