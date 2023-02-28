<div>
    <div class="container-fluid">
        <x-page-heading>Customers</x-page-heading>

        <div class="card">
            <div class="card-header">
                <h5>Edit {{ $customer->name }}'s Details</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Customer's Name</label>
                            <input wire:model="customer.name" type="text" class="form-control" name="name"
                                id="name" aria-describedby="name" placeholder="Enter the Customers Name">
                            @error('customer.name')
                                <small id="name" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Customer's Email Address</label>
                            <input wire:model="customer.email" type="email" class="form-control" name="name"
                                id="name" aria-describedby="name"
                                placeholder="Customer's Email (name@example.com)">
                            @error('customer.email')
                                <small id="name" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Customer's Phone Number</label>
                            <input wire:model="customer.phone_number" type="text" class="form-control" name="name"
                                id="name" aria-describedby="name" placeholder="Enter the Customer's Phone Number">
                            @error('customer.phone_number')
                                <small id="name" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Customer's Company Name</label>
                            <input wire:model="customer.company_name" type="text" class="form-control"
                                name="company_name" id="company_name" aria-describedby="company_name"
                                placeholder="Enter the Customer's Company Name">
                            @error('customer.company_name')
                                <small id="name" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Customer's Address</label>
                            <textarea wire:model="customer.address" class="form-control" name="address" id="address" aria-describedby="address"
                                placeholder="Enter the Customers address"></textarea>
                            @error('customer.address')
                                <small id="name" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="kra_pin" class="form-label">KRA Pin</label>
                            <input wire:model="customer.kra_pin" type="text" class="form-control" name="kra_pin" id="kra_pin"
                                aria-describedby="kra_pin" placeholder="Enter the Customer's KRA Pin">
                            @error('customer.kra_pin')
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
