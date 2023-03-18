@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.crmDocument.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('crm_document_create')
                    <a class="btn btn-primary" href="{{ route('admin.crm-documents.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.crmDocument.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('crm-document.index')

    </div>
</div>
@endsection
