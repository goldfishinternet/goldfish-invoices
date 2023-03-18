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
                @can('user_delete')
                    <button class="btn btn-danger" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                        {{ __('Delete Selected') }}
                    </button>
                @endcan
                @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                    <livewire:excel-export model="Permission" format="csv" />
                    <livewire:excel-export model="Permission" format="xlsx" />
                    <livewire:excel-export model="Permission" format="pdf" />
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
                            {{ trans('cruds.permission.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.permission.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $permission->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $permission->id }}
                            </td>
                            <td>
                                {{ $permission->title }}
                            </td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    @can('permission_show')
                                        <a class="btn btn-sm btn-info mx-1" href="{{ route('admin.permissions.show', $permission) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('permission_edit')
                                        <a class="btn btn-sm btn-primary mx-1" href="{{ route('admin.permissions.edit', $permission) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('permission_delete')
                                        <button class="btn btn-sm btn-danger mx-1" type="button" wire:click="confirm('delete', {{ $permission->id }})" wire:loading.attr="disabled">
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
            {{ $permissions->links() }}
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
        })
    </script>
@endpush
