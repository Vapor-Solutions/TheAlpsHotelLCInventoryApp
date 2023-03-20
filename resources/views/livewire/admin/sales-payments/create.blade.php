<div>
    <div class="container-fluid">
        <x-page-heading>
            Add Sales Payment
        </x-page-heading>

        <div class="card">
            <div class="card-header">
                <h5>Sales Payment Made</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="sale_id" class="form-label">Sale No.</label>
                            <select wire:model="payment.sale_id" class="form-control" name="sale_id" id="sale_id">
                                <option selected>Select one</option>
                                @foreach (App\Models\Sale::all() as $sale)
                                    @if ($sale->balance != 0)
                                        <option value="{{ $sale->id }}">Sale No. #{{ $sale->id }} -
                                            {{ $sale->customer->name }} <small>Balance: <x-currency></x-currency>
                                                {{ number_format($sale->balance, 2) }}</small></option>
                                    @endif
                                @endforeach
                            </select>
                            @error('payment.sale_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="sale_id" class="form-label">Payment Method</label>
                            <select wire:model="payment.payment_method_id" class="form-control" name="sale_id"
                                id="sale_id">
                                <option selected>Select one</option>
                                @foreach (App\Models\PaymentMethod::all() as $method)
                                    <option value="{{ $method->id }}">{{ $method->title }}</option>
                                @endforeach
                            </select>
                            @error('payment.sale_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label for="payment.amount" class="form-label">Amount Paid</label>
                            <input wire:model="payment.amount" type="number" step="0.01" min="1"
                                max="{{ $payment->sale->balance ?? 1 }}" class="form-control" name="payment.amount"
                                id="payment.amount" aria-describedby="payment.amount"
                                placeholder="Enter the Amount Paid">
                            @error('payment.amount')
                                <small id="payment.amount" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                </div>
                <button wire:click="save" class="btn btn-dark text-uppercase">Save</button>
            </div>
        </div>
    </div>
</div>
