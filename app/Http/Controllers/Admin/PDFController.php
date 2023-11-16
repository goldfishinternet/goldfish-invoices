<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;

class PDFController extends Controller
{
    public function invoice($id){
      $invoice = Invoice::find($id);
      $setting = Setting::get()->last();

      $pdf = PDF::loadView('admin.invoice.pdf', compact('invoice', 'setting'));

      return $pdf->download(Str::slug($setting->name, '-') . '-invoice-' . $invoice->invoice_number . '-' . Str::slug($invoice->client->name, '-') . '.pdf');
    }
}
