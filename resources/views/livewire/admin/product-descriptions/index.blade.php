<div>
    <div class="container">
        <form class="d-none d-sm-inline-block form-inline m-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" wire:model="searchTerm" class="form-control bg-light border-1 small"
                    placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button wire:click="search" class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="container-fluid my-5">
        <div class="table-responsive">
            <table class="table table-striped
            table-hover


            align-middle">
                <thead class="">
                    <caption></caption>
                    <tr>
                        <th>ID</th>
                        <th>Brand Name</th>
                        <th>Title & Description</th>
                        <th>Unit Price</th>
                        <th>Available Units</th>
                        <th>Total Value</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($products as $product)
                        <tr class="">
                            <td scope="row">{{ $product->id }}</td>
                            <td>{{ $product->brand->name }}</td>
                            <td>{{ $product->title }}
                                <br>
                                {{ $product->description != '-' ? $product->description : '' }}
                                <br>
                                <sub><strong>{{ $product->quantity . $product->unit->symbol }}</strong></sub>
                            </td>
                            <td>
                                <x-currency></x-currency>{{ $product->price }}
                            </td>
                            <td>
                                {{ $product->available_items }}
                            </td>
                            <td>
                                <x-currency></x-currency>{{ $product->actual_value }}
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
