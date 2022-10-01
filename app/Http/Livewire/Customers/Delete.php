<?php

namespace App\Http\Livewire\Customers;

use App\Models\Customer;
use Livewire\Component;
use App\Events\UserLog;

class Delete extends Component
{
    public $customerId;
    public function getCustomerProperty(){
        return Customer::select ('id','name', 'address', 'model')
        ->find($this->customerId);
    }

    public function delete(){
        $this->customer->delete();

        $log_entry = 'Deleted student "' . $this->customer->name . 'with the ID#' . $this->customer->id;
        event(new UserLog($log_entry));
        return redirect('/index')->with('message', 'Deleted Successfully');
    }

    public function back(){
        return redirect('/index');
    }

    public function render()
    {
        return view('livewire.customers.delete');
    }
}
