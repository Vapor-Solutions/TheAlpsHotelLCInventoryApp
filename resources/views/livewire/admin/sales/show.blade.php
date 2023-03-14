<div>
    <div class="container">
        <x-page-heading>
            Sale No. #{{ sprintf('%010d', $sale->id) }}
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
            <div class="col-12 "><p class="me-auto"><u>Customer</u>: {{ $sale->customer->name }}</p></div>
        </div>

        <div class="card">
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
                            @foreach ($sale->productItems as $item)
                                @if ($product->id == $item->product_description_id)
                                    @php
                                        $cost += $item->pivot->sale_price;
                                        $count++;
                                        $total_count++;
                                        $total_cost += $item->pivot->sale_price;
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
</div>
