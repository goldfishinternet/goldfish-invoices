@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('cruds.permission.title_singular') }}
            {{ trans('global.list') }}
            @can('permission_create')
                <a class="btn btn-primary float-end" href="{{ route('admin.permissions.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}
                </a>
            @endcan
        </h4>
    </div>
    @livewire('permission.index')
</div>
@endsection
