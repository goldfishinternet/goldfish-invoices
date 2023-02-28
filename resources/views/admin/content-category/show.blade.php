@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.contentCategory.title_singular') }}:
                    {{ trans('cruds.contentCategory.fields.id') }}
                    {{ $contentCategory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.contentCategory.fields.id') }}
                            </th>
                            <td>
                                {{ $contentCategory->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contentCategory.fields.name') }}
                            </th>
                            <td>
                                {{ $contentCategory->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contentCategory.fields.slug') }}
                            </th>
                            <td>
                                {{ $contentCategory->slug }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('content_category_edit')
                    <a href="{{ route('admin.content-categories.edit', $contentCategory) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.content-categories.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection