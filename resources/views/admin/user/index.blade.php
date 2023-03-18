@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('cruds.user.title_singular') }}
            {{ trans('global.list') }}
            @can('user_create')
                <a class="btn btn-primary float-end" href="{{ route('admin.users.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                </a>
            @endcan
        </h4>
    </div>
    @livewire('user.index')
</div>
@endsection
