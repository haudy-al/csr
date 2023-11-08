@extends('layouts.app')

@section('home')
    @include('layouts.header2')
@endsection

@section('content')
    <section class="section section-sm bg-default">
        <div class="container">
            <div id='calendar'></div>
        </div>

        <div class="modal fade" id="activityModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle"></h5>
                        <small id="tglStart"></small>

                    </div>
                    <div class="modal-body" id="modalDescription"></div>

                </div>
            </div>
        </div>


    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    @foreach ($activities as $activity)
                        {
                            title: '{{ $activity->title }}',
                            description: '{{ $activity->description }}',
                            start: '{{ $activity->date }}',
                        },
                    @endforeach
                ],
                eventClick: function(info) {
                    const options = {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    };
                    const tanggalTerformat = info.event.start.toLocaleDateString(undefined, options);
                    $('#modalTitle').text(info.event.title);
                    $('#modalDescription').text(info.event.extendedProps.description);
                    $('#tglStart').text(tanggalTerformat);

                    tglStart

                    $('#activityModal').modal('show');
                }
            });
            calendar.render();
        });
    </script>
@endsection

@section('custom_cdn')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
@endsection
