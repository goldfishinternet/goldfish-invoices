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

        <div class="row mb-3">
            <div class="col-12">
                <div class="bg-dark p-3">
                    @if($setting->logo!='')
                        <img src="{{ asset('storage/'.$setting->logo) }}" height="80" alt="{{ $setting->name }}">
                    @else
                        <h1 class="text-white">{{ $setting->name }}</h1>
                    @endif
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <h3>{{ trans('cruds.invoice.title_singular') }}</h3>
                <p>
                    <strong>{{ trans('cruds.invoice.labels.invoice_no') }}:</strong> {{ $invoice->invoice_number }}<br/>
                    <strong>{{ trans('cruds.invoice.labels.issue_date') }}:</strong> {{ date('d/m/Y', strtotime($invoice->date_issued)) }}
                </p>
            </div>
            <div class="col-12 col-md-6">
                <h3>{{ $setting->name }}</h3>
                <p>
                    @if($setting->address_1 != '') {{ $setting->address_1 }}, <br>@endif
                    @if($setting->address_2 != '') {{ $setting->address_2 }}, <br>@endif
                    @if($setting->city != '') {{ $setting->city }}, <br />@endif
                    @if($setting->country != '') {{ $setting->country }}, <br>@endif
                    @if($setting->postcode != '') {{ $setting->postcode }} @endif
                </p>
                <p>
                    @if($setting->phone != '') Telephone: {{ $setting->phone }} <br>@endif
                    @if($setting->mobile != '') Mobile: {{ $setting->mobile }} <br>@endif
                    @if($setting->primary_contact_email != '') Email: {{ $setting->primary_contact_email }} <br>@endif
                    @if($setting->website != '') Web: {{ $setting->website }} <br>@endif
                    @if($setting->tax_code != '') Tax Ref: {{ $setting->tax_code }} <br>@endif
                </p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <h3>{{ trans('cruds.invoice.labels.invoice_to') }} {{ $invoice->client->name }}</h3>
                <p>
                    @if($invoice->client->address_1 != ''){{ $invoice->client->address_1 }},@endif
                    @if($invoice->client->address_2 != ''){{ $invoice->client->address_2 }},@endif
                    @if($invoice->client->address_1 != '' || $invoice->client->address_2 != '')<br>@endif
                    @if($invoice->client->city != ''){{ $invoice->client->city }},@endif
                    @if($invoice->client->province != ''){{ $invoice->client->province }},@endif
                    @if($invoice->client->country != ''){{ $invoice->client->country }},@endif
                    @if($invoice->client->postal_code != ''){{ $invoice->client->postcode }}@endif
                </p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <p>{{ trans('cruds.invoice.labels.products_services') }}</p>
            </div>
        </div>

        <table class="table table-bordered">
        <thead>
        <tr>
            <th width="60%">{{ trans('cruds.invoice.labels.description') }}</th>
            <th width="10%">{{ trans('cruds.invoice.labels.quantity') }}</th>
            <th width="10%">{{ trans('cruds.invoice.labels.amount') }}</th>
            <th width="10%">{{ trans('cruds.invoice.labels.taxable') }}</th>
            <th width="10%">{{ trans('cruds.invoice.labels.sub_total') }}</th>
        </tr>
        </thead>
        @foreach($invoice->invoiceItems as $key => $invoiceItem)
        <tbody>
        <tr valign="top">
            <td>{{ str_replace(array('\n', '\r'), "\n", $invoiceItem->work_description) }}</td>
            <td>{{ $invoiceItem->quantity }}</td>
            <td>{{ $setting->currency_symbol }}{{ $invoiceItem->amount }}</td>
            <td>{{ ($invoiceItem->taxable)? 'Yes': 'No' }}</td>
            <td>{{ $setting->currency_symbol }}{{ number_format($invoiceItem->quantity * $invoiceItem->amount, 2, '.', '') }}</td>
        </tr>
        </tbody>
        @endforeach
        <tfoot>
            <tr>
                <th colspan="4" class="text-end">{{ trans('cruds.invoice.labels.sub_total') }}</th>
                <th>{{ $setting->currency_symbol }}{{ $invoice->total_no_tax }}</th>
            </tr>
            @if($invoice->client?->tax_status == 1 || (float)$invoice->total_tax_1 > 0)
            <tr>
                <td colspan="4" class="text-end">{{ ($invoice->tax_1_desc)? $invoice->tax_1_desc: trans('cruds.invoice.labels.tax_1_desc') }}</td>
                <td>{{ $setting->currency_symbol }}{{ $invoice->total_tax_1 }}</td>
            </tr>
            @endif
            @if($invoice->client?->tax_status == 1 && (float)$invoice->total_tax_2 > 0)
            <tr>
                <td colspan="4" class="text-end">{{ ($invoice->tax_2_desc)? $invoice->tax_2_desc: trans('cruds.invoice.labels.tax_2_desc') }}</td>
                <td>{{ $setting->currency_symbol }}{{ $invoice->total_tax_2 }}</td>
            </tr>
            @endif
            <tr>
                <th colspan="4" class="text-end">{{ trans('cruds.invoice.labels.total') }}</th>
                <th>{{ $setting->currency_symbol }}{{ $invoice->total_with_tax }}</th>
            </tr>
            <tr>
                <td colspan="4" class="text-end">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            @if((float)$invoice->amount_paid > 0)
            <tr>
                <td colspan="4" class="text-end">{{ trans('cruds.invoice.labels.amount_paid') }}</td>
                <td>{{ $setting->currency_symbol }}{{ $invoice->amount_paid }}</td>
            </tr>
            @endif
            <tr>
                <td colspan="4" class="text-end">{{ trans('cruds.invoice.labels.payment_by') }}</td>
                <td>{{ date('d/m/Y', strtotime($invoice->date_issued . ' + ' . $invoice->days_payment_due . ' days')) }} @if($invoice->payment_status != 'Paid' && $invoice->days_overdue > 0) ({{ $invoice->days_overdue }} days overdue)@endif</td>
            </tr>
            <tr>
                <td colspan="4" class="text-end">{{ trans('cruds.invoice.labels.status') }}</td>
                <td><span class="badge {{ (($invoice->payment_status=='Paid')? 'bg-success': (($invoice->payment_status=='Overdue')? 'bg-danger': 'bg-light')) }}">{{ $invoice->payment_status }}</span></td>
            </tr>
        </tfoot>
        </table>


        <div class="row mb-3">
            <div class="col-12">
                @if($invoice->client?->tax_status == 1 || (float)$invoice->total_tax_1 == 0)<p>Please Note: {{ ($invoice->tax_1_desc)? $invoice->tax_1_desc: trans('cruds.invoice.labels.tax_1_desc') }} is currently zero rated as I don't yet meet the threshold. @if($invoice->tax_1_desc=='GST' && $invoice->client?->tax_code == '')Please send your GST number to remain zero rated.@endif</p>@endif

                @if($invoice->invoice_notes != '')<p>{!! nl2br(e($invoice->invoice_notes)) !!}</p>@endif

                <p><strong>{{ trans('cruds.invoice.labels.payment_terms') }}: {{ $invoice->days_payment_due }} days</strong><br/>
                {{ trans('cruds.invoice.labels.payment_prompt') }} {{ date('d/m/Y', strtotime($invoice->date_issued . ' + ' . $invoice->days_payment_due . ' days')) }}</p>

                @if($invoice->payment_instructions != '')<p>{!! nl2br(e($invoice->payment_instructions)) !!}</p>@endif

            </div>
        </div>

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
