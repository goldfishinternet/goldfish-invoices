@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('global.edit') }}
            {{ trans('cruds.invoice.title_singular') }}:
            {{ trans('cruds.invoice.fields.id') }}
            {{ $invoice->id }}
        </h4>
    </div>
    <div class="card-body">
        @livewire('invoice.edit', [$invoice])
    </div>
</div>
@endsection
