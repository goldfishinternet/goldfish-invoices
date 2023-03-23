<div>
    <div class="card-controls d-flex flex-row p-3">
        <div class="flex-fill px-3">
            <label class="form-label">Search:</label>
            <input type="text" wire:model.debounce.300ms="search" class="form-control" />
        </div>
        <div class="flex-fill px-3">
            <label class="form-label">Per page:</label>
            <select wire:model="perPage" class="form-control">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex-fill px-3">
            <label class="form-label">&nbsp;</label>
            <div>
                @can('invoice_delete')
                    <button class="btn btn-danger" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                        {{ __('Delete Selected') }}
                    </button>
                @endcan
            </div>
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>
    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th>

                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_number') }}
                            @include('components.table.sort', ['field' => 'invoice_number'])
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.date_issued') }}
                            @include('components.table.sort', ['field' => 'date_issued'])
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.total_with_tax') }}
                            @include('components.table.sort', ['field' => 'total_with_tax'])
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.amount_paid') }}
                            @include('components.table.sort', ['field' => 'amount_paid'])
                        </th>
                        <th>
                            {{ trans('cruds.invoice.fields.payment_status') }}
                            @include('components.table.sort', ['field' => 'payment_status'])
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($invoices as $invoice)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $invoice->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $invoice->id }}
                            </td>
                            <td>
                                {{ $invoice->invoice_number }}
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($invoice->date_issued)) }}
                            </td>
                            <td>
                                {{ ($invoice->client!=null)? $invoice->client->name: '' }}
                            </td>
                            <td>
                                {{ $invoice->total_with_tax }}
                            </td>
                            <td>
                                {{ $invoice->amount_paid }}
                            </td>
                            <td>
                                <span class="badge {{ ($invoice->payment_status=='Paid')? 'bg-success': 'bg-danger'}}">{{ $invoice->payment_status }}</span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    @can('invoice_show')
                                        <a class="btn btn-sm btn-info mx-1" href="{{ route('admin.invoices.show', $invoice) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('invoice_show')
                                        <a class="btn btn-sm btn-info mx-1" href="{{ route('admin.pdf.invoice', $invoice) }}">
                                            {{ trans('global.pdf') }}
                                        </a>
                                    @endcan
                                    @can('invoice_edit')
                                        <a class="btn btn-sm btn-primary mx-1" href="{{ route('admin.invoices.edit', $invoice) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('invoice_delete')
                                        <button class="btn btn-sm btn-danger mx-1" type="button" wire:click="confirm('delete', {{ $invoice->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-body">
        @if($this->selectedCount)
            <p class="text-sm leading-5">
                <span class="font-medium">
                    {{ $this->selectedCount }}
                </span>
                {{ __('Entries selected') }}
            </p>
        @endif
        {{ $invoices->links() }}
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
            if (!confirm("{{ trans('global.areYouSure') }}")) {
                return;
            }
            @this[e.callback](...e.argv);
        });
    </script>
@endpush
