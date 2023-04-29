<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Setting $setting;
    public $logo;

    public function mount(Setting $setting)
    {
        $this->setting = $setting;
        //$this->logo = $setting->logo;
    }

    public function render()
    {
        return view('livewire.setting.form');
    }

    public function updatedLogo()
    {
        $this->validate([
            'logo' => [
                'image',
                'max:1024',
                'mimes:jpg,jpeg,png,svg,gif',
                'nullable',
            ],
        ]);
    }

    public function submit()
    {
        //dd($_FILES);

        $this->validate();

        if ($this->logo) {
            $this->setting->logo = $this->logo->store('logos');
        }

        $this->setting->save();

        return redirect()->route('admin.settings.edit');
    }

    public function removeLogo() {
        $this->setting->logo = null;
        $this->setting->save();
    }

    protected function rules(): array
    {
        return [
            'setting.name' => [
                'string',
                'required',
            ],
            'setting.address_1' => [
                'string',
                'required',
            ],
            'setting.address_2' => [
                'string',
                'nullable',
            ],
            'setting.city' => [
                'string',
                'required',
            ],
            'setting.region' => [
                'string',
                'required',
            ],
            'setting.country' => [
                'string',
                'required',
            ],
            'setting.postcode' => [
                'string',
                'required',
            ],
            'setting.website' => [
                'string',
                'nullable',
            ],
            'setting.phone' => [
                'string',
                'required',
            ],
            'setting.mobile' => [
                'string',
                'nullable',
            ],
            'setting.primary_contact' => [
                'string',
                'required',
            ],
            'setting.primary_contact_email' => [
                'string',
                'required',
            ],
            'setting.currency_type' => [
                'string',
                'required',
            ],
            'setting.currency_symbol' => [
                'string',
                'required',
            ],
            'setting.tax_code' => [
                'string',
                'nullable',
            ],
            'setting.default_tax_1_desc' => [
                'string',
                'nullable',
            ],
            'setting.default_tax_1_rate' => [
                'decimal:2',
                'nullable',
            ],
            'setting.default_tax_2_desc' => [
                'string',
                'nullable',
            ],
            'setting.default_tax_2_rate' => [
                'decimal:2',
                'nullable',
            ],
            'setting.default_days_payment_due' => [
                'integer',
                'required',
            ],
            'setting.default_invoice_notes' => [
                'string',
                'nullable',
            ],
            'setting.default_payment_instructions' => [
                'string',
                'nullable',
            ],
        ];
    }
}
