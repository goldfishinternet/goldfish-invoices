@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100 lg:w-6/12">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ __('global.my_team') }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                @livewire('team.my-team-form')
            </div>
        </div>
    </div>
</div>
@endsection