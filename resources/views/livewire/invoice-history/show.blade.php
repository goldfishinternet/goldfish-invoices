<div>
    @include('livewire.invoice-history.modal')
    @if (session()->has('message'))
        <h5 class="alert alert-success">{{ session('message') }}</h5>
    @endif
    <div class="mb-3">
        <h4>Invoice History
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#invoiceHistoryModal">Add History</button>
        </h4>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width:40%">Message</th>
                <th style="width:25%">Recipient</th>
                <th style="width:5%">Send</th>
                <th style="width:5%">Attach</th>
                <th style="width:5%">Date Sent</th>
                <th style="width:20%"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($invoice->invoiceHistories as $invoiceHistory)
                <tr>
                    <td>{{ $invoiceHistory->message }}</td>
                    <td>{{ $invoiceHistory->recipient }}</td>
                    <td>{{ ($invoiceHistory->send)? 'Yes': 'No' }}</td>
                    <td>{{ ($invoiceHistory->attach)? 'Yes': 'No' }}</td>
                    <td>{{ date('d/m/Y', strtotime($invoiceHistory->date_sent)) }}</td>
                    <td>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateInvoiceHistoryModal" wire:click="editInvoiceHistory({{$invoiceHistory->id}})" class="btn btn-sm btn-primary">Edit</button>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteInvoiceHistoryModal" wire:click="deleteInvoiceHistory({{$invoiceHistory->id}})" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No Record Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
