<div>
    <div class="container-fluid">
        <x-page-heading>
            Product Categories
        </x-page-heading>

        <div class="card my-4">
            <div class="card-header">
                <h5>List of Product Categories</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Number of Products</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productCategories as $category)
                                <tr class="">
                                    <td scope="row">{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ count($category->productDescriptions) }}</td>
                                    <td>
                                        <div class="d-flex flex-row justify-content-center">
                                            <div class="flex-col mx-2">
                                                <a href="{{ route('admin.product-categories.edit', $category->id) }}" class="btn btn-secondary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="flex-col mx-2">
                                                <button
                                                    onclick="confirm('Are You Sure You want to Delete this Product Category?')||event.stopImmediatePropagation()"
                                                    wire:click="delete({{ $category->id }})"
                                                    class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ route('admin.product-categories.create') }}" class="btn btn-dark">Create New</a>
            </div>
        </div>
    </div>
</div>
