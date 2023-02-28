<?php

namespace App\Http\Livewire\Team;

use App\Models\Team;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public Team $team;

    public array $listsForFields = [];

    public function mount(Team $team)
    {
        $this->team = $team;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.team.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->team->save();

        return redirect()->route('admin.teams.index');
    }

    protected function rules(): array
    {
        return [
            'team.name' => [
                'string',
                'required',
            ],
            'team.owner_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['owner'] = User::pluck('name', 'id')->toArray();
    }
}
