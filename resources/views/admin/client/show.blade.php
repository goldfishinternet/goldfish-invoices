@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('global.view') }}
            {{ trans('cruds.client.title_singular') }}:
            {{ trans('cruds.client.fields.id') }}
            {{ $client->id }}
        </h4>
    </div>
    <div class="card-body">
        <table class="table table-view">
                <tbody class="bg-white">
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.id') }}
                        </th>
                        <td>
                            {{ $client->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.name') }}
                        </th>
                        <td>
                            {{ $client->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.address_1') }}
                        </th>
                        <td>
                            {{ $client->address_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.address_2') }}
                        </th>
                        <td>
                            {{ $client->address_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.city') }}
                        </th>
                        <td>
                            {{ $client->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.region') }}
                        </th>
                        <td>
                            {{ $client->region }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.country') }}
                        </th>
                        <td>
                            {{ $client->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.postcode') }}
                        </th>
                        <td>
                            {{ $client->postcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.email') }}
                        </th>
                        <td>
                            {{ $client->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.website') }}
                        </th>
                        <td>
                            {{ $client->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.tax_status') }}
                        </th>
                        <td>
                            {{ $client->tax_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.tax_code') }}
                        </th>
                        <td>
                            {{ $client->tax_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.client_notes') }}
                        </th>
                        <td>
                            {{ $client->client_notes }}
                        </td>
                    </tr>
                </tbody>
            </table>
        <div class="form-group">
            @can('client_edit')
                <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-primary mx-1">
                    {{ trans('global.edit') }}
                </a>
            @endcan
            <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
                {{ trans('global.back') }}
            </a>
        </div>
    </div>
</div>
@endsection
