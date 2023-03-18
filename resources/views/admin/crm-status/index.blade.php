@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.crmStatus.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('crm_status_create')
                    <a class="btn btn-primary" href="{{ route('admin.crm-statuses.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.crmStatus.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('crm-status.index')

    </div>
</div>
@endsection
