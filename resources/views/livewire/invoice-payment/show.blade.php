<div>
    @include('livewire.invoice-payment.modal')
    @if (session()->has('message'))
        <h5 class="alert alert-success">{{ session('message') }}</h5>
    @endif
    <div class="mb-3">
        <h4>Invoice Payments
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#invoicePaymentModal">Add Payment</button>
        </h4>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width:70%">Payment Note</th>
                <th style="width:5%">Amount Paid</th>
                <th style="width:5%">Date Paid</th>
                <th style="width:20%"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($invoice->invoicePayments as $invoicePayment)
                <tr>
                    <td>{{ $invoicePayment->payment_note }}</td>
                    <td>{{ $invoicePayment->amount_paid }}</td>
                    <td>{{ date('d/m/Y', strtotime($invoicePayment->date_paid)) }}</td>
                    <td>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateInvoicePaymentModal" wire:click="editInvoicePayment({{$invoicePayment->id}})" class="btn btn-sm btn-primary">Edit</button>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteInvoicePaymentModal" wire:click="deleteInvoicePayment({{$invoicePayment->id}})" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No Record Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
