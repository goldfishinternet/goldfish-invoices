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
                            {{ trans('cruds.clientContact.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.clientContact.fields.client') }}
                            @include('components.table.sort', ['field' => 'client.name'])
                        </th>
                        <th>
                            {{ trans('cruds.clientContact.fields.first_name') }}
                            @include('components.table.sort', ['field' => 'first_name'])
                        </th>
                        <th>
                            {{ trans('cruds.clientContact.fields.last_name') }}
                            @include('components.table.sort', ['field' => 'last_name'])
                        </th>
                        <th>
                            {{ trans('cruds.clientContact.fields.phone') }}
                            @include('components.table.sort', ['field' => 'phone'])
                        </th>
                        <th>
                            {{ trans('cruds.clientContact.fields.mobile') }}
                            @include('components.table.sort', ['field' => 'mobile'])
                        </th>
                        <th>
                            {{ trans('cruds.clientContact.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clientContacts as $clientContact)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $clientContact->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $clientContact->id }}
                            </td>
                            <td>
                                @if($clientContact->company)
                                    <span class="badge badge-relationship">{{ $clientContact->company->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $clientContact->first_name }}
                            </td>
                            <td>
                                {{ $clientContact->last_name }}
                            </td>
                            <td>
                                {{ $clientContact->phone }}
                            </td>
                            <td>
                                {{ $clientContact->mobile }}
                            </td>
                            <td>
                                {{ $clientContact->email }}
                            </td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    @can('client_contact_show')
                                        <a class="btn btn-sm btn-info mx-1" href="{{ route('admin.client-contacts.show', $clientContact) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('client_contact_edit')
                                        <a class="btn btn-sm btn-primary mx-1" href="{{ route('admin.client-contacts.edit', $clientContact) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('client_contact_delete')
                                        <button class="btn btn-sm btn-danger mx-1" type="button" wire:click="confirm('delete', {{ $clientContact->id }})" wire:loading.attr="disabled">
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
            {{ $clientContacts->links() }}
        </div>
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
