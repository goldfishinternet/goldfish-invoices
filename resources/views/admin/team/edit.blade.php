@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('global.edit') }}
            {{ trans('cruds.team.title_singular') }}:
            {{ trans('cruds.team.fields.id') }}
            {{ $team->id }}
        </h4>
    </div>
    <div class="card-body">
        @livewire('team.edit', [$team])
    </div>
</div>
@endsection
