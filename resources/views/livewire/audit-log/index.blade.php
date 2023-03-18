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
                @can('audit_log_delete')
                    <button class="btn btn-danger" type="button" wire:click="confirm('deleteSelected')" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                        {{ __('Delete Selected') }}
                    </button>
                @endcan
                @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                    <livewire:excel-export model="AuditLog" format="csv" />
                    <livewire:excel-export model="AuditLog" format="xlsx" />
                    <livewire:excel-export model="AuditLog" format="pdf" />
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
                            {{ trans('cruds.auditLog.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.subject_id') }}
                            @include('components.table.sort', ['field' => 'subject_id'])
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.subject_type') }}
                            @include('components.table.sort', ['field' => 'subject_type'])
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.user_id') }}
                            @include('components.table.sort', ['field' => 'user_id'])
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.properties') }}
                            @include('components.table.sort', ['field' => 'properties'])
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.host') }}
                            @include('components.table.sort', ['field' => 'host'])
                        </th>
                        <th>
                            {{ trans('cruds.auditLog.fields.created_at') }}
                            @include('components.table.sort', ['field' => 'created_at'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($auditLogs as $auditLog)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $auditLog->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $auditLog->id }}
                            </td>
                            <td>
                                {{ $auditLog->description }}
                            </td>
                            <td>
                                {{ $auditLog->subject_id }}
                            </td>
                            <td>
                                {{ $auditLog->subject_type }}
                            </td>
                            <td>
                                {{ $auditLog->user_id }}
                            </td>
                            <td>
                                {{ $auditLog->properties }}
                            </td>
                            <td>
                                {{ $auditLog->host }}
                            </td>
                            <td>
                                {{ $auditLog->created_at }}
                            </td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    @can('audit_log_show')
                                        <a class="btn btn-sm btn-info mx-1" href="{{ route('admin.audit-logs.show', $auditLog) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('audit_log_edit')
                                        <a class="btn btn-sm btn-primary mx-1" href="{{ route('admin.audit-logs.edit', $auditLog) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('audit_log_delete')
                                        <button class="btn btn-sm btn-danger mx-1" type="button" wire:click="confirm('delete', {{ $auditLog->id }})" wire:loading.attr="disabled">
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
            {{ $auditLogs->links() }}
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
