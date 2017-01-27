<div role="tabpanel" class="tab-pane" id="events">
    {{--{{ Form::model($user, ['route' => 'frontend.user.profile.submit_events', $user->id, 'class' => 'form-horizontal', 'method' => 'PATCH']) }}--}}
    {{ Form::model($user, ['route' => ['frontend.user.profile.submit_events', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files'=>true]) }}
        <table class="table table-striped table-hover table-bordered dashboard-table">
            <thead>
                <th colspan="2">Events</th>
                <th>Event Month</th>
            </thead>
            @foreach($events as $event)
            <tr>
                <td style="text-align: center" width="50"><input type="checkbox" value="{{ $event->id }}" name="event[]"></td>
                <td>{{ $event->event_name }}</td>
                <td>{{ $event->month }}</td>
            </tr>
            @endforeach
        </table>
        <button type="submit" class="btn btn-default">Save Events</button>
    </form>
</div>


