<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait Tenantable
{
    public static function bootTenantable()
    {
        if (app()->runningInConsole()) {
            return;
        }

        static::creating(function (Model $model) {
            if (!auth()->check()) {
                return;
            }

            $model->team_id = auth()->user()->is_team_owner ? auth()->user()->ownedTeam->id : auth()->user()->team_id;
        });

        static::addGlobalScope('team_filter', function (Builder $query) {
            if (!auth()->check() || auth()->user()->is_admin) {
                return;
            }

            $team_id = auth()->user()->is_team_owner ? auth()->user()->ownedTeam->id : auth()->user()->team_id;

            $query->where((new static())->getTable() . '.team_id', $team_id);
        });
    }
}
