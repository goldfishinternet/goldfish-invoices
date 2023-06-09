<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use App\Models\Setting;
use Livewire\Component;

class Create extends Component
{
    public Setting $setting;
    public Client $client;

    public function mount(Client $client)
    {
        $setting = Setting::get()->last();
        $client->default_tax_1_desc = $setting->default_tax_1_desc;
        $client->default_tax_1_rate = $setting->default_tax_1_rate;
        $client->default_tax_2_desc = $setting->default_tax_2_desc;
        $client->default_tax_2_rate = $setting->default_tax_2_rate;
        $client->default_days_payment_due = $setting->default_days_payment_due;
        $client->default_payment_instructions = $setting->default_payment_instructions;
        $client->default_invoice_notes = $setting->default_invoice_notes;
        $this->client = $client;
    }

    public function render()
    {
        return view('livewire.client.form');
    }

    public function submit()
    {
        $this->validate();

        $this->client->save();

        return redirect()->route('admin.clients.index');
    }

    protected function rules(): array
    {
        return [
            'client.name' => [
                'string',
                'nullable',
            ],
            'client.address_1' => [
                'string',
                'nullable',
            ],
            'client.address_2' => [
                'string',
                'nullable',
            ],
            'client.city' => [
                'string',
                'nullable',
            ],
            'client.region' => [
                'string',
                'nullable',
            ],
            'client.country' => [
                'string',
                'nullable',
            ],
            'client.postcode' => [
                'string',
                'nullable',
            ],
            'client.website' => [
                'string',
                'nullable',
            ],
            'client.email' => [
                'string',
                'nullable',
            ],
            'client.tax_code' => [
                'string',
                'nullable',
            ],
            'client.tax_status' => [
                'boolean',
                'nullable',
            ],
            'client.client_notes' => [
                'string',
                'nullable',
            ],
            'client.default_tax_1_desc' => [
                'string',
                'nullable',
            ],
            'client.default_tax_1_rate' => [
                'decimal:2',
                'nullable',
            ],
            'client.default_tax_2_desc' => [
                'string',
                'nullable',
            ],
            'client.default_tax_2_rate' => [
                'decimal:2',
                'nullable',
            ],
            'client.default_days_payment_due' => [
                'integer',
                'required',
            ],
            'client.default_payment_instructions' => [
                'string',
                'nullable',
            ],
            'client.default_invoice_notes' => [
                'string',
                'nullable',
            ],
        ];
    }
}
