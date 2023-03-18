@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('cruds.auditLog.title_singular') }}
            {{ trans('global.list') }}
        </h4>
        @can('audit_log_create')
            <a class="btn btn-primary float-end" href="{{ route('admin.audit-logs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.auditLog.title_singular') }}
            </a>
        @endcan
    </div>
    @livewire('audit-log.index')
</div>
@endsection
