@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('global.create') }}
            {{ trans('cruds.invoice.title_singular') }}
        </h4>
    </div>
    <div class="card-body">
        @livewire('invoice.create')
    </div>
</div>
@endsection
