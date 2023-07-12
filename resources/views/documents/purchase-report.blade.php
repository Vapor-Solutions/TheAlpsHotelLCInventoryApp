<!DOCTYPE html>
<html>

<head>
    <title>Inventory Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .header-row {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Inventory Report</h1>

    <h2>Stock Information</h2>
    <table>
        <tr>
            <th>Opening Stock</th>
            <th>Purchases</th>
            <th>Dispatches</th>
            <th>Closing Stock</th>
        </tr>
        <tr>
            <td>
                <x-currency></x-currency>{{ number_format($opening_stock, 2) }}
            </td>
            <td>
                <x-currency></x-currency>{{ number_format($purchases_between, 2) }}
            </td>
            <td>
                <x-currency></x-currency>{{ number_format($dispatches_between, 2) }}
            </td>
            <td>
                <x-currency></x-currency>
                {{ number_format($opening_stock + $purchases_between - $dispatches_between, 2) }}
            </td>
        </tr>
    </table>

    <h2>Purchases</h2>
    <table>
        <tr class="header-row">
            <th>Date</th>
            <th>Supplier</th>
            <th>Total Cost</th>
        </tr>
        @foreach ($purchases as $purchase)
            <tr>
                <td>{{ $purchase->purchase_date }}</td>
                <td>{{ $purchase->supplier->name }}</td>
                <td>
                    <x-currency></x-currency>{{ number_format($purchase->total_cost) }}
                </td>
            </tr>
        @endforeach
    </table>
    <h2>Dispatches</h2>
    <table>
        <tr class="header-row">
            <th>Date</th>
            <th>Department</th>
        </tr>
        @foreach ($dispatches as $dispatch)
            <tr>
                <td>{{ $dispatch->dispatch_date }}</td>
                <td>{{ $dispatch->department->title }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
