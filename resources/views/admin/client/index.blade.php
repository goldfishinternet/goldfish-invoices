@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('cruds.client.title_singular') }}
            {{ trans('global.list') }}
            @can('client_create')
                <a class="btn btn-primary float-end" href="{{ route('admin.clients.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.client.title_singular') }}
                </a>
            @endcan
        </h4>
    </div>
    @livewire('client.index')
</div>
@endsection
