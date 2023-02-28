@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.contentTag.title_singular') }}:
                    {{ trans('cruds.contentTag.fields.id') }}
                    {{ $contentTag->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.contentTag.fields.id') }}
                            </th>
                            <td>
                                {{ $contentTag->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contentTag.fields.name') }}
                            </th>
                            <td>
                                {{ $contentTag->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contentTag.fields.slug') }}
                            </th>
                            <td>
                                {{ $contentTag->slug }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('content_tag_edit')
                    <a href="{{ route('admin.content-tags.edit', $contentTag) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.content-tags.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection