<div>

    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">
                <h5>Create a new Measurement Unit</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" wire:model="unit.title" class="form-control" name="title"
                                id="title" aria-describedby="unit.title"
                                placeholder="Enter the title of the measurement Unit">
                            @error('unit.title')
                                <small id="unit.title" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="symbol" class="form-label">Symbol</label>
                            <input type="text" wire:model="unit.symbol" class="form-control" name="symbol"
                                id="symbol" aria-describedby="unit.symbol"
                                placeholder="Enter the symbol of the measurement Unit">
                            @error('unit.symbol')
                                <small id="unit.symbol" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="unit.unit_type_id" class="form-label">Unit Type</label>
                            <select wire:model="unit.unit_type_id" class="form-control" name="unit.unit_type_id" id="unit.unit_type_id">
                                <option selected>Select one</option>
                                @foreach (App\Models\UnitType::all() as $unit_type)
                                    <option value="{{ $unit_type->id }}">{{ $unit_type->title }}
                                        (<small>{{ $unit_type->default }}</small>)
                                    </option>
                                @endforeach
                            </select>
                            @error('unit.unit_type_id')
                                <small id="unit.unit_type_id" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="rate" class="form-label">Rate to default</label>
                            <input type="number" wire:model="unit.rate" step="0.00001" min="0.00001" class="form-control"
                                name="rate" id="rate" aria-describedby="rate" placeholder="How much of the unit makes the default?">
                            @error('unit.rate')
                                <small id="unit.rate" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <button wire:click="save" class="btn btn-dark text-uppercase">Save</button>
            </div>
        </div>
    </div>
</div>
