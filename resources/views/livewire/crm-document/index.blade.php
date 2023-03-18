<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('crm_document_delete')
                <button class="btn btn-secondary ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="CrmDocument" format="csv" />
                <livewire:excel-export model="CrmDocument" format="xlsx" />
                <livewire:excel-export model="CrmDocument" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
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
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.crmDocument.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.crmDocument.fields.customer') }}
                            @include('components.table.sort', ['field' => 'customer.first_name'])
                        </th>
                        <th>
                            {{ trans('cruds.crmDocument.fields.document_file') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmDocument.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($crmDocuments as $crmDocument)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $crmDocument->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $crmDocument->id }}
                            </td>
                            <td>
                                @if($crmDocument->customer)
                                    <span class="badge badge-relationship">{{ $crmDocument->customer->first_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @foreach($crmDocument->document_file as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $crmDocument->name }}
                            </td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    @can('crm_document_show')
                                        <a class="btn btn-sm btn-info mx-1" href="{{ route('admin.crm-documents.show', $crmDocument) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('crm_document_edit')
                                        <a class="btn btn-sm btn-primary mx-1" href="{{ route('admin.crm-documents.edit', $crmDocument) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('crm_document_delete')
                                        <button class="btn btn-sm btn-danger mx-1" type="button" wire:click="confirm('delete', {{ $crmDocument->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $crmDocuments->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush
