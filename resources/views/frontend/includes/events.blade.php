<div role="tabpanel" class="tab-pane" id="events">
    {{--{{ Form::model($user, ['route' => 'frontend.user.profile.submit_events', $user->id, 'class' => 'form-horizontal', 'method' => 'PATCH']) }}--}}
    {{ Form::model($user, ['route' => ['frontend.user.profile.submit_events', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files'=>true]) }}
        <table class="table table-striped table-hover table-bordered dashboard-table">
            <thead>
                <th colspan="2">Events</th>
                <th>Event Date</th>
                <th>Postcode</th>
            </thead>
            @foreach($events as $event)
                <?php $checked = ''; ?>
                @foreach($user->tags as $tags)
                    @if($tags->pivot->tag_id==$event->id)
                            <?php $checked = 'checked'; ?>
                    @endif
                @endforeach
                    <td style="text-align: center" width="50">
                        <input type="checkbox" value="{{ $event->id }}" name="event[]" {{ $checked }}>
                    </td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->postcode }}
                        <a class="openmodal btn btn-info pull-right" href="#myModal" data-toggle="modal" data-id="{{ $event->postcode }}"
                           data-whatever="{{ $event->postcode }}" data-event="{{ $event->name }}">View Map</a>
                    </td>
                    </tr>
            @endforeach
        </table>
        <button type="submit" class="btn btn-default">Save Events</button>
    </form>

</div>
<style>
    #map {
        width: 100%;
        height: 700px;
    }
</style>
<div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="back" >
            <div class="modal-header">
                <h4>Event<h4>
            </div>
            <div class="modal-body">
                <div id="map"></div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>
<script>
    var ev = []
    var map;
    var event_name;
    function initMap() {
        var infoWin = new google.maps.InfoWindow();
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 54.5, lng: -3.644},
            zoom: 6
        });

        var markers = ev.map(function(location, i) {
            var marker = new google.maps.Marker({
                position: location,
            });
            google.maps.event.addListener(marker, 'click', function(evt) {
                //infoWin.setContent(location.info);
                infoWin.setContent(event_name);
                infoWin.open(map, marker);
            })
            infoWin.setContent(event_name);
            infoWin.open(map, marker);
            return marker;
        });
        var markerCluster = new MarkerClusterer(map, markers,
                {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
    }

    $('#myModal').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var post = button.data('whatever')
        event_name = button.data('event')
        ev = []
        $.ajax({
            type: "POST",
            url: '/dashboard/manager/postcode',
            data: {
                event: post}
        }).done(function(data) {
            $.each( data.ev, function( index, value ){
                ev.push({'lat': + value['latitude'], 'lng': + value['longitude']})
            });
        });
        setTimeout(function(){
            initMap()
            google.maps.event.trigger(map, "resize");
        }, 1000)
    });
</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCD7jKYXhgDTka8qlsPSqNcU2HV7DCwfUs"></script>


