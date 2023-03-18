@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('cruds.clientContact.title_singular') }}
            {{ trans('global.list') }}
        </h4>
        @can('client_contact_create')
            <a class="btn btn-primary" href="{{ route('admin.client-contacts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.clientContact.title_singular') }}
            </a>
        @endcan
    </div>
    @livewire('client-contact.index')
</div>
@endsection
