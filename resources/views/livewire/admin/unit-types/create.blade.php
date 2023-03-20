<div>
    <div class="container-fluid">
        <x-page-heading>
            Create a new Unit Type
        </x-page-heading>

        <div class="card my-5">
            <div class="card-header">
                <h5>New Unit Type</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input wire:model="type.title" type="text" class="form-control" name="title" id="title"
                                aria-describedby="title" placeholder="Enter the Title of Your Unit Type">
                            @error('type.title')
                                <small id="title" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="title" class="form-label">Default Measurement Unit</label>
                            <input wire:model="type.default" type="text" class="form-control" name="title" id="title"
                                aria-describedby="title" placeholder="Enter the Default Measurement Unit">
                            @error('type.default')
                                <small id="title" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <button wire:click="save" class="btn btn-dark text-uppercase">Save</button>
            </div>
        </div>
    </div>
</div>
