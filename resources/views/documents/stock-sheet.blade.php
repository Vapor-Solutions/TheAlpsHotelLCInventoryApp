<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock Sheet</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
            padding: 0;
            margin: 0;
        }

        td,
        th {
            border: 1px solid black;
            padding: 10px;
            margin: auto;

        }
    </style>
</head>

<body>
    <div class="">
        <div
            style="margin:auto; background: transparent url({{ env('APP_URL') }}/logo.png);width: 120px;height: 120px;background-position: center;background-size: 120px;">
        </div>

        <table class="table">
            <thead style="background-color: #dddddd">
                <tr>
                    <th scope="col" style="text-transform: uppercase">ID</th>
                    <th scope="col" style="text-transform: uppercase">Item Name</th>
                    <th scope="col" style="text-transform: uppercase">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\ProductCategory::all() as $category)
                    <tr>
                        <td colspan="3"
                            style="text-align: center; font-size:16px; font-weight:bold; text-transform:capitalize;">
                            {{ $category->title }}</td>
                    </tr>
                    @foreach ($products as $product)
                        @if ($product->product_category_id == $category->id)
                            <tr class="">
                                <td scope="row">{{ $product->id }}</td>
                                <td><span
                                        style="color: #0c436b">{{ $product->brand->name != 'Miscellaneous' ? $product->brand->name : '' }}</span>
                                    {{ $product->title }} - {{ $product->quantity }}{{ $product->unit->symbol }}</td>
                                <td></td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach

            </tbody>
        </table>
    </div>

</body>

</html>
