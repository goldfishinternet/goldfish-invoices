<div>
    @include('livewire.invoice-item.modal')
    @if (session()->has('message'))
        <h5 class="alert alert-success">{{ session('message') }}</h5>
    @endif
    <div class="mb-3">
        <h4>Invoice Items
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#invoiceItemModal">Add Item</button>
        </h4>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width:65%">Description</th>
                <th style="width:5%">Taxable</th>
                <th style="width:5%">Quantity</th>
                <th style="width:5%">Amount</th>
                <th style="width:20%"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($invoice->invoiceItems as $invoiceItem)
                <tr>
                    <td>{{ $invoiceItem->work_description }}</td>
                    <td>{{ ($invoiceItem->taxable)? 'Yes':'No' }}</td>
                    <td>{{ $invoiceItem->quantity }}</td>
                    <td>{{ $invoiceItem->amount }}</td>
                    <td>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateInvoiceItemModal" wire:click="editInvoiceItem({{$invoiceItem->id}})" class="btn btn-sm btn-primary">Edit</button>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteInvoiceItemModal" wire:click="deleteInvoiceItem({{$invoiceItem->id}})" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No Record Found</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Sub Total</td><td colspan="2">{{ $invoice->total_no_tax }}</td>
            </tr>
            @if($invoice->client?->tax_status == 1 || (float)$invoice->total_tax_1 > 0)
            <tr>
                <td colspan="3">{{ $invoice->tax_1_desc }}</td><td colspan="2">{{ $invoice->total_tax_1 }}</td>
            </tr>
            @endif
            @if($invoice->client?->tax_status == 1 && (float)$invoice->total_tax_2 > 0)
            <tr>
                <td colspan="3">{{ $invoice->tax_2_desc }}</td><td colspan="2">{{ $invoice->total_tax_2 }}</td>
            </tr>
            @endif
            <tr>
                <td colspan="3">Total</td><td colspan="2">{{ $invoice->total_with_tax }}</td>
            </tr>
            <tr>
                <td colspan="3">Amount Paid</td><td colspan="2">{{ $invoice->amount_paid }}</td>
            </tr>

            <tr>
                <td colspan="3">Payment By</td><td colspan="2">{{ date('d/m/Y', strtotime($invoice->date_issued . ' + ' . $invoice->days_payment_due . ' days')) }} @if($invoice->payment_status != 'Paid' && $invoice->days_overdue > 0) ({{ $invoice->days_overdue }} days overdue)@endif</td>
            </tr>

            <tr>
                <td colspan="3">Status</td><td colspan="2"><span class="badge {{ (($invoice->payment_status=='Paid')? 'bg-success': (($invoice->payment_status=='Overdue')? 'bg-danger': 'bg-light')) }}">{{ $invoice->payment_status }}</span></td>
            </tr>
        </tfoot>
    </table>
</div>
