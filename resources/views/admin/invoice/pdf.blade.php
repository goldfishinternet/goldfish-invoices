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
        }
    </style>
</head>
<body>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
    <tr>
        <td style="background-color:#1A160F;padding:0 0 0 20px;">
            {{ $setting->logo }}
        </td>
    </tr>
</table>
<div id="content">
    <table cellspacing="0" cellpadding="0" border="0" width="100%">
        <tr>
            <td valign="top" width="70%">
                <h3>{{ trans('cruds.invoice.title_singular') }}</h3>
                <p>
                    <strong>Invoice#:</strong> {{ $invoice->invoice_number }}<br/>
                    <strong>Issue Date:</strong> {{ date('d/m/Y', strtotime($invoice->date_issued)) }}
                </p>
            </td>
            <td valign="top" width="30%">
                <h3>{{ $setting->name }}</h3>
                <p>
                    @if($setting->address1 != '') {{ $setting->address1 }}, <br>@endif
                    @if($setting->address2 != '') {{ $setting->address2 }}, <br>@endif
                    @if($setting->city != '') {{ $setting->city }}, <br />@endif
                    @if($setting->country != '') {{ $setting->country }}, <br>@endif
                    @if($setting->postcode != '') {{ $setting->postcode }} @endif
                </p>
                <p>
                    @if($setting->phone != '') Telephone: {{ $setting->phone }} <br>@endif
                    @if($setting->mobile != '') Mobile: {{ $setting->mobile }} <br>@endif
                    @if($setting->email != '') Email: {{ $setting->email }} <br>@endif
                    @if($setting->website != '') Web: {{ $setting->website }} <br>@endif
                </p>
            <td>
        <tr>
    </table>

    <h3>Invoice to {{ $invoice->client->name }}</h3>

    <p>
        @if($invoice->client->address_1 != ''){{ $invoice->client->address_1 }},@endif
        @if($invoice->client->address_2 != ''){{ $invoice->client->address_2 }},@endif
        @if($invoice->client->address_1 != '' || $invoice->client->address_2 != '')<br>@endif
        @if($invoice->client->city != ''){{ $invoice->client->city }},@endif
        @if($invoice->client->province != ''){{ $invoice->client->province }},@endif
        @if($invoice->client->country != ''){{ $invoice->client->country }},@endif
        @if($invoice->client->postal_code != ''){{ $invoice->client->postcode }}@endif
    </p>

    <p>To professional services rendered in connection with:</p>

    <table class="invoice_items stripe">
        <thead>
        <tr>
            <th>Work Description</th>
            <th>Quantity</th>
            <th>Amount</th>
            <th>Taxable?</th>
            <th>Sub Total</th>
        </tr>
        </thead>
        @foreach($invoice->invoiceItems as $key => $invoiceItem)
        <tbody>
        <tr valign="top">
            <td>{{ nl2br(str_replace(array('\n', '\r'), "\n", $invoiceItem->work_description)) }}</td>
            <td>{{ $invoiceItem->quantity }}</td>
            <td>{{ $invoiceItem->amount }}</td>
            <td>{{ ($invoiceItem->taxable)? 'Yes': 'No' }}</td>
            <td>{{ $setting->currency_symbol }}{{ number_format($invoiceItem->quantity * $invoiceItem->amount, 2, '.', '') }}</td>
        </tr>
        </tbody>
        @endforeach
        <tfoot>
            <tr>
                <td colspan="4">Sub Total</td><td>{{ $invoice->total_no_tax }}</td>
            </tr>
            <tr>
                <td colspan="4">Tax</td><td>{{ $invoice->total_tax_1 }}</td>
            </tr>
            <tr>
                <td colspan="4">Other Tax</td><td>{{ $invoice->total_tax_2 }}</td>
            </tr>
            <tr>
                <td colspan="4">Total</td><td>{{ $invoice->total_with_tax }}</td>
            </tr>
            <tr>
                <td colspan="4">Amount Paid</td><td>{{ $invoice->amount_paid }}</td>
            </tr>
            <tr>
                <td colspan="4">Payment By</td><td>{{ date('d/m/Y', strtotime($invoice->date_issued . ' + ' . $invoice->days_payment_due . ' days')) }} @if($invoice->payment_status != 'Paid' && $invoice->days_overdue > 0) ({{ $invoice->days_overdue }} days overdue)@endif</td>
            </tr>
            <tr>
                <td colspan="4">Status</td><td><span class="badge {{ ($invoice->payment_status=='Paid')? 'bg-success': 'bg-danger'}}">{{ $invoice->payment_status }}</span></td>
            </tr>
        </tfoot>
    </table>

    <p>{{ $invoice->invoice_note }}</p>

    <p><strong>Payment Terms: {{ $invoice->payment_term }}</strong><br/>
        Payment in full would be appreciated by {{ date('d/m/Y', strtotime($invoice->date_issued . ' + ' . $invoice->days_payment_due . ' days')) }}</p>

    <p>Bank of New Zealand<br/>
        02-0372-0029074-000<br/>
        Please quote the invoice number.<br/>
        Please make cheques payable to: "Goldfish Interactive Limited"</p>

    <div id="footer">
        <p></p>
    </div>
</div>
</body>
</html>
