@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-header-container">
                    <h6 class="card-title">
                        {{ trans('global.create') }}
                        {{ trans('cruds.role.title_singular') }}
                    </h6>
                </div>
            </div>

            <div class="card-body">
                @livewire('role.create')
            </div>
        </div>
    </div>
</div>
@endsection
