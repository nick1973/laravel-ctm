<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        #map
        {
            height:800px;
            width:1600px;
            display:block;
        }
    </style>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC4ifOTnjExDqnT5lB6Ets0MVExftNHzI"></script>
    <script type="text/javascript">

        function getPosition(callback) {
            var geocoder = new google.maps.Geocoder();
            var postcode = document.getElementById("postcode").value;

            geocoder.geocode({'address': postcode}, function(results, status)
            {
                if (status == google.maps.GeocoderStatus.OK)
                {
                    callback({
                        latt: results[0].geometry.location.lat(),
                        long: results[0].geometry.location.lng()
                    });
                }
            });
        }

        function setup_map(latitude, longitude) {
            var _position = { lat: latitude, lng: longitude};

            var mapOptions = {
                zoom: 7,
                center: _position
            }

            var map = new google.maps.Map(document.getElementById('map'), mapOptions);

            var marker = new google.maps.Marker({
                position: mapOptions.center,
                map: map
            });
        }

        window.onload = function() {
            setup_map(52.5516449, -1.1961948000000575);

            document.getElementById("form").onsubmit = function() {
                getPosition(function(position){

                    var text = document.getElementById("text")
                    text.innerHTML = "Marker position: { Longitude: "+position.long+ ",  Latitude:"+position.latt+" }";

                    setup_map(position.latt, position.long);
                });
            }
        }
    </script>
</head>
<body>
<form action="javascript:void(0)" id="form">
    <input type="text" id="postcode" placeholder="Enter a postcode">
    <input type="submit" value="Show me"/>
</form>
<div id="map"></div>
<div id="text"></div>
</body>
</html>



