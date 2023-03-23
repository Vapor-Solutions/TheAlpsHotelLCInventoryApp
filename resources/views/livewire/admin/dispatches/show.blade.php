<div>
    <div class="container">
        <x-page-heading>
            Dispatch No. #{{ sprintf('%010d', $dispatch->id) }}
        </x-page-heading>
        <div class="row justify-content-start">
            <div class="col-12">
                The Alps Hotel Nakuru - KCB Leadership Centre
            </div>
            <div class="col-12">
                Ngong View Estate, Karen - Kerarapon Rd
            </div>

            <div class="col-12">
                Nairobi, KE</div>
        </div>
        <div class="row justify-content-end mt-3">
            <div class="col-12 ">
                <p class="me-auto"><u>Department</u>: {{ $dispatch->department->name }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-12">
                <div class="card my-5">
                    <div class="table-responsive " style="height: 600px">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Product Description</th>
                                    <th scope="col">Product Unit Size</th>
                                    <th scope="col">Quantity</th>
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
                                    @foreach ($dispatch->productItems as $item)
                                        @if ($product->id == $item->product_description_id)
                                            @php
                                                $cost += $item->pivot->dispatch_price;
                                                $count++;
                                                $total_count++;
                                                $total_cost += $item->pivot->dispatch_price;
                                            @endphp
                                        @endif
                                    @endforeach


                                    @if ($count > 0)
                                        <tr class="">
                                            <td scope="row">{{ $product->id }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->quantity . $product->unit->symbol }}</td>
                                            <td>{{ $count }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <td colspan="3">
                                        <h5 class="text-center">Totals</h5>
                                    </td>
                                    <td>
                                        <h5 class="text-dark"><strong>{{ $total_count }} items</strong></h5>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
