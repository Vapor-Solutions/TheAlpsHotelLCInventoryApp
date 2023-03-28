<?php

namespace App\Http\Livewire\Admin\Dispatches;

use App\Models\ActivityLog;
use App\Models\Dispatch;
use App\Models\ProductDescription;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Create extends Component
{
    public $productsList = [];
    public Dispatch $dispatch;

    public $readyToLoad = false;

    protected $rules = [
        'dispatch.dispatch_date' => 'required',
        'dispatch.department_id' => 'required',
    ];


    public function loadStuff()
    {
        $this->readyToLoad = true;
    }

    public $product_id, $quantity;


    public function mount()
    {
        // $this->middleware('permission:Create Dispatches');
        $this->dispatch =  new Dispatch();
    }

    public function addToCart()
    {
        $this->validate([
            'product_id' => 'required',
            'quantity' => 'required|min:1',
        ]);

        $count = 0;
        if (count($this->productsList) > 0) {

            for ($i = 0; $i < count($this->productsList); $i++) {
                if (intval($this->productsList[$i][0]) == intval($this->product_id)) {

                    if ($this->quantity > (ProductDescription::find($this->product_id)->available_items - intval($this->productsList[$i][1]))) {
                        throw ValidationException::withMessages([
                            'quantity' => 'You have already reached your limit of items for this product'
                        ]);
                    }

                    $this->productsList[$i][1] += intval($this->quantity);
                    $count++;
                }else {
                    if ($this->quantity > ProductDescription::find($this->product_id)->available_items) {
                        throw ValidationException::withMessages([
                            'quantity' => 'The quantity surpasses the number of available items'
                        ]);
                    }
                }
            }
        }
        if ($count == 0) {
            array_push($this->productsList, [intval($this->product_id), intval($this->quantity)]);
        }
        $this->reset(['product_id', 'quantity']);
    }


    public function remove($key)
    {
        unset($this->productsList[$key]);
    }


    public function makeDispatch()
    {
        $this->validate();

        $this->dispatch->save();

        foreach ($this->productsList as $key => $item) {
            $productDescription = ProductDescription::find($item[0]);


            $count = 0;
            if ($item[1] > $productDescription->available_items) {
                $this->emit('done', [
                    'warning' => "The Number of Available Items is less than what you are selling here "
                ]);
                return;
            }
            foreach ($productDescription->productItems as $product_item) {
                if (!$product_item->is_dispatched) {
                    $product_item->dispatches()->attach($this->dispatch->id);
                    $count++;
                }

                if ($count == $item[1]) {
                    break;
                }
            }
        }

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'payload' => "Created Dispatch No. " . $this->dispatch->id
        ]);


        $this->reset('productsList');

        $this->emit('done', [
            'success' => 'Successfully Made the Dispatch No. #' . $this->dispatch->id
        ]);
        $this->dispatch = new Dispatch();
    }
    public function render()
    {
        return view('livewire.admin.dispatches.create', [
            'productDescriptions' => $this->readyToLoad ? ProductDescription::with('productItems')->get() : []
        ]);
    }
}
