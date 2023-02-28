@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.task.title_singular') }}:
                    {{ trans('cruds.task.fields.id') }}
                    {{ $task->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.task.fields.id') }}
                            </th>
                            <td>
                                {{ $task->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.task.fields.name') }}
                            </th>
                            <td>
                                {{ $task->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.task.fields.description') }}
                            </th>
                            <td>
                                {{ $task->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.task.fields.status') }}
                            </th>
                            <td>
                                @if($task->status)
                                    <span class="badge badge-relationship">{{ $task->status->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.task.fields.tag') }}
                            </th>
                            <td>
                                @foreach($task->tag as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.task.fields.attachment') }}
                            </th>
                            <td>
                                @foreach($task->attachment as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.task.fields.due_date') }}
                            </th>
                            <td>
                                {{ $task->due_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.task.fields.assigned_to') }}
                            </th>
                            <td>
                                @if($task->assignedTo)
                                    <span class="badge badge-relationship">{{ $task->assignedTo->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('task_edit')
                    <a href="{{ route('admin.tasks.edit', $task) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection