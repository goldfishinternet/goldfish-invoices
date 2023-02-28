<?php

namespace App\Traits;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Collection;

trait HasTeam
{
    public function ownedTeam()
    {
        return $this->hasOne(Team::class, 'owner_id');
    }

    public function getIsTeamOwnerAttribute(): bool
    {
        return $this->ownedTeam !== null;
    }

    public function getIsTeamMemberAttribute(): bool
    {
        return !$this->is_team_owner && $this->team_id !== null;
    }

    public function getHasTeamAttribute(): bool
    {
        return $this->is_team_owner || $this->is_team_member;
    }

    public function getTeamMembersAttribute(): Collection
    {
        if (!$this->has_team) {
            return collect();
        }

        if ($this->is_team_owner) {
            return User::with('roles')->where('team_id', $this->ownedTeam->id)->get();
        }

        $collection = User::with('roles')->where('team_id', $this->team_id)->get();

        return $collection->whereNotIn('id', [$this->id])
            ->prepend($collection->where('id', $this->id)->first());
    }
}
