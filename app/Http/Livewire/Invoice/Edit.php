<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Invoice;
use App\Models\Client;
use App\Models\Place;
use Livewire\Component;

class Edit extends Component
{
    public Invoice $invoice;
    public array $listsForFields = [];

    public function mount(Invoice $invoice)
    {
        $this->invoice = $invoice;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.invoice.form');
    }

    public function submit()
    {
        $this->validate();

        $this->invoice->save();

        return redirect()->route('admin.invoices.index');
    }

    public function changeClient() {

        $client = Client::find($this->invoice->client_id);
        if(!$client) {
            return;
        }
        if($this->invoice->tax_1_rate=='') {
            $this->invoice->tax_1_rate = $client->default_tax_1_rate;
        }
        if($this->invoice->tax_1_desc=='') {
            $this->invoice->tax_1_desc = $client->default_tax_1_desc;
        }
        if($this->invoice->tax_2_rate=='') {
            $this->invoice->tax_2_rate = $client->default_tax_2_rate;
        }
        if($this->invoice->tax_2_desc=='') {
            $this->invoice->tax_2_desc = $client->default_tax_2_desc;
        }
        if($this->invoice->days_payment_due=='') {
            $this->invoice->days_payment_due = $client->default_days_payment_due;
        }
        if($this->invoice->payment_instructions=='') {
            $this->invoice->payment_instructions = $client->default_payment_instructions;
        }
        if($this->invoice->invoice_notes=='') {
            $this->invoice->invoice_notes = $client->default_invoice_notes;
        }
    }

    protected function rules(): array
    {
        return [
            'invoice.invoice_number' => [
                'integer',
                'integer',
            ],
            'invoice.client_id' => [
                'integer',
                'exists:clients,id',
                'nullable',
            ],
            'invoice.date_issued' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'invoice.days_payment_due' => [
                'integer',
                'nullable',
            ],
            'invoice.tax_1_desc' => [
                'string',
                'nullable',
            ],
            'invoice.tax_1_rate' => [
                'string',
                'nullable',
            ],
            'invoice.tax_2_desc' => [
                'string',
                'nullable',
            ],
            'invoice.tax_2_rate' => [
                'string',
                'nullable',
            ],
            'invoice.payment_instructions' => [
                'string',
                'nullable',
            ],
            'invoice.invoice_notes' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        //$this->listsForFields['client'] = Client::pluck('name', 'id')->toArray();
        $clients = Client::orderBy('name','asc')->get(['id','name']);
        $this->listsForFields['client'] = $clients;
    }
}
