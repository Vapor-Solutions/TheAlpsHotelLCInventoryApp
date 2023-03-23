<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div class="container">
        <x-page-heading>Create a New Department</x-page-heading>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" wire:model="department.title" class="form-control" name="title"
                                id="title" aria-describedby="title" placeholder="Enter your Department Title">
                            @error('department.title')
                                <small id="title" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" wire:click="save">SAVE</button>
            </div>
        </div>
    </div>
</div>
