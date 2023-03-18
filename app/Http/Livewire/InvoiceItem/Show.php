<?php

namespace App\Http\Livewire\InvoiceItem;

use Livewire\Component;
use App\Models\Invoice;
use App\Models\InvoiceItem;

class Show extends Component
{
    public Invoice $invoice;

    public $invoice_item_id;
    public $invoice_id;
    public $amount;
    public $quantity;
    public $work_description;
    public $taxable;

    public function mount($invoice)
    {
        $this->invoice_id = $invoice->id;
    }

    protected function rules()
    {
        return [
            'invoice_id' => 'required|numeric',
            'amount' => 'required|string',
            'quantity' => 'required|numeric',
            'work_description' => 'required|string',
            'taxable' => 'nullable|boolean',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveInvoiceItem()
    {
        $validatedData = $this->validate();

        InvoiceItem::create($validatedData);
        session()->flash('message','Invoice Item Added Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-item-modal');
    }

    public function editInvoiceItem(int $invoice_item_id)
    {
        $invoiceItem = InvoiceItem::find($invoice_item_id);
        if($invoiceItem){
            $this->invoice_item_id = $invoiceItem->id;
            $this->amount = $invoiceItem->amount;
            $this->quantity = $invoiceItem->quantity;
            $this->work_description = $invoiceItem->work_description;
            $this->taxable = $invoiceItem->taxable;
        } else {
            return redirect()->to('/admin/invoices/');
        }
    }

    public function updateInvoiceItem()
    {
        $validatedData = $this->validate();
        InvoiceItem::where('id',$this->invoice_item_id)->update([
            'invoice_id' => $validatedData['invoice_id'],
            'amount' => $validatedData['amount'],
            'quantity' => $validatedData['quantity'],
            'work_description' => $validatedData['work_description'],
            'taxable' => $validatedData['taxable']
        ]);
        session()->flash('message','Invoice Item Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-item-modal');
    }

    public function deleteInvoiceItem(int $invoice_item_id)
    {
        $this->invoice_item_id = $invoice_item_id;
    }

    public function destroyInvoiceItem()
    {
        InvoiceItem::find($this->invoice_item_id)->delete();
        session()->flash('message','Invoice Item Deleted Successfully');
        $this->dispatchBrowserEvent('close-item-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->amount = 0.00;
        $this->quantity = 1;
        $this->work_description = '';
        $this->taxable = 1;
    }

    public function render()
    {
        $invoiceItems = InvoiceItem::where('invoice_id', '=', $this->invoice_id)->orderBy('id','ASC');
        return view('livewire.invoice-item.show', ['invoiceItems' => $invoiceItems]);
    }
}
