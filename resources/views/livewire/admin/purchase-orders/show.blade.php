<div>
    <div class="container">
        <x-page-heading>
            Local Purchase Order No. #{{ sprintf('%04d', $order->id) }}
        </x-page-heading>
        <div class="row justify-content-start">
            <div class="col-12">
                {{ env('COMPANY_NAME') }}
            </div>
            <div class="col-12">
                {{ env('COMPANY_ADDRESS_1') }}
            </div>
            <div class="col-12">
                {{ env('COMPANY_ADDRESS_2') }}
            </div>
            <div class="col-12">
                {{ env('COMPANY_CONTACT') }}</div>
        </div>
        <div class="row justify-content-end mt-3">
            <div class="col-12 ">
                <p class="me-auto"><u>Supplier</u>: {{ $order->supplier->name }}</p>
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
                                    <th scope="col">Product Unit Cost</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Cost</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $count = 0;
                                    $total = 0;
                                @endphp


                                @foreach ($order->productDescriptions as $item)
                                    <tr class="">
                                        <td scope="row">{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->quantity . $item->unit->symbol }}</td>
                                        <td>
                                            <x-currency></x-currency>{{ number_format($item->price, 2) }}
                                        </td>
                                        <td class="text-right">{{ $item->pivot->quantity }}</td>
                                        <td class="text-right">
                                            <x-currency></x-currency>
                                            {{ number_format($item->price * $item->pivot->quantity, 2) }}
                                        </td>
                                    </tr>
                                    @php
                                        $count += $item->pivot->quantity;
                                    $total += ($item->price * $item->pivot->quantity);
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="4">
                                        <h5 class="text-center">Totals</h5>
                                    </td>
                                    <td>
                                        <h5 class="text-dark text-right"><strong>{{ $count }} items</strong></h5>
                                    </td>
                                    <td>
                                        <h5 class="text-success text-right"><strong>
                                                <x-currency />{{ number_format($total, 2) }}
                                            </strong></h5>
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
