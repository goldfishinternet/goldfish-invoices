@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('global.view') }}
            {{ trans('cruds.team.title_singular') }}:
            {{ trans('cruds.team.fields.id') }}
            {{ $team->id }}
        </h4>
    </div>
    <div class="card-body">
        <div class="pt-3">
            <table class="table table-view">
                <tbody class="bg-white">
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.id') }}
                        </th>
                        <td>
                            {{ $team->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.name') }}
                        </th>
                        <td>
                            {{ $team->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.owner') }}
                        </th>
                        <td>
                            @if($team->owner)
                                <span class="badge badge-relationship">{{ $team->owner->name ?? '' }}</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            @can('team_edit')
                <a href="{{ route('admin.teams.edit', $team) }}" class="btn btn-primary mx-1">
                    {{ trans('global.edit') }}
                </a>
            @endcan
            <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">
                {{ trans('global.back') }}
            </a>
        </div>
    </div>
</div>
@endsection
