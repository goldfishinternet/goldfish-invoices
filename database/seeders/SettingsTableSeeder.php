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
                'id'                            => 1,
                'name'                          => 'Your Company Name',
                'address_1'                     => 'Address 1',
                'address_2'                     => 'Address 2',
                'city'                          => 'City',
                'region'                        => 'Region',
                'country'                       => 'Country',
                'postcode'                      => 'Postcode',
                'website'                       => 'www.domain.com',
                'primary_contact'               => 'Firstname Lastname',
                'primary_contact_email'         => 'name@domain.com',
                'logo'                          => '',
                'currency_type'                 => 'GBP',
                'currency_symbol'               => '£',
                'tax_code'                      => '',
                'default_tax_1_desc'            => 'VAT',
                'default_tax_1_rate'            => '20.00',
                'default_tax_2_desc'            => '',
                'default_tax_2_rate'            => '0.00',
                'default_days_payment_due'      => 30,
                'default_payment_instructions'  => 'Payment instructions here...',
                'default_invoice_notes'         => 'Invoice notes here...',
            ],
        ];

        Setting::insert($settings);
    }
}
