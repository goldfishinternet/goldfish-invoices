@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('global.edit') }}
            {{ trans('cruds.setting.title_singular') }}:
            {{ trans('cruds.setting.fields.id') }}
            {{ $setting->id }}
        </h4>
    </div>
    <div class="card-body">
        @livewire('setting.edit', [$setting])
    </div>
</div>
@endsection
