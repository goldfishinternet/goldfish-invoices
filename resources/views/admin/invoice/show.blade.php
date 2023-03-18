@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('global.view') }}
            {{ trans('cruds.invoice.title_singular') }}:
            {{ trans('cruds.invoice.fields.id') }}
            {{ $invoice->id }}
        </h4>
    </div>
    <div class="card-body">



        <table class="table table-view">
        <tbody class="bg-white">
        <tr>
            <th>
                {{ trans('cruds.invoice.fields.id') }}
            </th>
            <td>
                {{ $invoice->id }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.invoice.fields.invoice_number') }}
            </th>
            <td>
                {{ $invoice->invoice_number }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.invoice.fields.date_issued') }}
            </th>
            <td>
                {{ $invoice->date_issued }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.invoice.fields.client_name') }}
            </th>
            <td>
                {{ ($invoice->client!=null)? $invoice->client->name: '' }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.invoice.fields.payment_term') }}
            </th>
            <td>
                {{ $invoice->payment_term }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.invoice.fields.tax_desc') }}
            </th>
            <td>
                {{ $invoice->tax_1_desc }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.invoice.fields.tax_rate') }}
            </th>
            <td>
                {{ $invoice->tax_1_rate }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.invoice.fields.tax_desc') }}
            </th>
            <td>
                {{ $invoice->tax_2_desc }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.invoice.fields.tax_rate') }}
            </th>
            <td>
                {{ $invoice->tax_2_rate }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.invoice.fields.invoice_note') }}
            </th>
            <td>
                {{ $invoice->invoice_note }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.invoice.fields.days_payment_due') }}
            </th>
            <td>
                {{ $invoice->days_payment_due }}
            </td>
        </tr>
        </tbody>
        </table>


        <table class="table table-bordered table-striped table-hover datatable datatable-InvoiceItems">
        <thead>
        <tr>
            <th>id</th>
            <th>quantity</th>
            <th>amount</th>
            <th>taxable</th>
            <th>work_description</th>
        </tr>
        </thead>
        <tbody>
            @foreach($invoice->invoiceItems as $key => $invoiceItem)
            <tr>
                <td>
                    {{ $invoiceItem->id }}
                </td>
                <td>
                    {{ $invoiceItem->quantity }}
                </td>
                <td>
                    {{ $invoiceItem->amount }}
                </td>
                <td>
                    {{ $invoiceItem->taxable }}
                </td>
                <td>
                    {{ $invoiceItem->work_description ?? '' }}
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>



        <table class="table table-bordered table-striped table-hover datatable datatable-InvoicePayments">
        <thead>
        <tr>
            <th>id</th>
            <th>date_paid</th>
            <th>amount_paid</th>
            <th>payment_note</th>
        </tr>
        </thead>
        <tbody>
            @foreach($invoice->invoicePayments as $key => $invoicePayment)
            <tr>
                <td>
                    {{ $invoicePayment->id }}
                </td>
                <td>
                    {{ $invoicePayment->date_paid }}
                </td>
                <td>
                    {{ $invoicePayment->amount_paid }}
                </td>
                <td>
                    {{ $invoicePayment->payment_note ?? '' }}
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>



        <table class="table table-bordered table-striped table-hover datatable datatable-InvoicePayments">
        <thead>
        <tr>
            <th>id</th>
            <th>date_sent</th>
            <th>email_body</th>
        </tr>
        </thead>
        <tbody>
            @foreach($invoice->invoiceHistories as $key => $invoiceHistory)
            <tr>
                <td>
                    {{ $invoiceHistory->id }}
                </td>
                <td>
                    {{ $invoiceHistory->date_sent }}
                </td>
                <td>
                    {{ $invoiceHistory->email_body }}
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>


        <div class="form-group">
            @can('invoice_edit')
                <a href="{{ route('admin.invoices.edit', $invoice) }}" class="btn btn-primary mx-1">
                    {{ trans('global.edit') }}
                </a>
            @endcan
            <a href="{{ route('admin.invoices.index') }}" class="btn btn-secondary">
                {{ trans('global.back') }}
            </a>
        </div>
    </div>
</div>
@endsection
