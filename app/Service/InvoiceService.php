<?php

namespace App\Service;

use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;

class InvoiceService
{
    public function fullInvoiceById(int $invoice_id) {

        $amountsPaid = DB::table('invoice_payments')->select('invoice_id', DB::raw('SUM(invoice_payments.amount_paid) AS amount_paid'))->groupBy('invoice_id');
        $totalsNoTax = DB::table('invoice_items')->select('invoice_id', DB::raw('SUM(invoice_items.amount * invoice_items.quantity) AS total_no_tax'))->groupBy('invoice_id');
        $totalsTax1 = DB::table('invoice_items')->join('invoices', 'invoice_items.invoice_id', '=', 'invoices.id')->select('invoice_id', DB::raw('SUM(invoice_items.amount * invoice_items.quantity * invoices.tax_1_rate/100 * invoice_items.taxable) AS total_tax_1'))->groupBy('invoice_id');
        $totalsTax2 = DB::table('invoice_items')->join('invoices', 'invoice_items.invoice_id', '=', 'invoices.id')->select('invoice_id', DB::raw('SUM(invoice_items.amount * invoice_items.quantity * invoices.tax_2_rate/100 * invoice_items.taxable) AS total_tax_2'))->groupBy('invoice_id');
        $totalsWithTax = DB::table('invoice_items')->join('invoices', 'invoice_items.invoice_id', '=', 'invoices.id')->select('invoice_id', DB::raw('SUM(invoice_items.amount * invoice_items.quantity + ROUND((invoice_items.amount * invoice_items.quantity * (invoices.tax_1_rate/100 + invoices.tax_2_rate/100) * invoice_items.taxable), 2)) AS total_with_tax'))->groupBy('invoice_id');

        $invoice = DB::table('invoices')
            ->join('clients', 'clients.id', '=', 'invoices.client_id')
            ->joinSub($amountsPaid, 'amounts_paid', function (JoinClause $join) {
                $join->on('amounts_paid.invoice_id', '=', 'invoices.id');
            })
            ->joinSub($totalsNoTax, 'totals_no_tax', function (JoinClause $join) {
                $join->on('totals_no_tax.invoice_id', '=', 'invoices.id');
            })
            ->joinSub($totalsTax1, 'totals_tax_1', function (JoinClause $join) {
                $join->on('totals_tax_1.invoice_id', '=', 'invoices.id');
            })
            ->joinSub($totalsTax2, 'totals_tax_2', function (JoinClause $join) {
                $join->on('totals_tax_2.invoice_id', '=', 'invoices.id');
            })
            ->joinSub($totalsWithTax, 'totals_with_tax', function (JoinClause $join) {
                $join->on('totals_with_tax.invoice_id', '=', 'invoices.id');
            })
            ->select(
                'invoices.*',
                'clients.name',
                'clients.address_1',
                'clients.address_2',
                'clients.city',
                'clients.country',
                'clients.region',
                'clients.website',
                'clients.postcode',
                'clients.tax_code',
                DB::raw('ROUND(amounts_paid.amount_paid, 2) AS amount_paid'),
                DB::raw('TO_DAYS(curdate()) - TO_DAYS(invoices.date_issued) AS days_overdue'),
                DB::raw('ROUND(totals_no_tax.total_no_tax, 2) AS total_no_tax'),
                DB::raw('ROUND(totals_tax_1.total_tax_1, 2) AS total_tax_1'),
                DB::raw('ROUND(totals_tax_2.total_tax_2, 2) AS total_tax_2'),
                DB::raw('ROUND(totals_with_tax.total_with_tax, 2) AS total_with_tax')
            )
            ->where('invoices.id', $invoice_id)
            ->first();

        return $invoice;
    }
    public function fullInvoiceByNumber(string $invoice_number) {

        $amountsPaid = DB::table('invoice_payments')->select('invoice_id', DB::raw('SUM(invoice_payments.amount_paid) AS amount_paid'))->groupBy('invoice_id');
        $totalsNoTax = DB::table('invoice_items')->select('invoice_id', DB::raw('SUM(invoice_items.amount * invoice_items.quantity) AS total_no_tax'))->groupBy('invoice_id');
        $totalsTax1 = DB::table('invoice_items')->join('invoices', 'invoice_items.invoice_id', '=', 'invoices.id')->select('invoice_id', DB::raw('SUM(invoice_items.amount * invoice_items.quantity * invoices.tax_1_rate/100 * invoice_items.taxable) AS total_tax_1'))->groupBy('invoice_id');
        $totalsTax2 = DB::table('invoice_items')->join('invoices', 'invoice_items.invoice_id', '=', 'invoices.id')->select('invoice_id', DB::raw('SUM(invoice_items.amount * invoice_items.quantity * invoices.tax_2_rate/100 * invoice_items.taxable) AS total_tax_2'))->groupBy('invoice_id');
        $totalsWithTax = DB::table('invoice_items')->join('invoices', 'invoice_items.invoice_id', '=', 'invoices.id')->select('invoice_id', DB::raw('SUM(invoice_items.amount * invoice_items.quantity + ROUND((invoice_items.amount * invoice_items.quantity * (invoices.tax_1_rate/100 + invoices.tax_2_rate/100) * invoice_items.taxable), 2)) AS total_with_tax'))->groupBy('invoice_id');

        $invoice = DB::table('invoices')
            ->join('clients', 'clients.id', '=', 'invoices.client_id')
            ->joinSub($amountsPaid, 'amounts_paid', function (JoinClause $join) {
                $join->on('amounts_paid.invoice_id', '=', 'invoices.id');
            })
            ->joinSub($totalsNoTax, 'totals_no_tax', function (JoinClause $join) {
                $join->on('totals_no_tax.invoice_id', '=', 'invoices.id');
            })
            ->joinSub($totalsTax1, 'totals_tax_1', function (JoinClause $join) {
                $join->on('totals_tax_1.invoice_id', '=', 'invoices.id');
            })
            ->joinSub($totalsTax2, 'totals_tax_2', function (JoinClause $join) {
                $join->on('totals_tax_2.invoice_id', '=', 'invoices.id');
            })
            ->joinSub($totalsWithTax, 'totals_with_tax', function (JoinClause $join) {
                $join->on('totals_with_tax.invoice_id', '=', 'invoices.id');
            })
            ->select(
                'invoices.*',
                'clients.name',
                'clients.address_1',
                'clients.address_2',
                'clients.city',
                'clients.country',
                'clients.region',
                'clients.website',
                'clients.postcode',
                'clients.tax_code',
                DB::raw('ROUND(amounts_paid.amount_paid, 2) AS amount_paid'),
                DB::raw('TO_DAYS(curdate()) - TO_DAYS(invoices.date_issued) AS days_overdue'),
                DB::raw('ROUND(totals_no_tax.total_no_tax, 2) AS total_no_tax'),
                DB::raw('ROUND(totals_tax_1.total_tax_1, 2) AS total_tax_1'),
                DB::raw('ROUND(totals_tax_2.total_tax_2, 2) AS total_tax_2'),
                DB::raw('ROUND(totals_with_tax.total_with_tax, 2) AS total_with_tax')
            )
            ->where('invoices.invoice_number', $invoice_number)
            ->first();

        return $invoice;
    }
    public function fullInvoices($invoice_id='', $client_id='', $status='', $days_payment_due=30, $offset=0, $limit=0) {

        $amountsPaid = DB::table('invoice_payments')->select('invoice_id', DB::raw('SUM(invoice_payments.amount_paid) AS amount_paid'))->groupBy('invoice_id');
        $totalsNoTax = DB::table('invoice_items')->select('invoice_id', DB::raw('SUM(invoice_items.amount * invoice_items.quantity) AS total_no_tax'))->groupBy('invoice_id');
        $totalsTax1 = DB::table('invoice_items')->join('invoices', 'invoice_items.invoice_id', '=', 'invoices.id')->select('invoice_id', DB::raw('SUM(invoice_items.amount * invoice_items.quantity * invoices.tax_1_rate/100 * invoice_items.taxable) AS total_tax_1'))->groupBy('invoice_id');
        $totalsTax2 = DB::table('invoice_items')->join('invoices', 'invoice_items.invoice_id', '=', 'invoices.id')->select('invoice_id', DB::raw('SUM(invoice_items.amount * invoice_items.quantity * invoices.tax_2_rate/100 * invoice_items.taxable) AS total_tax_2'))->groupBy('invoice_id');
        $totalsWithTax = DB::table('invoice_items')->join('invoices', 'invoice_items.invoice_id', '=', 'invoices.id')->select('invoice_id', DB::raw('SUM(invoice_items.amount * invoice_items.quantity + ROUND((invoice_items.amount * invoice_items.quantity * (invoices.tax_1_rate/100 + invoices.tax_2_rate/100) * invoice_items.taxable), 2)) AS total_with_tax'))->groupBy('invoice_id');

        $invoices = DB::table('invoices');
        $invoices->join('clients', 'clients.id', '=', 'invoices.client_id');
        $invoices->joinSub($amountsPaid, 'amounts_paid', function (JoinClause $join) {
            $join->on('amounts_paid.invoice_id', '=', 'invoices.id');
        });
        $invoices->joinSub($totalsNoTax, 'totals_no_tax', function (JoinClause $join) {
            $join->on('totals_no_tax.invoice_id', '=', 'invoices.id');
        });
        $invoices->joinSub($totalsTax1, 'totals_tax_1', function (JoinClause $join) {
            $join->on('totals_tax_1.invoice_id', '=', 'invoices.id');
        });
        $invoices->joinSub($totalsTax2, 'totals_tax_2', function (JoinClause $join) {
            $join->on('totals_tax_2.invoice_id', '=', 'invoices.id');
        });
        $invoices->joinSub($totalsWithTax, 'totals_with_tax', function (JoinClause $join) {
            $join->on('totals_with_tax.invoice_id', '=', 'invoices.id');
        });
        $invoices->select(
            'invoices.*',
            'clients.name',
            'clients.address_1',
            'clients.address_2',
            'clients.city',
            'clients.country',
            'clients.region',
            'clients.website',
            'clients.postcode',
            'clients.tax_code',
            DB::raw('ROUND(amounts_paid.amount_paid, 2) AS amount_paid'),
            DB::raw('TO_DAYS(curdate()) - TO_DAYS(invoices.date_issued) AS days_overdue'),
            DB::raw('ROUND(totals_no_tax.total_no_tax, 2) AS total_no_tax'),
            DB::raw('ROUND(totals_tax_1.total_tax_1, 2) AS total_tax_1'),
            DB::raw('ROUND(totals_tax_2.total_tax_2, 2) AS total_tax_2'),
            DB::raw('ROUND(totals_with_tax.total_with_tax, 2) AS total_with_tax'),
        );
        $invoices->orderBy('invoices.date_issued', 'desc');
        $invoices->orderBy('invoices.invoice_number','desc');

        if (is_numeric($invoice_id))
		{
			$invoices->where('invoices.id', $invoice_id);
		}

		if (is_numeric($client_id))
		{
			$invoices->where('invoices.client_id', $client_id);
		}

		if ($status == 'overdue')
		{
			$invoices->havingRaw("days_overdue >= " . intval($days_payment_due) . " AND (ROUND(amounts_paid.amount_paid, 2) < ROUND(totals_with_tax.total_with_tax, 2) OR amounts_paid.amount_paid IS NULL)");
		}
		elseif ($status == 'open')
		{
			$invoices->havingRaw("(ROUND(amounts_paid.amount_paid, 2) < ROUND(totals_with_tax.total_with_tax, 2) OR amounts_paid.amount_paid IS NULL)");
		}
		elseif ($status == 'closed')
		{
			$invoices->havingRaw('ROUND(amounts_paid.amount_paid, 2) >= ROUND(totals_with_tax.total_with_tax, 2)');
		}
		elseif ($status == 'all')
		{
			$limit=0;
		}
        if (intval($limit) > 0) {
            $invoices->offset(intval($offset));
            $invoices->limit(intval($limit));
        }

        return $invoices->get();
    }
}
