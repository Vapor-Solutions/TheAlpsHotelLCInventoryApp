<div>
    <div class="container-fluid">
        <x-page-heading>
            Brands
        </x-page-heading>
        <div class="card my-5">
            <div class="card-header">
                <h5>List of Brands</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Number of Product Descriptions</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($brands as $brand)
                                <tr class="">
                                    <td scope="row">{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        <img src="{{ $brand->logo_url }}?{{ rand(0, 999) }}" alt=""
                                            class="img-thumbnail " width="40px">
                                    </td>
                                    <td>{{ count($brand->productDescriptions) }}</td>
                                    <td>
                                        <div class="d-flex flex-row justify-content-center">
                                            <div class="flex-col mx-2">
                                                <a href="{{ route('admin.brands.edit', $brand->id) }}"
                                                    class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                            </div>
                                            <div class="flex-col mx-2">
                                                <button
                                                    onclick="confirm('Are You Sure you would like to delete this brand?')||event.stopImmediatePropagation()"
                                                    wire:click="delete({{ $brand->id }})" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
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
            <div class="card-footer">
                {{ $brands->links() }}
            </div>
        </div>
    </div>
</div>
