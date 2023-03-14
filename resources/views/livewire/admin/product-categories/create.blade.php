<div>
    <div class="container-fluid">
        <x-page-heading>
            Product Categories
        </x-page-heading>

        <div class="card">
            <div class="card-header">
                <h5>Create a new Product Category</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="product_category.title" class="form-label">Title</label>
                            <input wire:model="product_category.title" type="text" class="form-control" name="product_category.title"
                                id="product_category.title" aria-describedby="helpId"
                                placeholder="Enter the name of the Product Category">
                            @error('product_category.title')
                                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <button class="btn btn-dark text-uppercase" wire:click="save">Save</button>
            </div>
        </div>
    </div>
</div>
