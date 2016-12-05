<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    {{--AIzaSyBC4ifOTnjExDqnT5lB6Ets0MVExftNHzI--}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Multiple Marker</title>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="application/javascript"></script>
    // change key of google map in key parameter
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBC4ifOTnjExDqnT5lB6Ets0MVExftNHzI"></script>
    <script>
        $(document).ready(function(){
            var markers = []; // define global array in script tag so you can use it in whole page
            var myCenter=new google.maps.LatLng(35.815477, -83.24776);
            var mapProp = {
                center:myCenter,
                zoom:5,
                minZoom:2,
                mapTypeId : google.maps.MapTypeId.ROADMAP,
                mapTypeControl: true
            };
            //google map object
            var map = new google.maps.Map(document.getElementById("gMap"),mapProp);

            $("#filename").change(function(e) {

                var ext = $("input#filename").val().split(".").pop().toLowerCase();

                if($.inArray(ext, ["csv"]) == -1) {
                    alert('Upload CSV');
                    return false;
                }

                if (e.target.files != undefined) {

                    var reader = new FileReader();
                    reader.onload = function(e) {

                        var csvval=e.target.result.split("\n");
                        var csvvalue;

                        for(var i = 0; i < csvval.length; i++)
                        {
                            markers[i] = [];
                            csvvalue = csvval[i].split(",");
                            markers[i][0] = csvvalue[0]; //id
                            var lat = csvvalue[1]; //latitude
                            var lng = csvvalue[2]; //longitude
                            console.log(lng)
                            markers[i][1] = new google.maps.Marker({
                                position: new google.maps.LatLng(lat,lng),
                                map: map
                            });
                        }

                    };
                    reader.readAsText(e.target.files.item(0));
                }

                return false;

            });
        });
    </script>
</head>

<body>
<div style="width:1000px;height:600px;" id="gMap">
</div>
<input type="file" id="filename" name="filename"/>
</body>
</html>

csv file will be like

1,22.582365,79.848633
2,29.862893,77.8973
3,23.01034,72.517397
4,29.134187,79.125107

file must have csv extention , having no spaces



