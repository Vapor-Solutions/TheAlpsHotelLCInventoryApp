<div>
    <div class="container-fluid">
        <x-page-heading>
            Brands
        </x-page-heading>
        <div class="card">
            <div class="card-header">
                <h5>Create a new Brand</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" wire:model="brand.name" class="form-control" name="name"
                                id="name" aria-describedby="name" placeholder="Enter the Brand Name">
                            @error('brand.name')
                                <small id="name" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Brand Logo</label>
                            <input wire:model="logo" type="file" class="form-control" aria-describedby="helpId">
                            @error('logo')
                                <small id="name" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-8">
                        @if ($logo)
                            <img class="img-thumbnail" width="80px" src="{{ $logo->temporaryUrl() }}" alt="">
                        @endif
                    </div>
                </div>
                <button wire:click="save" class="btn btn-dark text-uppercase">Save</button>
            </div>
        </div>
    </div>
</div>
