@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('global.my_profile') }}</h3>
            </div>
            <div class="card-body">
                @livewire('update-profile-information-form')
                <hr>
                @livewire('update-password-form')
            </div>
        </div>
    </div>
</div>
@endsection
