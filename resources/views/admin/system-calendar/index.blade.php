@extends('layouts.admin')

@push('styles')
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.css' />
@endpush

@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('cruds.systemCalendar.title') }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <div id="calendar" class="pt-3"></div>
    </div>
</div>
@endsection

@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js'></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    events: @json($events),
    initialView: 'dayGridMonth',
  });
  calendar.render();
});
    </script>
@endpush