@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>
            {{ __('global.my_team') }}
        </h4>
    </div>
    <div class="card-body">
        <div class="pt-3">
            @livewire('team.my-team-form')
        </div>
    </div>
</div>
@endsection
