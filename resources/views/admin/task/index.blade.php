@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-header-container">
                    <h6 class="card-title">
                        {{ trans('cruds.task.title_singular') }}
                        {{ trans('global.list') }}
                    </h6>

                    @can('task_create')
                        <a class="btn btn-primary" href="{{ route('admin.tasks.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.task.title_singular') }}
                        </a>
                    @endcan
                </div>
            </div>
            @livewire('task.index')

        </div>
    </div>
</div>
@endsection
