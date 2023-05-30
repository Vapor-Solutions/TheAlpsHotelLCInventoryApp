<div>
    <div class="container">
        <form class="row d-flex justify-content-center" wire:submit.prevent="search">
            <div class="input-group">
                <input type="text" wire:model="searchTerm" wire:keydown.enter="search"
                    class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search"
                    aria-describedby="basic-addon2">
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
            <table
                class="table table-striped
            table-hover
            table-bordered
            align-middle">
                <thead class="">
                    <tr class="border-2">
                        <th>ID</th>
                        <th>Brand Name</th>
                        <th>Title & Description</th>
                        <th>Unit Price</th>
                        <th>Available Units</th>
                        <th>Total Value</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @if ($this->products)
                        @foreach ($this->products as $product)
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
                                <td>
                                    <div class="d-flex flex-row justify-content-center">
                                        <div class="flex-col mx-2">
                                            <a href="{{ route('admin.product-descriptions.show', $product->id) }}"
                                                class="btn btn-dark">
                                                <i class="fas fa-list"></i>
                                            </a>
                                        </div>
                                        <div class="flex-col mx-2">
                                            <a href="{{ route('admin.product-descriptions.edit', $product->id) }}"
                                                class="btn btn-secondary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                        <div class="flex-col mx-2">
                                            <button
                                                onclick="confirm('Are You Sure you want to delete this Product Description?')||event.stopImmediatePropagation()"
                                                wire:click="delete({{ $product->id }})" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</div>
