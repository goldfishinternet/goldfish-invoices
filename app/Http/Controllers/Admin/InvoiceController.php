<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Setting;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InvoiceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.invoice.index');
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice_number = (int)Invoice::max('invoice_number') + 1;

        $invoice = Invoice::create([
            'client_id' => null,
            'invoice_number' => $invoice_number,
            'date_issued' => date('d/m/Y'),
        ]);

        return view('admin.invoice.edit', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.invoice.edit', compact('invoice'));
    }

    public function show(Invoice $invoice)
    {
        abort_if(Gate::denies('invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting = Setting::get()->last();

        return view('admin.invoice.show', compact('invoice','setting'));
    }
}
