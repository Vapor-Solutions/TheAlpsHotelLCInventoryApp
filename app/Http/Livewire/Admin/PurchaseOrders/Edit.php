<?php

namespace App\Http\Livewire\Admin\PurchaseOrders;

use App\Models\ActivityLog;
use App\Models\ProductDescription;
use App\Models\PurchaseOrder;
use Livewire\Component;

class Edit extends Component
{
    public $productDescriptions;

    public $productsList = [];
    public PurchaseOrder $order;

    protected $rules = [
        'order.supplier_id' => 'required',
    ];

    public $product_id, $quantity, $price;


    public function mount($id)
    {
        // $this->middleware('permission:Create Purchase Orders');
        $this->productDescriptions = ProductDescription::all();
        $this->order =  PurchaseOrder::find($id);
        foreach ($this->order->productDescriptions as $product) {
            array_push($this->productsList, [$product->id, $product->pivot->quantity]);
            // array_push($this->productsList, [intval($this->product_id), intval($this->quantity)]);
        }
    }

    public function addToCart()
    {
        $this->validate([
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        $count = 0;
        if ($this->productsList) {

            for ($i = 0; $i < count($this->productsList); $i++) {
                if (intval($this->productsList[$i][0]) == intval($this->product_id)) {
                    $this->productsList[$i][1] += intval($this->quantity);
                    $count++;
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


    public function makePurchaseOrder()
    {
        $id = $this->order->id;
        $this->validate();
        // $this->order->user_id = auth()->user()->id;
        $this->order->save();

        $this->order->productDescriptions()->detach();
        foreach ($this->productsList as $key => $item) {

            $this->order->productDescriptions()->attach($item[0], [
                'quantity' => $item[1]
            ]);
        }

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'payload' => "Edited Purchase Order No. " . $this->order->id
        ]);



        $this->reset('productsList');

        $this->emit('done', [
            'success' => 'Successfully Edited the Purchase Order No. #' . $this->order->id
        ]);
        $this->order = PurchaseOrder::find($id);
        foreach ($this->order->productDescriptions as $product) {
            array_push($this->productsList, [$product->id, $product->pivot->quantity]);
            // array_push($this->productsList, [intval($this->product_id), intval($this->quantity)]);
        }
    }
    public function render()
    {
        return view('livewire.admin.purchase-orders.edit');
    }
}
