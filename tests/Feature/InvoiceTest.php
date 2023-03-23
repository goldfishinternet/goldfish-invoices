<?php

namespace Tests\Feature;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\InvoicePayment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_taxable_invoice_with_tax1_and_tax2()
    {
        // Create invoice
        $invoice = Invoice::create([
            'id' => 1,
            'client_id' => null,
            'invoice_number' => 1,
            'date_issued' => now(),
            'payment_term' => '30 days',
            'tax_1_desc' => 'TAX1',
            'tax_1_rate' => 15.00,
            'tax_2_desc' => 'TAX2',
            'tax_2_rate' => 5.00,
            'invoice_note' => 'Test invoice',
            'days_payment_due' => 30,
        ]);

        // Create invoice
        InvoiceItem::create([
            'id' => 1,
            'invoice_id' => 1,
            'amount' => 10.00,
            'quantity' => 3,
            'work_description' => 'Test invoice item 1',
            'taxable' => true,
        ]);
        InvoiceItem::create([
            'id' => 2,
            'invoice_id' => 1,
            'amount' => 20.00,
            'quantity' => 2,
            'work_description' => 'Test invoice item 2',
            'taxable' => true,
        ]);
        InvoiceItem::create([
            'id' => 3,
            'invoice_id' => 1,
            'amount' => 30.00,
            'quantity' => 1,
            'work_description' => 'Test invoice item 3',
            'taxable' => true,
        ]);

        // Check Sub Total
        $this->assertEquals($invoice->total_no_tax, 100.00);

        // Check Tax 1 Total
        $this->assertEquals($invoice->total_tax_1, 15.00);

        // Check Tax 2 Total
        $this->assertEquals($invoice->total_tax_2, 5.00);

        // Check Total
        $this->assertEquals($invoice->total_with_tax, 120.00);

        // Check Payment Status
        $this->assertEquals($invoice->payment_status, 'Pending');

        // Check Days Overdue
        $this->assertEquals($invoice->days_overdue, 0);

    }

    public function test_non_taxable_overdue_invoice_with_tax1_and_tax2()
    {
        // Create invoice
        $invoice = Invoice::create([
            'id' => 2,
            'client_id' => null,
            'invoice_number' => 2,
            'date_issued' => strtotime('31 days ago'),
            'payment_term' => '30 days',
            'tax_1_desc' => 'TAX1',
            'tax_1_rate' => 15.00,
            'tax_2_desc' => 'TAX2',
            'tax_2_rate' => 5.00,
            'invoice_note' => 'Test invoice',
            'days_payment_due' => 30,
        ]);

        // Create invoice
        InvoiceItem::create([
            'id' => 4,
            'invoice_id' => 2,
            'amount' => 10.00,
            'quantity' => 3,
            'work_description' => 'Test invoice item 1',
            'taxable' => false,
        ]);
        InvoiceItem::create([
            'id' => 5,
            'invoice_id' => 2,
            'amount' => 20.00,
            'quantity' => 2,
            'work_description' => 'Test invoice item 2',
            'taxable' => false,
        ]);
        InvoiceItem::create([
            'id' => 6,
            'invoice_id' => 2,
            'amount' => 30.00,
            'quantity' => 1,
            'work_description' => 'Test invoice item 3',
            'taxable' => false,
        ]);

        // Check Sub Total
        $this->assertEquals($invoice->total_no_tax, 100.00);

        // Check Tax 1 Total
        $this->assertEquals($invoice->total_tax_1, 0.00);

        // Check Tax 2 Total
        $this->assertEquals($invoice->total_tax_2, 0.00);

        // Check Total
        $this->assertEquals($invoice->total_with_tax, 100.00);

        // Check Payment Status
        $this->assertEquals($invoice->payment_status, 'Overdue');

        // Check Days Overdue
        $this->assertEquals($invoice->days_overdue, 1);

    }

    public function test_taxable_invoice_with_tax1()
    {
        // Create invoice
        $invoice = Invoice::create([
            'id' => 3,
            'client_id' => null,
            'invoice_number' => 3,
            'date_issued' => now(),
            'payment_term' => '30 days',
            'tax_1_desc' => 'TAX1',
            'tax_1_rate' => 15.00,
            'tax_2_desc' => '',
            'tax_2_rate' => 0.00,
            'invoice_note' => 'Test invoice',
            'days_payment_due' => 30,
        ]);

        // Create invoice
        InvoiceItem::create([
            'id' => 7,
            'invoice_id' => 3,
            'amount' => 10.00,
            'quantity' => 3,
            'work_description' => 'Test invoice item 1',
            'taxable' => true,
        ]);
        InvoiceItem::create([
            'id' => 8,
            'invoice_id' => 3,
            'amount' => 20.00,
            'quantity' => 2,
            'work_description' => 'Test invoice item 2',
            'taxable' => true,
        ]);
        InvoiceItem::create([
            'id' => 9,
            'invoice_id' => 3,
            'amount' => 30.00,
            'quantity' => 1,
            'work_description' => 'Test invoice item 3',
            'taxable' => true,
        ]);

        // Check Sub Total
        $this->assertEquals($invoice->total_no_tax, 100.00);

        // Check Tax 1 Total
        $this->assertEquals($invoice->total_tax_1, 15.00);

        // Check Tax 2 Total
        $this->assertEquals($invoice->total_tax_2, 0.00);

        // Check Total
        $this->assertEquals($invoice->total_with_tax, 115.00);

        // Check Payment Status
        $this->assertEquals($invoice->payment_status, 'Pending');

    }

    public function test_non_taxable_invoice_with_tax1()
    {
        // Create invoice
        $invoice = Invoice::create([
            'id' => 4,
            'client_id' => null,
            'invoice_number' => 4,
            'date_issued' => now(),
            'payment_term' => '30 days',
            'tax_1_desc' => 'TAX1',
            'tax_1_rate' => 15.00,
            'tax_2_desc' => '',
            'tax_2_rate' => 0.00,
            'invoice_note' => 'Test invoice',
            'days_payment_due' => 30,
        ]);

        // Create invoice
        InvoiceItem::create([
            'id' => 10,
            'invoice_id' => 4,
            'amount' => 10.00,
            'quantity' => 3,
            'work_description' => 'Test invoice item 1',
            'taxable' => false,
        ]);
        InvoiceItem::create([
            'id' => 11,
            'invoice_id' => 4,
            'amount' => 20.00,
            'quantity' => 2,
            'work_description' => 'Test invoice item 2',
            'taxable' => false,
        ]);
        InvoiceItem::create([
            'id' => 12,
            'invoice_id' => 4,
            'amount' => 30.00,
            'quantity' => 1,
            'work_description' => 'Test invoice item 3',
            'taxable' => false,
        ]);

        // Check Sub Total
        $this->assertEquals($invoice->total_no_tax, 100.00);

        // Check Tax 1 Total
        $this->assertEquals($invoice->total_tax_1, 0.00);

        // Check Tax 2 Total
        $this->assertEquals($invoice->total_tax_2, 0.00);

        // Check Total
        $this->assertEquals($invoice->total_with_tax, 100.00);

        // Check Payment Status
        $this->assertEquals($invoice->payment_status, 'Pending');

        // Check Days Overdue
        $this->assertEquals($invoice->days_overdue, 0);
    }

    public function test_paid_invoice()
    {
        // Create invoice
        $invoice = Invoice::create([
            'id' => 5,
            'client_id' => null,
            'invoice_number' => 5,
            'date_issued' => now(),
            'payment_term' => '30 days',
            'tax_1_desc' => 'TAX1',
            'tax_1_rate' => 15.00,
            'tax_2_desc' => '',
            'tax_2_rate' => 0.00,
            'invoice_note' => 'Test invoice',
            'days_payment_due' => 30,
        ]);

        // Create invoice
        InvoiceItem::create([
            'id' => 13,
            'invoice_id' => 5,
            'amount' => 10.00,
            'quantity' => 3,
            'work_description' => 'Test invoice item 1',
            'taxable' => true,
        ]);
        InvoiceItem::create([
            'id' => 14,
            'invoice_id' => 5,
            'amount' => 20.00,
            'quantity' => 2,
            'work_description' => 'Test invoice item 2',
            'taxable' => true,
        ]);
        InvoiceItem::create([
            'id' => 15,
            'invoice_id' => 5,
            'amount' => 30.00,
            'quantity' => 1,
            'work_description' => 'Test invoice item 3',
            'taxable' => true,
        ]);

        InvoicePayment::create([
            'id' => 1,
            'invoice_id' => 5,
            'date_paid' => now(),
            'amount_paid' => 115.00,
            'payment_note' => 'Payment in full',
            'taxable' => true,
        ]);

        // Check Sub Total
        $this->assertEquals($invoice->total_no_tax, 100.00);

        // Check Tax 1 Total
        $this->assertEquals($invoice->total_tax_1, 15.00);

        // Check Tax 2 Total
        $this->assertEquals($invoice->total_tax_2, 0.00);

        // Check Total
        $this->assertEquals($invoice->total_with_tax,115.00);

        // Check Amount Paid
        $this->assertEquals($invoice->amount_paid, 115);

        // Check Amount Outstanding
        $this->assertEquals($invoice->amount_outstanding, 0.00);

        // Check Payment Status
        $this->assertEquals($invoice->payment_status, 'Paid');

        // Check Days Overdue
        $this->assertEquals($invoice->days_overdue, 0);
    }

    public function test_partially_paid_invoice()
    {
        // Create invoice
        $invoice = Invoice::create([
            'id' => 6,
            'client_id' => null,
            'invoice_number' => 6,
            'date_issued' => strtotime('31 days ago'),
            'payment_term' => '30 days',
            'tax_1_desc' => 'TAX1',
            'tax_1_rate' => 15.00,
            'tax_2_desc' => '',
            'tax_2_rate' => 0.00,
            'invoice_note' => 'Test invoice',
            'days_payment_due' => 30,
        ]);

        // Create invoice
        InvoiceItem::create([
            'id' => 16,
            'invoice_id' => 6,
            'amount' => 10.00,
            'quantity' => 3,
            'work_description' => 'Test invoice item 1',
            'taxable' => true,
        ]);
        InvoiceItem::create([
            'id' => 17,
            'invoice_id' => 6,
            'amount' => 20.00,
            'quantity' => 2,
            'work_description' => 'Test invoice item 2',
            'taxable' => true,
        ]);
        InvoiceItem::create([
            'id' => 18,
            'invoice_id' => 6,
            'amount' => 30.00,
            'quantity' => 1,
            'work_description' => 'Test invoice item 3',
            'taxable' => true,
        ]);

        InvoicePayment::create([
            'id' => 1,
            'invoice_id' => 6,
            'date_paid' => now(),
            'amount_paid' => 50.00,
            'payment_note' => '50 Payment',
            'taxable' => true,
        ]);

        InvoicePayment::create([
            'id' => 2,
            'invoice_id' => 6,
            'date_paid' => now(),
            'amount_paid' => 50.00,
            'payment_note' => '50 Payment',
            'taxable' => true,
        ]);

        // Check Sub Total
        $this->assertEquals($invoice->total_no_tax, 100.00);

        // Check Tax 1 Total
        $this->assertEquals($invoice->total_tax_1, 15.00);

        // Check Tax 2 Total
        $this->assertEquals($invoice->total_tax_2, 0.00);

        // Check Total
        $this->assertEquals($invoice->total_with_tax,115.00);

        // Check Amount Paid
        $this->assertEquals($invoice->amount_paid, 100);

        // Check Amount Outstanding
        $this->assertEquals($invoice->amount_outstanding, 15.00);

        // Check Payment Status
        $this->assertEquals($invoice->payment_status, 'Overdue');

        // Check Days Overdue
        $this->assertEquals($invoice->days_overdue, 1);
    }
}
