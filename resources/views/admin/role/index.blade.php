@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('cruds.role.title_singular') }}
            {{ trans('global.list') }}
            @can('role_create')
                <a class="btn btn-primary float-end" href="{{ route('admin.roles.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}
                </a>
            @endcan
        </h4>
    </div>
    @livewire('role.index')
</div>
@endsection
