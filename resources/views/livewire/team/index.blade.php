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
                @can('team_delete')
                    <button class="btn btn-danger" type="button" wire:click="confirm('deleteSelected')" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
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
                            {{ trans('cruds.team.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.owner') }}
                            @include('components.table.sort', ['field' => 'owner.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teams as $team)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $team->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $team->id }}
                            </td>
                            <td>
                                {{ $team->name }}
                            </td>
                            <td>
                                @if($team->owner)
                                    <span class="badge badge-relationship">{{ $team->owner->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    @can('team_show')
                                        <a class="btn btn-sm btn-info mx-1" href="{{ route('admin.teams.show', $team) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('team_edit')
                                        <a class="btn btn-sm btn-primary mx-1" href="{{ route('admin.teams.edit', $team) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('team_delete')
                                        <button class="btn btn-sm btn-danger mx-1" type="button" wire:click="confirm('delete', {{ $team->id }})" wire:loading.attr="disabled">
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
            {{ $teams->links() }}
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
