<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <style type="text/css">
        @page {
            margin: 0.25px;
        }
        body {
            margin: 0.25in;
            font-size:12px;
        }
        #content {
            margin: 0.25in;
        }
        a {
            color: #FF6600;
        }
        h1, h2, h3, h4, h5, h6, li, blockquote, p, th, td {
            font-family: Helvetica, Arial, Verdana, sans-serif; /*Trebuchet MS,*/
        }
        h1, h2, h3, h4 {
            color: #FF6600;
            font-weight: normal;
        }
        h4, h5, h6 {
            color: #FF6600;
        }
        h2 {
            margin: 0 auto auto auto;
            font-size: large;
        }
        h2 span {
            text-transform: uppercase;
        }
        table {
            width: 100%;
        }
        td p {
            margin: 0;
        }
        th {
            color: #FFF;
            text-align: left;
            background-color: #000000;
        }
        .bamboo_invoice_bam {
            color: #5E88B6;
            font-weight: bold;
            text-transform: capitalize;
        }
        .bamboo_invoice_inv {
            font-weight: bold;
            font-variant: small-caps;
            color: #333;
        }
        #footer {
            border-top: 1px solid #CCC;
            text-align: right;
            font-size: 6pt;
            color: #999999;
        }
        #footer a {
            color: #999999;
            text-decoration: none;
        }
        table.stripe {
            border-collapse: collapse;
            page-break-after: auto;
        }
        table.stripe td {
            border-bottom: 1pt solid black;
            padding:3px;
        }
    </style>
</head>
<body>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
    <tr>
        <td style="background-color:#1A160F;padding:10px 10px 10px 10px;">
            @if($setting->logo!='')
                @php
                    $filePath = \Illuminate\Support\Facades\Storage::disk('public')->path($setting->logo)
                @endphp
                <img src="{{ $filePath }}" height="60" alt="">
            @else
                <h1 style="color:#ffffff;">{{ $setting->name }}</h1>
            @endif
        </td>
    </tr>
</table>
<div id="content">
    <table cellspacing="0" cellpadding="0" border="0" width="100%">
        <tr>
            <td valign="top" width="70%">
                <h3>{{ trans('cruds.invoice.title_singular') }}</h3>
                <p>
                    <strong>{{ trans('cruds.invoice.labels.invoice_no') }}:</strong> {{ $invoice->invoice_number }}<br/>
                    <strong>{{ trans('cruds.invoice.labels.issue_date') }}:</strong> {{ date('d/m/Y', strtotime($invoice->date_issued)) }}
                </p>
            </td>
            <td valign="top" width="30%">
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
            <td>
        <tr>
    </table>

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

    <p>{{ trans('cruds.invoice.labels.products_services') }}</p>

    <table class="invoice_items stripe">
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
            <td>{{ str_replace(array('\n', '\r'), " ", $invoiceItem->work_description) }}</td>
            <td>{{ $invoiceItem->quantity }}</td>
            <td>{{ $setting->currency_symbol }}{{ $invoiceItem->amount }}</td>
            <td>{{ ($invoiceItem->taxable)? 'Yes': 'No' }}</td>
            <td>{{ $setting->currency_symbol }}{{ number_format($invoiceItem->quantity * $invoiceItem->amount, 2, '.', '') }}</td>
        </tr>
        </tbody>
        @endforeach
        <tfoot>
            <tr>
                <td colspan="4" align="right"><strong>{{ trans('cruds.invoice.labels.sub_total') }}</strong></td>
                <td>{{ $setting->currency_symbol }}{{ $invoice->total_no_tax }}</td>
            </tr>
            @if($invoice->client->tax_status == 1 || (float)$invoice->total_tax_1 > 0)
            <tr>
                <td colspan="4" align="right">{{ ($invoice->tax_1_desc)? $invoice->tax_1_desc: trans('cruds.invoice.labels.tax_1_desc') }}</td>
                <td>{{ $setting->currency_symbol }}{{ $invoice->total_tax_1 }}</td>
            </tr>
            @endif
            @if($invoice->client->tax_status == 1 && (float)$invoice->total_tax_2 > 0)
            <tr>
                <td colspan="4" align="right">{{ ($invoice->tax_2_desc)? $invoice->tax_2_desc: trans('cruds.invoice.labels.tax_2_desc') }}</td>
                <td>{{ $setting->currency_symbol }}{{ $invoice->total_tax_2 }}</td>
            </tr>
            @endif
            <tr>
                <td colspan="4" align="right"><strong>{{ trans('cruds.invoice.labels.total') }}</strong></td>
                <td>{{ $setting->currency_symbol }}{{ $invoice->total_with_tax }}</td>
            </tr>
            @if((float)$invoice->amount_paid > 0)
            <tr>
                <td colspan="4">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="4" align="right">{{ trans('cruds.invoice.labels.amount_paid') }}</td>
                <td>{{ $setting->currency_symbol }}{{ $invoice->amount_paid }}</td>
            </tr>
            @endif
            {{--
            <tr>
                <td colspan="4" align="right">{{ trans('cruds.invoice.labels.payment_by') }}</td>
                <td>{{ date('d/m/Y', strtotime($invoice->date_issued . ' + ' . $invoice->days_payment_due . ' days')) }} @if($invoice->payment_status != 'Paid' && $invoice->days_overdue > 0) ({{ $invoice->days_overdue }} days overdue)@endif</td>
            </tr>
            <tr>
                <td colspan="4" align="right">{{ trans('cruds.invoice.labels.status') }}</td>
                <td><span class="badge {{ ($invoice->payment_status=='Paid')? 'bg-success': 'bg-danger'}}">{{ $invoice->payment_status }}</span></td>
            </tr>
            --}}
        </tfoot>
    </table>

    @if($invoice->client?->tax_status == 1 || (float)$invoice->total_tax_1 == 0)<p>Please Note: {{ ($invoice->tax_1_desc)? $invoice->tax_1_desc: trans('cruds.invoice.labels.tax_1_desc') }} is currently zero rated as I don't yet meet the threshold. @if($invoice->tax_1_desc=='GST' && $invoice->client?->tax_code == '')Please send your GST number to remain zero rated.@endif</p>@endif

    @if($invoice->invoice_notes != '')<p>{!! nl2br(e($invoice->invoice_notes)) !!}</p>@endif

    <p><strong>{{ trans('cruds.invoice.labels.payment_terms') }}: {{ $invoice->days_payment_due }} days</strong><br/>
        {{ trans('cruds.invoice.labels.payment_prompt') }} {{ date('d/m/Y', strtotime($invoice->date_issued . ' + ' . $invoice->days_payment_due . ' days')) }}</p>

    @if($invoice->payment_instructions != '')<p>{!! nl2br(e($invoice->payment_instructions)) !!}</p>@endif

    <div id="footer">
        <p></p>
    </div>
</div>
</body>
</html>
