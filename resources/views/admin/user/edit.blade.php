@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('global.edit') }}
            {{ trans('cruds.user.title_singular') }}:
            {{ trans('cruds.user.fields.id') }}
            {{ $user->id }}
        </h4>
    </div>
    <div class="card-body">
        @livewire('user.edit', [$user])
    </div>
</div>
@endsection
