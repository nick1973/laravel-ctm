<div role="tabpanel" class="tab-pane" id="events">
    {{--{{ Form::model($user, ['route' => 'frontend.user.profile.submit_events', $user->id, 'class' => 'form-horizontal', 'method' => 'PATCH']) }}--}}
    {{ Form::model($user, ['route' => ['frontend.user.profile.submit_events', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files'=>true]) }}
        <table class="table table-striped table-hover table-bordered dashboard-table">
            <thead>
                <th colspan="2">Events</th>
                <th>Event Date</th>
            </thead>
            @foreach($events as $event)
            <tr>
                @foreach($user->tags as $tags)
                    <?php $checked = ''; ?>
                    @if($tags->pivot->tag_id==$event->id)
                            <?php $checked = 'checked'; ?>
                    @endif
                @endforeach
                    <td style="text-align: center" width="50">
                        <input type="checkbox" value="{{ $event->id }}" name="event[]" {{ $checked }}>
                    </td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->date }}</td>
            </tr>
            @endforeach
        </table>
        <button type="submit" class="btn btn-default">Save Events</button>
    </form>
</div>