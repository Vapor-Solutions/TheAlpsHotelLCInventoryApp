<div>
    <div class="container-fluid">
        <x-page-heading>
            Products
        </x-page-heading>

        <div class="card my-5">
            <div class="card-header">
                <h5>Create a new Product</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title"
                                wire:model="product_description.title" id="title" aria-describedby="title"
                                placeholder="Enter the title of your Product">
                            @error('product_description.title')
                                <small id="title" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description"
                                wire:model="product_description.description" id="description" aria-describedby="description"
                                placeholder="Enter the description of your Product">
                            @error('product_description.description')
                                <small id="description" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="mb-3">
                            <label for="product_category_id" class="form-label">Product Category</label>
                            <select wire:model="product_description.product_category_id" class="form-control" name="product_category_id" id="product_category_id">
                                <option selected>Select one</option>
                                @foreach (App\Models\ProductCategory::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('product_description.product_category_id')
                                <small id="description" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="mb-3">
                            <label for="unit_id" class="form-label">Measurement Unit</label>
                            <select wire:model="product_description.unit_id" class="form-control" name="unit_id" id="unit_id">
                                <option selected>Select one</option>
                                @foreach (App\Models\Unit::all() as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->title }} ({{ $unit->symbol }})</option>
                                @endforeach
                            </select>
                            @error('product_description.unit_id')
                                <small id="description" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="mb-3">
                            <label for="brand" class="form-label">Product Category</label>
                            <select wire:model="product_description.brand_id" class="form-control" name="brand" id="brand">
                                <option selected>Select one</option>
                                @foreach (App\Models\Brand::all() as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('product_description.brand_id')
                                <small id="description" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" wire:model="product_description.quantity"
                            class="form-control" name="quantity" id="quantity" aria-describedby="quantity" placeholder="Enter the Quantity in the Selected Unit">
                            @error('product_description.quantity')
                                <small id="quantity" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" wire:model="product_description.price"
                            class="form-control" name="price" id="price" aria-describedby="price" placeholder="Enter the Price in the Selected Currency">
                            @error('product_description.price')
                                <small id="price" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Images</label>
                            <input type="file" wire:model="images" multiple
                            class="form-control" name="" id="" aria-describedby="helpId" placeholder="Choose Your images">
                            @error('images')
                                <small id="price" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($product_description->productImages as $image)
                        <div class="col-md-3 col-4 m-3">
                            <img src="/{{ $image->image_path }}" width="120px" class="img-thumbnail " alt="">
                        </div>
                    @endforeach
                </div>
                <button wire:click="save" class="btn btn-dark text-uppercase">Save</button>
            </div>
        </div>
    </div>
</div>
