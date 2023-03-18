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
                @can('client_contact_delete')
                    <button class="btn btn-danger" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                        {{ __('Delete Selected') }}
                    </button>
                @endcan
                @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                    <livewire:excel-export model="Client" format="csv" />
                    <livewire:excel-export model="Client" format="xlsx" />
                    <livewire:excel-export model="Client" format="pdf" />
                @endif
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
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.client.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.city') }}
                            @include('components.table.sort', ['field' => 'city'])
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.country') }}
                            @include('components.table.sort', ['field' => 'country'])
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.website') }}
                            @include('components.table.sort', ['field' => 'website'])
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $client->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $client->id }}
                            </td>
                            <td>
                                {{ $client->name }}
                            </td>
                            <td>
                                {{ $client->city }}
                            </td>
                            <td>
                                {{ $client->country }}
                            </td>
                            <td>
                                {{ $client->website }}
                            </td>
                            <td>
                                {{ $client->email }}
                            </td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    @can('client_show')
                                        <a class="btn btn-sm btn-info mx-1" href="{{ route('admin.clients.show', $client) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('client_edit')
                                        <a class="btn btn-sm btn-primary mx-1" href="{{ route('admin.clients.edit', $client) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('client_delete')
                                        <button class="btn btn-sm btn-danger mx-1" type="button" wire:click="confirm('delete', {{ $client->id }})" wire:loading.attr="disabled">
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
        @if($this->selectedCount)
            <p class="text-sm leading-5">
                <span class="font-medium">
                    {{ $this->selectedCount }}
                </span>
                {{ __('Entries selected') }}
            </p>
        @endif
        {{ $clients->links() }}
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
