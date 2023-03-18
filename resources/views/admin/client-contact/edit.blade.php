@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('global.edit') }}
            {{ trans('cruds.clientContact.title_singular') }}:
            {{ trans('cruds.clientContact.fields.id') }}
            {{ $clientContact->id }}
        </h4>
    </div>
    <div class="card-body">
        @livewire('client-contact.edit', [$clientContact])
    </div>
</div>
@endsection
