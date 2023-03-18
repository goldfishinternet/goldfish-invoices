<?php

namespace App\Http\Livewire\ClientContact;

use App\Models\Client;
use App\Models\ClientContact;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public ClientContact $clientContact;

    public function mount(ClientContact $clientContact)
    {
        $this->clientContact = $clientContact;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.client-contact.form');
    }

    public function submit()
    {
        $this->validate();

        $this->clientContact->save();

        return redirect()->route('admin.client-contacts.index');
    }

    protected function rules(): array
    {
        return [
            'clientContact.client_id' => [
                'integer',
                'exists:clients,id',
                'required',
            ],
            'clientContact.first_name' => [
                'string',
                'nullable',
            ],
            'clientContact.last_name' => [
                'string',
                'nullable',
            ],
            'clientContact.email' => [
                'string',
                'nullable',
            ],
            'clientContact.phone' => [
                'string',
                'nullable',
            ],
            'clientContact.mobile' => [
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
