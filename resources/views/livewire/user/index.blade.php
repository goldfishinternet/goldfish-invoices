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
                    <livewire:excel-export model="User" format="csv" />
                    <livewire:excel-export model="User" format="xlsx" />
                    <livewire:excel-export model="User" format="pdf" />
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
                            {{ trans('cruds.user.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                            @include('components.table.sort', ['field' => 'email_verified_at'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.locale') }}
                            @include('components.table.sort', ['field' => 'locale'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.team') }}
                            @include('components.table.sort', ['field' => 'team.name'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.is_approved') }}
                            @include('components.table.sort', ['field' => 'is_approved'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $user->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $user->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $user->email }}
                                </a>
                            </td>
                            <td>
                                {{ $user->email_verified_at }}
                            </td>
                            <td>
                                @foreach($user->roles as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $user->locale }}
                            </td>
                            <td>
                                @if($user->team)
                                    <span class="badge badge-relationship">{{ $user->team->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $user->is_approved ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    @can('user_show')
                                        <a class="btn btn-sm btn-info mx-1" href="{{ route('admin.users.show', $user) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('user_edit')
                                        <a class="btn btn-sm btn-primary mx-1" href="{{ route('admin.users.edit', $user) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('user_delete')
                                        <button class="btn btn-sm btn-danger mx-1" type="button" wire:click="confirm('delete', {{ $user->id }})" wire:loading.attr="disabled">
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
            {{ $users->links() }}
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
