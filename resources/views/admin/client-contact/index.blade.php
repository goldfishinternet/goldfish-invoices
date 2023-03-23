@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('cruds.clientContact.title_singular') }}
            {{ trans('global.list') }}
            @can('client_contact_create')
                <a class="btn btn-primary float-end" href="{{ route('admin.client-contacts.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.clientContact.title_singular') }}
                </a>
            @endcan
        </h4>
    </div>
    @livewire('client-contact.index')
</div>
@endsection
