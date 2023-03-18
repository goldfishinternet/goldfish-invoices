<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'id'                    => 1,
                'company_name'          => 'Goldfish Interactive Limited',
                'address_1'             => '31 Pound Lane',
                'address_2'             => 'Topsham',
                'city'                  => 'Exeter',
                'region'              => 'Devon',
                'country'               => 'United Kingdom',
                'postcode'              => 'EX3 0NA',
                'website'               => 'www.goldfishinternet.com',
                'primary_contact'       => 'Andy Carroll',
                'primary_contact_email' => 'andy@goldfishinternet.com',
                'logo'                  => 'logo.gif',
                'logo_pdf'              => 'logo.gif',
                'invoice_note_default'  => '',
                'currency_type'         => 'NZD',
                'currency_symbol'       => '$',
                'tax_code'              => '',
                'tax_1_desc'             => 'VAT',
                'tax_1_rate'             => 20.00,
                'tax_2_desc'             => '',
                'tax_2_rate'             => 0.00,
                'save_invoices'         => true,
                'days_payment_due'      => 20,
                'demo_flag'             => false,
                'display_branding'      => false,
                'version'               => 0.0001,
            ],
        ];

        Setting::insert($settings);
    }
}
