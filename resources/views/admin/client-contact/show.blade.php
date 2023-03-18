@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('global.view') }}
            {{ trans('cruds.clientContact.title_singular') }}:
            {{ trans('cruds.clientContact.fields.id') }}
            {{ $clientContact->id }}
        </h4>
    </div>
    <div class="card-body">
        <table class="table table-view">
                <tbody class="bg-white">
                    <tr>
                        <th>
                            {{ trans('cruds.clientContact.fields.id') }}
                        </th>
                        <td>
                            {{ $clientContact->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientContact.fields.client') }}
                        </th>
                        <td>
                            @if($clientContact->client)
                                {{ $clientContact->client->name ?? '' }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientContact.fields.first_name') }}
                        </th>
                        <td>
                            {{ $clientContact->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientContact.fields.last_name') }}
                        </th>
                        <td>
                            {{ $clientContact->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientContact.fields.email') }}
                        </th>
                        <td>
                            {{ $clientContact->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientContact.fields.phone') }}
                        </th>
                        <td>
                            {{ $clientContact->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientContact.fields.mobile') }}
                        </th>
                        <td>
                            {{ $clientContact->mobile }}
                        </td>
                    </tr>
                </tbody>
            </table>
        <div class="form-group">
            @can('client_contact_edit')
                <a href="{{ route('admin.client-contacts.edit', $clientContact) }}" class="btn btn-primary mx-1">
                    {{ trans('global.edit') }}
                </a>
            @endcan
            <a href="{{ route('admin.client-contacts.index') }}" class="btn btn-secondary">
                {{ trans('global.back') }}
            </a>
        </div>
    </div>
</div>
@endsection
