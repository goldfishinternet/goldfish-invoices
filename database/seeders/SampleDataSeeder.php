<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\ClientContact;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\InvoicePayment;
use App\Models\User;
use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    public function run()
    {
        // Create invoice
        $client = Client::create([
            'name' => 'Client Name',
            'address_1' => 'Billing Address 1',
            'address_2' => 'Billing Address 2',
            'city' => 'Billing City',
            'region' => 'Billing Region',
            'country' => 'Billing Country',
            'postcode' => 'Postcode',
            'email' => 'client@example.com',
            'website' => 'www.example.com',
            'tax_code' => 'ABC123',
            'tax_status' => 1,
            'client_notes' => 'Client Notes...',
            'default_tax_1_desc' => 'Federal Tax',
            'default_tax_1_rate' => '5.00',
            'default_tax_2_desc' => 'State Tax',
            'default_tax_2_rate' => '5.00',
            'default_days_payment_due' => '30',
            'default_payment_instructions' => 'Payment instructions here...',
            'default_invoice_notes' => 'Invoice notes here...',
        ]);


        // Create invoice
        $clientContact = ClientContact::create([
            'client_id' => $client->id,
            'title' => 'Mr',
            'first_name' => 'Firstname',
            'last_name' => 'Lastname',
            'email' => 'contact@example.com',
            'phone' => '+44 123 45678',
            'mobile' => '+44 123 87654',
        ]);

        // Create invoice
        $invoice = Invoice::create([
            'client_id' => $client->id,
            'invoice_number' => 100005,
            'date_issued' => now(),
            'days_payment_due' => 30,
            'tax_1_desc' => 'VAT',
            'tax_1_rate' => 20.00,
            'tax_2_desc' => '',
            'tax_2_rate' => 0.00,
            'payment_instructions' => 'Payment instructions here...',
            'invoice_notes' => 'Invoice notes here...',
        ]);

        // Create invoice
        InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'amount' => 10.00,
            'quantity' => 3,
            'work_description' => 'Test invoice item 1',
            'taxable' => true,
        ]);
        InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'amount' => 20.00,
            'quantity' => 2,
            'work_description' => 'Test invoice item 2',
            'taxable' => true,
        ]);
        InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'amount' => 30.00,
            'quantity' => 1,
            'work_description' => 'Test invoice item 3',
            'taxable' => true,
        ]);

        InvoicePayment::create([
            'invoice_id' => $invoice->id,
            'date_paid' => now(),
            'amount_paid' => 50.00,
            'payment_note' => '50 Payment',
        ]);

        InvoicePayment::create([
            'invoice_id' => $invoice->id,
            'date_paid' => now(),
            'amount_paid' => 50.00,
            'payment_note' => '50 Payment',
        ]);

        InvoicePayment::create([
            'invoice_id' => $invoice->id,
            'date_paid' => now(),
            'amount_paid' => 20.00,
            'payment_note' => '20 Payment',
        ]);
    }
}
