<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Livewire\Component;

class Edit extends Component
{
    public Client $client;

    public function mount(Client $client)
    {
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
            'client.tax_status' => [
                'string',
                'nullable',
            ],
            'client.client_notes' => [
                'string',
                'nullable',
            ],
            'client.tax_code' => [
                'string',
                'nullable',
            ],
        ];
    }
}
