<div>
    <div class="container-fluid">
        <x-page-heading>Create Payment Method</x-page-heading>

        <div class="card">
            <div class="card-header">
                <h5>Create a Payment Method</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title of The Payment Method</label>
                            <input type="text" wire:model="method.title" class="form-control" name="title"
                                id="title" aria-describedby="helpId" placeholder="Enter the Payment Method">
                            @error('method.title')
                                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Logo</label>
                            <input type="file" wire:model="logo" class="form-control" name="" id=""
                                aria-describedby="helpId" placeholder="Please Uplload your logo">
                            @error('logo')
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
