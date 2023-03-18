@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.create') }}
                    {{ trans('cruds.crmStatus.title_singular') }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('crm-status.create')
        </div>
    </div>
</div>
@endsection
