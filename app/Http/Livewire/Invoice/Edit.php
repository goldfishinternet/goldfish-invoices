<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Invoice;
use App\Models\Client;
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
                'date_format:Y-m-d',// . config('project.date_format'),
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
        $this->listsForFields['client'] = Client::pluck('name', 'id')->toArray();
    }
}
