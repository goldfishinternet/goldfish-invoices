<?php

namespace App\Http\Livewire\Team;

use App\Http\Livewire\WithConfirmation;
use App\Models\Team;
use App\Models\User;
use App\Notifications\TeamMemberInvitation;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class MyTeamForm extends Component
{
    use WithConfirmation;

    public $name;
    public $email;
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function createTeam()
    {
        if ($this->user->has_team) {
            return;
        }

        $this->resetErrorBag();
        $validated = $this->validateOnly('name');

        $this->user->ownedTeam()->create([
            'name'     => $validated['name'],
            'owner_id' => $this->user->id,
        ]);

        $this->emit('saved');

        $this->refreshCurrentUser();
    }

    public function disbandTeam()
    {
        if (!$this->user->is_team_owner) {
            return;
        }

        $team = Team::firstWhere('owner_id', auth()->id());
        User::where('team_id', $team->id)->update(['team_id' => null]);
        $team->delete();

        $this->refreshCurrentUser();
    }

    public function inviteMember()
    {
        if (!$this->user->is_team_owner) {
            return;
        }

        $this->resetErrorBag();
        $validated = $this->validateOnly('email');

        $user = User::firstWhere('email', $validated['email']);

        if (optional($user)->has_team) {
            $this->addError('email', 'User with this email already has team.');

            return;
        }

        $team = Team::firstWhere('owner_id', auth()->id());
        Notification::route('mail', $validated['email'])->notify(new TeamMemberInvitation($team));

        $this->email = '';
        $this->emit('invited');
    }

    public function removeMember($userId)
    {
        if (!$this->user->is_team_owner) {
            return;
        }

        if ($member = $this->user->team_members->firstWhere('id', $userId)) {
            $member->update(['team_id' => null]);
        }
    }

    public function leaveTeam()
    {
        if (!$this->user->is_team_member) {
            return;
        }

        $this->user->update(['team_id' => null]);
    }

    public function render()
    {
        return view('livewire.team.my-team-form');
    }

    public function rules()
    {
        return [
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
        ];
    }

    protected function refreshCurrentUser()
    {
        $this->user = auth()->user();
    }
}
