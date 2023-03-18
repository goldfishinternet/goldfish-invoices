<?php

namespace App\Http\Livewire\InvoicePayment;

use Livewire\Component;
use App\Models\Invoice;
use App\Models\InvoicePayment;

class Show extends Component
{
    public Invoice $invoice;

    public $invoice_payment_id;
    public $invoice_id;
    public $date_paid;
    public $amount_paid;
    public $payment_note;

    public function mount($invoice)
    {
        $this->invoice_id = $invoice->id;
    }

    protected function rules()
    {
        return [
            'invoice_id' => 'required|numeric',
            'date_paid' => 'required|date_format:Y-m-d',
            'amount_paid' => 'required|numeric',
            'payment_note' => 'required|string',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveInvoicePayment()
    {
        $validatedData = $this->validate();

        InvoicePayment::create($validatedData);
        session()->flash('message','Invoice Payment Added Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-payment-modal');
    }

    public function editInvoicePayment(int $invoice_payment_id)
    {
        $invoicePayment = InvoicePayment::find($invoice_payment_id);
        if($invoicePayment){
            $this->invoice_payment_id = $invoicePayment->id;
            $this->invoice_id = $invoicePayment->invoice_id;
            $this->date_paid = $invoicePayment->date_paid;
            $this->amount_paid = $invoicePayment->amount_paid;
            $this->payment_note = $invoicePayment->payment_note;
        } else {
            return redirect()->to('/admin/invoices/');
        }
    }

    public function updateInvoicePayment()
    {
        $validatedData = $this->validate();
        InvoicePayment::where('id',$this->invoice_payment_id)->update([
            'invoice_id' => $validatedData['invoice_id'],
            'date_paid' => $validatedData['date_paid'],
            'amount_paid' => $validatedData['amount_paid'],
            'payment_note' => $validatedData['payment_note']
        ]);
        session()->flash('message','Invoice Payment Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-payment-modal');
    }

    public function deleteInvoicePayment(int $invoice_payment_id)
    {
        $this->invoice_payment_id = $invoice_payment_id;
    }

    public function destroyInvoicePayment()
    {
        InvoicePayment::find($this->invoice_payment_id)->delete();
        session()->flash('message','Invoice Payment Deleted Successfully');
        $this->dispatchBrowserEvent('close-payment-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->date_paid = '';
        $this->amount_paid = 0.00;
        $this->payment_note = '';
    }

    public function render()
    {
        $invoicePayments = InvoicePayment::where('invoice_id', '=', $this->invoice_id)->orderBy('id','ASC');
        return view('livewire.invoice-payment.show', ['invoicePayments' => $invoicePayments]);
    }
}
