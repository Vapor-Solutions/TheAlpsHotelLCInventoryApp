<div>
    <div class="container-fluid">
        <x-page-heading>
            Generate a new Invoice
        </x-page-heading>

        <div class="card my-5">
            <div class="card-header">
                <h5>New Invoice</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="Choose the Sale Number" class="form-label">Sale No.</label>
                            <select wire:model="invoice.sale_id" class="form-control" name="Choose the Sale Number"
                                id="Choose the Sale Number">
                                <option selected>Select one</option>
                                @foreach (App\Models\Sale::all() as $sale)
                                    <option value="{{ $sale->id }}">Sale #{{ $sale->id }} - (Balance: <x-currency></x-currency>{{ number_format($sale->balance) }})</option>
                                @endforeach
                            </select>
                            @error('invoice.sale_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <button wire:click="save" class="btn btn-dark text-uppercase">Save</button>
            </div>
        </div>
    </div>
</div>
