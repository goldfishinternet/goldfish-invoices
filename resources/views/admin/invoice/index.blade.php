@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('cruds.invoice.title_singular') }}
            {{ trans('global.list') }}
            @can('invoice_create')
                <a class="btn btn-primary float-end" href="{{ route('admin.invoices.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.invoice.title_singular') }}
                </a>
            @endcan
        </h4>
    </div>
    @livewire('invoice.index')
</div>
@endsection
