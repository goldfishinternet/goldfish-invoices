<div>
    @if(!$this->user->has_team)
        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
            {{ __('global.team-management-singular') }}
        </h6>

        <div class="flex flex-wrap">
            <form wire:submit.prevent="createTeam" class="w-full">
                <div class="mb-3">
                    {{ __('global.no_team_notice') }}
                </div>
                <div class="mb-3">
                    <label class="form-label" for="name">{{ __('global.team_name') }}</label>
                    <input class="form-control" id="name" type="text" wire:model.defer="name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary mr-3">
                        {{ __('global.save') }}
                    </button>
                    <div x-data="{ shown: false, timeout: null }" x-init="@this.on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })" x-show.transition.out.opacity.duration.1500ms="shown" x-transition:leave.opacity.duration.1500ms class="text-sm" style="display: none;">
                        {{ __('global.saved') }}
                    </div>
                </div>
            </form>
        </div>
    @endif

    @if($this->user->is_team_owner)
        <p>{{ __('Invite new members') }}</p>

        <div class="flex flex-wrap">
            <form wire:submit.prevent="inviteMember" class="w-full" novalidate>

                <div class="mb-3">
                    <label class="form-label" for="email">{{ __('global.login_email') }}</label>
                    <div class="input-group">
                        <input class="form-control" id="email" type="email" wire:model.defer="email">
                        <button class="btn btn-primary mr-3 rounded-end">
                            <i class="fas fa-user-plus fa-fw mr-1"></i>
                            {{ __('global.invite_member') }}
                        </button>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div x-data="{ shown: false, timeout: null }" x-init="@this.on('invited', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })" x-show.transition.out.opacity.duration.1500ms="shown" x-transition:leave.opacity.duration.1500ms class="valid-feedback" style="display: none;">
                            {{ __('global.invite_sent') }}
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <hr class="mt-6 border-b-1 border-blueGray-300">

        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
            {{ __('global.manage_team_members') }}
        </h6>

        <table class="table w-full">
            <tbody>
                @forelse($this->user->team_members as $teamMember)
                    <tr>
                        <td class="px-4 py-2 border-t border-dashed">
                            <div>{{ $teamMember->name }}</div>
                            <div>
                                <a href="mailto:{{ $teamMember->email }}" class="link-light-blue inline">
                                    {{ $teamMember->email }}
                                </a>
                            </div>
                        </td>
                        <td class="px-4 py-2 border-t border-dashed">
                            <div class="d-flex justify-content-end">
                                @foreach($teamMember->roles as $role)
                                    <span class="badge badge-relationship">{{ $role->title }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td class="px-4 py-2 border-t border-dashed">
                            <div class="d-flex justify-content-end">
                                <button wire:click="confirm('removeMember', {{ $teamMember->id }})" type="button" class="btn btn-secondary">
                                    <i class="fas fa-user-times fa-fw mr-1"></i>
                                    {{ __('global.remove') }}
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <div class="input-group mb-3">
                        {{ __('global.team_no_members_notice') }}
                    </div>
                @endforelse
            </tbody>
        </table>

        <hr class="mt-6 border-b-1 border-blueGray-300">

        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
            {{ __('global.disband_team') }}
        </h6>

        <form wire:submit.prevent="confirm('disbandTeam')" class="w-full">
            <div class="input-group mb-3">
                {{ __('global.team_disband_notice') }}
            </div>
            <div class="input-group mb-3 flex items-center">
                <button class="btn btn-secondary mr-3">
                    <i class="fas fa-users-slash fa-fw mr-1"></i>
                    {{ __('global.disband_team') }}
                </button>
            </div>
        </form>
    @endif

    @if($this->user->is_team_member)
        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
            {{ __('global.team-members') }}
        </h6>

        <table class="table w-full">
            <tbody>
                @foreach($this->user->team_members as $teamMember)
                    <tr>
                        <td class="px-4 py-2 border-t border-dashed">
                            <div>{{ $teamMember->name }}</div>
                            <div>
                                <a href="mailto:{{ $teamMember->email }}" class="link-light-blue inline">
                                    {{ $teamMember->email }}
                                </a>
                            </div>
                        </td>
                        <td class="px-4 py-2 border-t border-dashed">
                            <div class="d-flex justify-content-end">
                                @foreach($teamMember->roles as $role)
                                    <span class="badge badge-relationship">{{ $role->title }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td class="px-4 py-2 border-t border-dashed">
                            <div class="d-flex justify-content-end">
                                @if($teamMember->id === $this->user->id)
                                    <button wire:click="confirm('leaveTeam')" type="button" class="btn btn-secondary">
                                        <i class="fas fa-user-times fa-fw mr-1"></i>
                                        {{ __('global.leave') }}
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
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
