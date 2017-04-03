@extends('frontend.layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-12 col-lg-12">
            <h3>Event List
                <a href="{{ route('dashboard.events.create') }}" class="btn btn-warning">Add an Event</a>
                <a class="openmodal btn btn-info" href="#eventsMap" data-toggle="modal">Events Map</a>
            </h3>

            <div class="col-md-8">
                {{--<a href="{{ route('dashboard.events.create') }}" class="btn btn-warning">Add an Event</a>--}}
                {{--<a href="{{ route('admin.dropdown_management.create') }}" class="btn btn-warning">Add to LOB</a>--}}
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="visible-lg" colspan="">Events</th>
                        <th class="visible-lg" colspan="">Visible</th>
                        <th class="visible-lg" colspan="">Start Date</th>
                        <th class="visible-lg" colspan="2">Postcode</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $results)
                        <tr>
                            {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['dashboard.events.destroy', $results->id]
                            ]) !!}
                            <td class="eventName">{{ $results->name }}</td>
                            <td>
                                @if($results->visible==1)
                                    Visible
                                    @else
                                    Not Visible
                                    @endif
                            </td>
                            <td>{{ $results->date }}</td>
                            <td class="postcode">{{ $results->postcode }}</td>
                            <td width="150px">
                                <a href="{{ route('dashboard.events.edit', $results->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            </td>
                        </tr>
                    {!! Form::close() !!}
                    @endforeach
                </table>
                <a href="{{ route('dashboard.events.create') }}" class="btn btn-warning">Add an Event</a>
            </div>
    </div><!-- col-md-10 -->

    </div><!-- row -->
    <style>
        #map {
            width: 100%;
            height: 700px;
        }
    </style>
    <div class="modal fade" id="eventsMap" role="dialog" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="back" >
                <div class="modal-header">
                    <h4>Events<h4>
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
        var event_name = [];
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
                    infoWin.setContent(event_name.reverse()[i]);
                    //console.log(event_name.reverse()[i])
                    infoWin.open(map, marker);
                })
                return marker;
            });
            var markerCluster = new MarkerClusterer(map, markers,
                    {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
        }

        $('#eventsMap').on('shown.bs.modal', function (event) {
            var post = []
            $(".eventName").each(function (index, element) {
                event_name.push($( this ).text())
            })

            $(".postcode").each(function (index, element) {
                var str = $( this ).text().replace(/\s/g,'');
                post.push(str)
            })
            console.log(post)
            console.log(event_name)
            //event_name = button.data('event')
            ev = []
            $.ajax({
                type: "POST",
                url: '/dashboard/manager/postcode',
                data: {
                    postcodes: post}
            }).done(function(data) {
                $.each( data.data, function( index, value ){
                    ev.push({'lat': + value['latitude'], 'lng': + value['longitude']})
                });
            });
            //console.log(ev)
            setTimeout(function(){
                initMap()
                google.maps.event.trigger(map, "resize");
            }, 1000)
        });
    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCD7jKYXhgDTka8qlsPSqNcU2HV7DCwfUs"></script>

@endsection

