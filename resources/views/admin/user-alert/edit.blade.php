@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-header-container">
                    <h6 class="card-title">
                        {{ trans('global.edit') }}
                        {{ trans('cruds.userAlert.title_singular') }}:
                        {{ trans('cruds.userAlert.fields.id') }}
                        {{ $userAlert->id }}
                    </h6>
                </div>
            </div>

            <div class="card-body">
                @livewire('user-alert.edit', [$userAlert])
            </div>
        </div>
    </div>
</div>
@endsection
