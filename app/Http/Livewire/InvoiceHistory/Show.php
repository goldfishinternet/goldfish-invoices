<?php

namespace App\Http\Livewire\InvoiceHistory;

use Livewire\Component;
use App\Models\Invoice;
use App\Models\InvoiceHistory;

class Show extends Component
{
    public Invoice $invoice;

    public $invoice_history_id;
    public $invoice_id;
    public $recipient;
    public $message;
    public $send;
    public $attach;
    public $date_sent;

    public function mount($invoice)
    {
        $this->invoice_id = $invoice->id;
    }

    protected function rules()
    {
        return [
            'invoice_id' => 'required|numeric',
            'recipient' => 'required|string',
            'message' => 'required|string',
            'send' => 'nullable|boolean',
            'attach' => 'nullable|boolean',
            'date_sent' => 'nullable|date_format:Y-m-d',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveInvoiceHistory()
    {
        $validatedData = $this->validate();

        InvoiceHistory::create($validatedData);
        session()->flash('message','Invoice History Added Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-history-modal');
    }

    public function editInvoiceHistory(int $invoice_history_id)
    {
        $invoiceHistory = InvoiceHistory::find($invoice_history_id);
        if($invoiceHistory){
            $this->invoice_history_id = $invoiceHistory->id;
            $this->invoice_id = $invoiceHistory->invoice_id;
            $this->recipient = $invoiceHistory->recipient;
            $this->message = $invoiceHistory->message;
            $this->date_sent = $invoiceHistory->date_sent;
            $this->send = $invoiceHistory->send;
            $this->attach = $invoiceHistory->attach;
        } else {
            return redirect()->to('/admin/invoices/');
        }
    }

    public function updateInvoiceHistory()
    {
        $validatedData = $this->validate();
        InvoiceHistory::where('id',$this->invoice_history_id)->update([
            'invoice_id' => $validatedData['invoice_id'],
            'recipient' => $validatedData['recipient'],
            'message' => $validatedData['message'],
            'date_sent' => $validatedData['date_sent'],
            'send' => $validatedData['send'],
            'attach' => $validatedData['attach']
        ]);
        session()->flash('message','Invoice Message Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-history-modal');
    }

    public function deleteInvoiceHistory(int $invoice_history_id)
    {
        $this->invoice_history_id = $invoice_history_id;
    }

    public function destroyInvoiceHistory()
    {
        InvoiceHistory::find($this->invoice_history_id)->delete();
        session()->flash('message','Invoice History Deleted Successfully');
        $this->dispatchBrowserEvent('close-history-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->recipient = '';
        $this->message = '';
        $this->send = null;
        $this->attach = null;
        $this->date_sent = '';
    }

    public function render()
    {
        $invoiceHistories = InvoiceHistory::where('invoice_id', '=', $this->invoice_id)->orderBy('id','ASC');
        return view('livewire.invoice-history.show', ['invoiceHistories' => $invoiceHistories]);
    }
}
