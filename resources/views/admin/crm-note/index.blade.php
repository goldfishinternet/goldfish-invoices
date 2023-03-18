@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.crmNote.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('crm_note_create')
                    <a class="btn btn-primary" href="{{ route('admin.crm-notes.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.crmNote.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('crm-note.index')

    </div>
</div>
@endsection
