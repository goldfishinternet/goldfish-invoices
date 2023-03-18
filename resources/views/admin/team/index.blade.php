@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('cruds.team.title_singular') }}
            {{ trans('global.list') }}
            @can('team_create')
                <a class="btn btn-primary float-end" href="{{ route('admin.teams.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.team.title_singular') }}
                </a>
            @endcan
        </h4>
    </div>
    @livewire('team.index')
</div>
@endsection
