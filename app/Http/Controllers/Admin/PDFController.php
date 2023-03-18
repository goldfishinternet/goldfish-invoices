<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Setting;
use Illuminate\Http\Request;
use PDF;
class PDFController extends Controller
{
    public function invoice($id){
      $invoice = Invoice::find($id);
      $setting = Setting::get()->last();

      $pdf = PDF::loadView('admin.invoice.pdf', compact('invoice', 'setting'));

      return $pdf->download('invoice.pdf');
    }
}
