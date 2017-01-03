<div role="tabpanel" class="tab-pane" id="events">
    <table class="table table-striped table-hover table-bordered dashboard-table">
        <thead>
            <th colspan="2">Events</th>
            <th>Event Month</th>
        </thead>
        @foreach($events as $event)
        <tr>
            <td style="text-align: center" width="50"><input type="checkbox"></td>
            <td>{{ $event->event_name }}</td>
            <td>{{ $event->month }}</td>
        </tr>
        @endforeach
    </table>
</div>


