<div>
    <div class="container-fluid">
        <x-page-heading>Suppliers</x-page-heading>

        <div class="card">
            <div class="card-header">
                <h5>Create a new Supplier</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Supplier's Name</label>
                            <input wire:model="supplier.name" type="text" class="form-control" name="name"
                                id="name" aria-describedby="name" placeholder="Enter the Suppliers Name">
                            @error('supplier.name')
                                <small id="name" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Supplier's Email Address</label>
                            <input wire:model="supplier.email" type="email" class="form-control" name="name"
                                id="name" aria-describedby="name"
                                placeholder="Supplier's Email (name@example.com)">
                            @error('supplier.email')
                                <small id="name" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Supplier's Phone Number</label>
                            <input wire:model="supplier.phone_number" type="text" class="form-control" name="name"
                                id="name" aria-describedby="name" placeholder="Enter the Supplier's Phone Number">
                            @error('supplier.phone_number')
                                <small id="name" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Supplier's Company Name</label>
                            <input wire:model="supplier.company_name" type="text" class="form-control"
                                name="company_name" id="company_name" aria-describedby="company_name"
                                placeholder="Enter the Supplier's Company Name">
                            @error('supplier.company_name')
                                <small id="name" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Supplier's Address</label>
                            <textarea wire:model="supplier.address" class="form-control" name="address" id="address" aria-describedby="address"
                                placeholder="Enter the Suppliers address"></textarea>
                            @error('supplier.address')
                                <small id="name" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="kra_pin" class="form-label">KRA Pin</label>
                            <input wire:model="supplier.kra_pin" type="text" class="form-control" name="kra_pin" id="kra_pin"
                                aria-describedby="kra_pin" placeholder="Enter the Supplier's KRA Pin">
                            @error('supplier.kra_pin')
                                <small id="kra_pin" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <button wire:click="save" class="btn btn-dark text-uppercase">Save</button>
            </div>
        </div>
    </div>

</div>
