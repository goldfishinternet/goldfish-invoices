@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('global.edit') }}
            {{ trans('cruds.client.title_singular') }}:
            {{ trans('cruds.client.fields.id') }}
            {{ $client->id }}
        </h4>
    </div>
    <div class="card-body">
        @livewire('client.edit', [$client])
    </div>
</div>
@endsection
