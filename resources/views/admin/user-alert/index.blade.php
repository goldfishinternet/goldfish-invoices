@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('cruds.userAlert.title_singular') }}
            {{ trans('global.list') }}
            @can('user_alert_create')
                <a class="btn btn-primary float-end" href="{{ route('admin.user-alerts.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.userAlert.title_singular') }}
                </a>
            @endcan
        </h4>
    </div>
    @livewire('user-alert.index')
</div>
@endsection
