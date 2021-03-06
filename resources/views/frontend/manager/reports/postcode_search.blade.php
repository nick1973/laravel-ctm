<!doctype html>
<html>
<head>
    <style type="text/css">
        #map
        {
            height:400px;
            width:400px;
            display:block;
        }
    </style>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_0m8NKIAMw2DjvBRRS76z82ZVNxdW9bg"></script>
    <script type="text/javascript">

        var js_array = <?php echo json_encode($postcodes);?>;

        for (var i = 0; i < js_array.length; i++) {


            function getPosition(callback) {
                var geocoder = new google.maps.Geocoder();
                //var postcode = document.getElementById("postcode").value;

                geocoder.geocode({'address': js_array[i]['postcode']}, function(results, status)
                {
                    if (status == google.maps.GeocoderStatus.OK)
                    {
                        callback({
                            latt: results[0].geometry.location.lat(),
                            long: results[0].geometry.location.lng()
                        });
                        console.log(callback)
                    }
                });
            }

        }

        function setup_map(latitude, longitude) {
            var _position = { lat: latitude, lng: longitude};

            var mapOptions = {
                zoom: 8,
                center: _position
            }

            var map = new google.maps.Map(document.getElementById('map'), mapOptions);

            var marker = new google.maps.Marker({
                position: mapOptions.center,
                map: map
            });
        }

        window.onload = function() {
            setup_map(51.5073509, -0.12775829999998223);

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