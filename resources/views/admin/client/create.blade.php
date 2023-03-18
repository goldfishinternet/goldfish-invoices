@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('global.create') }}
            {{ trans('cruds.client.title_singular') }}
        </h4>
    </div>
    <div class="card-body">
        @livewire('client.create')
    </div>
</div>
@endsection
