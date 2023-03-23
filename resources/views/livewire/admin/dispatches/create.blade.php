<div wire:init="loadStuff">
    <div class="container-fluid">
        @if (count($productDescriptions) > 0)
            <x-page-heading>Add a Dispatch</x-page-heading>

            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Add Products</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label for="department_id" class="form-label">Department</label>
                                        <select wire:dirty.class="border border-danger"
                                            wire:model.lazy="dispatch.department_id" class="form-control"
                                            name="department_id" id="department_id">
                                            <option selected>Select one</option>
                                            @foreach (App\Models\Department::all() as $department)
                                                <option value="{{ $department->id }}">{{ $department->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('dispatch.department_id')
                                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label for="dispatch" class="form-label">Dispatch Date</label>
                                        <div class="input-group">
                                            <input wire:model="dispatch.dispatch_date" type="date"
                                                max="{{ Carbon\Carbon::now()->toDateString() }}" class="form-control"
                                                name="dispatch" id="dispatch" aria-describedby="date"
                                                placeholder="Enter the dispatch date">
                                        </div>
                                        @error('dispatch.dispatch_date')
                                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Product Description</label>
                                        <select wire:dirty.class="border border-danger" wire:model.lazy="product_id"
                                            class="form-control" name="" id="">

                                            <option selected>Select one</option>

                                            @foreach ($productDescriptions as $product)
                                                <option value="{{ $product->id }}">{{ $product->title }} -
                                                    {{ $product->quantity . $product->unit->symbol }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('product_id')
                                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Quantity @if ($product_id)
                                                ({{ App\Models\ProductDescription::find(intval($product_id))->available_items ?? 0 }}
                                                available)
                                            @endif
                                        </label>
                                        <input wire:dirty.class="border border-danger" wire:model.lazy="quantity"
                                            type="number" min="0" step="1"
                                            max="{{ App\Models\ProductDescription::find(intval($product_id))->available_items ?? 0 }}"
                                            class="form-control" name="" id="" aria-describedby="helpId"
                                            placeholder="Enter the Number of items you want to buy">
                                        @error('quantity')
                                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-dark" wire:click="addToCart">Add To List</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Added Products</h5>
                        </div>
                        <div class="card-body">
                            @if (count($productsList) > 0)

                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Product Description</th>
                                                <th scope="col">Quantity</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $complete_total = 0;
                                            @endphp
                                            @foreach ($productsList as $key => $item)
                                                @php
                                                    $product = App\Models\ProductDescription::find($item[0]);
                                                @endphp

                                                <tr class="">
                                                    <td scope="row">{{ $product->id }}</td>
                                                    <td>{{ $product->title }} -
                                                        {{ $product->quantity . $product->unit->symbol }}</td>
                                                    <td>{{ $item[1] }}</td>

                                                    <td>
                                                        <button class="btn btn-danger btn-sm"
                                                            wire:click="remove({{ $key }})"><i
                                                                class="fas fa-xs fa-times"></i></button>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            @endif
                        </div>
                        <div class="card-footer">
                            @if ($productsList)
                                <button class="btn btn-dark text-uppercase" wire:click="makeDispatch">
                                    Make Dispatch
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="d-flex justify-content-center align-middle">
                <div class="spinner-grow" role="status" style="top:50%;right:50%">
                    {{-- <span class="visually-hidden">Loading...</span> --}}
                </div>
            </div>
        @endif


    </div>

</div>
