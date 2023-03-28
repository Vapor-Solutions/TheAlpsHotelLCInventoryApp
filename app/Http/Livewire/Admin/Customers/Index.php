<?php

namespace App\Http\Livewire\Admin\Customers;

use App\Models\ActivityLog;
use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";
    // public $customers;

    protected $listeners = [
        'done' => 'render'
    ];


    public function delete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        $log = new ActivityLog();
        $log->user_id = auth()->user()->id;
        $log->payload = "Deleted customer No. <strong>$customer->id</strong> from the system";

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'payload' => "Created Customer No. " . $this->customer->id
        ]);
        $this->emit('done', [
            'success' => "Successfully Deleted the Customer `$customer->name` from the system"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.customers.index', [
            'customers' => Customer::orderBy('id', 'DESC')->paginate(6)
        ]);
    }
}
