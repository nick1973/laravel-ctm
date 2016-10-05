<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html ng-app="specApp">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet"
          href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.17/angular.min.js"></script>

    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>


    <style>
        /*th{padding:20px 7px; font-size:14px; color:#ffffff; background:#428bca;}*/
        /*td{padding:5px 10px; height:35px;}*/

        .search-table-outter { overflow-x: scroll; }
        /*th, td { min-width: 155px; }*/
        .large { min-width: 150px; }
        .small { min-width: 75px; }

        .nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus{
            background-color:#428bca;
            color: white;
        }
        .DocumentList
        {
            overflow-x:scroll;
            overflow-y:hidden;
            /*height:200px;*/
            width:100%;
            /*padding: 0 15px 0 0;*/
        }

        .DocumentItem
        {
            /*border:1px solid black;*/
            height:200px;
            width: 400px;
        }

        .list-inline {
            white-space:nowrap;
        }

        .cost-table{
            padding: 0 0 5px 10px;
            color: #000000;
            background: #f5f5f5;
            /*text-align: center;*/
            width: 150px;
        }

        .cost-td{
            width: 150px;
        }

        td.details-control {
            background: url('/details_open.png') no-repeat center center;
            cursor: pointer;
        }
        tr.shown td.details-control {
            background: url('/details_close.png') no-repeat center center;
        }
    </style>

</head>
<body id="app-layout" ng-controller="MondayCtrl">
<?php

function dayOfWeek($day){
    switch ($day) {
        case 1:
            return "Monday";
            break;
        case 2:
            return "Tuesday";
            break;
        case 3:
            return "Wednesday";
            break;
        case 4:
            return "Thursday";
            break;
        case 5:
            return "Friday";
            break;
        case 6:
            return "Saturday";
            break;
        case 0:
            return "Sunday";
            break;
        default:
            return "Oops!";
    }
}

function next_day($day){
    $day = $day + 1;
    $x = dayOfWeek($day);
    $next_lower_day = strtolower($x);
    return $next_lower_day;
}



$ctm_start = new \Carbon\Carbon($ctm_start_date);
$ctm_start_date_table = new \Carbon\Carbon($ctm_start_date);
$ctm_start_date_ng = new \Carbon\Carbon($ctm_start_date);
$ctm_start_date_scope = new \Carbon\Carbon($ctm_start_date);
//$day_number = $ctm_start_date->dayOfWeek;


$date = new DateTime('2011-06-28 00:00:00');
$count = 24 * 60 / 15;
$arr = array();
while($count--) {
    $arr[] = $date->add(new DateInterval("P0Y0DT0H15M"))->format("H:i");
}
echo $arr[1];
?>
@include('includes.partials.logged-in-as')
@include('frontend.includes.nav')
<div class="jumbotron">
    <div class="container">
        <div class="col-md-6">
            <h2>Managers Dashboard</h2>
            <a href="/dashboard/ops" class="btn btn-warning">Back to Dashboard</a>
            <a href="#" class="btn btn-info active">Staff Booking Form</a>
        </div>
        <div class="col-md-6">

        </div>
    </div>
</div>
<div class="">
        <div class="col-md-12 col-lg-12">
            <h1>Spec for {{ $event->event_name }}, {{ $diffInDays }} Day Event.</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-lg-4 col-md-4">
                        <h4>Contract Manager: {{ $event->contract_manager }}:
                        Operation Manager: {{ $event->operation_manager }}</h4>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <h4>Event Start Date: {{ $event->event_start_date }}:
                        Event End Date: {{ $event->event_end_date }}</h4>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <h4>CTM Start Date: {{ $event->ctm_start_date }}:
                        CTM End Date: {{ $event->ctm_end_date }}</h4>
                    </div>
                </div>
            </div>
            <button id="addRow">addRow</button>
            <table id="example2" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th></th>
                    <th>row id</th>
                    <th>Role</th>
                    <th>Position</th>
                    <th>Qty</th>
                </tr>
                {{--<tr>--}}
                    {{--<td>--}}
                <table id="staffing" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Column 1</th>
                        <th>Column 2</th>
                        <th>Column 3</th>
                        <th>Column 4</th>
                        <th>Column 5</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Column 1</th>
                        <th>Column 2</th>
                        <th>Column 3</th>
                        <th>Column 4</th>
                        <th>Column 5</th>
                    </tr>
                    </tfoot>
                </table>
                    {{--</td>--}}
                {{--</tr>--}}


                </thead>
                <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>


                </tr>
                </tfoot>
            </table>

            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br></br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br></br>
            </br>
            </br>
            </br>
            </br></br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>




            <hr>
            <hr>

            {{--<table id="example" class="display" cellspacing="0" width="100%">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th>Column 1</th>--}}
                    {{--<th>Column 2</th>--}}
                    {{--<th>Column 3</th>--}}
                    {{--<th>Column 4</th>--}}
                    {{--<th>Column 5</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tfoot>--}}
                {{--<tr>--}}
                    {{--<th>Column 1</th>--}}
                    {{--<th>Column 2</th>--}}
                    {{--<th>Column 3</th>--}}
                    {{--<th>Column 4</th>--}}
                    {{--<th>Column 5</th>--}}
                {{--</tr>--}}
                {{--</tfoot>--}}
            {{--</table>--}}





        </div><!-- col-md-12 -->
</div><!-- container -->






<div id="spec_table" class="">
    {!! Form::model($event,[
                            'method' => 'POST',
                            'route' => ['dashboard.sbf.store'],
                            'class' => 'form-horizontal',
                            'id'    => 'spec_rows'])
                            !!}
    {{--<form id="spec_rows">--}}
    <input class="hidden" name="events_id" value="{{ $event->id }}">
    <table class="table search-table inner">
        <thead>
        <tr>
            <th></th>
            <th>Role</th>
            <th>Qty</th>
            <th>Position</th>
            @for($i=0; $i <= $diffInDays-1; $i++)
                @if($day_number_table ==7)
                    <?php $day_number_table=0 ?>
                @endif
                <th>{{ dayOfWeek($day_number_table) }} {{ $ctm_start_date_table->day }} Start</th>
                <th>{{ dayOfWeek($day_number_table) }} {{ $ctm_start_date_table->day }} End</th>
                <th>{{ dayOfWeek($day_number_table) }} Hours</th>
                <?php $day_number_table++; $ctm_start_date_table->addDay(); ?>
            @endfor
            <th>Total</th>
        </tr>
        </thead>
        <tbody>

        {{--<tr ng-repeat="staf in staff">--}}
            {{--<td width="200">--}}
                {{--<input type="button" value="Add"--}}
                       {{--class="btn btn-danger addproduct"--}}
                       {{--ng-click="addRow()"/>--}}
            {{--</td>--}}
            {{--<td width="200">--}}
                {{--<input class="form-control large" type="text"--}}
                       {{--ng-model="staf.fname" readonly>--}}
            {{--</td>--}}
        {{--</tr>--}}

        <tr ng-repeat="spec in specs track by $index">

            <td width="200">
                <input name="grade[]" class="form-control large" type="text"
                       value="@{{spec.grade}}" readonly>
            </td>
            <td width="100">
                <input name="qty[]" class="form-control" type="text"
                       value="@{{spec.qty}}" readonly>
            </td>
            <td width="300">
                <input name="position[]" class="form-control large" type="text"
                       value="@{{spec.position}}" readonly>
            </td>
            <?php
            $week = 0;
            ?>
            @for($i=0; $i <= $diffInDays-1; $i++)
                <?php
                if($i % 7 == 0){
                    $week++;
                }
                ?>
                @if($day_number_ng ==7)
                    <?php $day_number_ng=0 ?>
                @endif
                <?php
                $x = dayOfWeek($day_number_ng);
                $lower_day = strtolower($x);
                $start = "{{ spec.week$week." . $lower_day . $i . "_start }}";
                $end = "{{ spec.week$week." . $lower_day . $i . "_end}}";
                $sub_total = "{{ spec.week$week." . $lower_day . $i . "_sub_total }}";
                ?>
                <td width="100">
                    <input name="{{ $lower_day }}_start[]" class="form-control users" type="text"
                           value="{{ $start }}" id="" readonly>
                </td>
                <td width="100">
                    <input name="{{ $lower_day }}_end[]" class="form-control users" type="text"
                           value="{{ $end }}" readonly>
                </td>
                <td width="100">
                    <input name="{{ $lower_day }}_hours[]" class="form-control users" type="text"
                           value="{{ $sub_total }}" readonly>
                </td>
                <?php $day_number_ng++; //$week++; ?>
                @endfor

                <td>
                    <div class="has-success has-feedback">
                        <input name="total[]" class="form-control users" type="text"
                               value="@{{spec.total}}" readonly>
                    </div>
                </td>
        </tr>
        </tbody>
    </table>
    <div class="form-group col-md-3 col-lg-3">
        <button class="btn btn-success pull-right" type="submit">Save SBF</button>
    </div>
    </form>
</div>
<footer>
    </br>
</footer>
</body>
</html>

<script>
    /* Formatting function for row details - modify as you need */
    function format ( d ) {
        // `d` is the original data object for the row
        var output = $("#example2");
        Object.size = function(obj) {
            var size = 0, key;
            for (key in obj) {
                if (obj.hasOwnProperty(key)) size++;
            }
            return size-7;
        };
            // Get the size of an object
        var daySize = Object.size(d);

    for(var x = 1; x <= daySize; x++) {
        var foo = 'week' + x.toString()
        output += '<tr>';
        output += '<td style="font-weight: bold">WEEK: ' + x + '</td>';
        output += '</tr>';
        output += '<tr>';
        for (var i = 1; i <= d.qty; i++) {
            var counter = 0;
            var dayNumber = '{{ $day }}';

            output += '<tr>';
            //output += '</tr>';
            output += '<tr>';
            $.each(d[foo], function (index, value) {
                if(counter % 7 == 0 && x > 1){
                    dayNumber = +dayNumber+7
                }
                if(index.includes("saturday")){
                    if(index.includes("start")){
                        var day = "Saturday"+dayNumber+" Start"
                    }
                    if(index.includes("end")){
                        var day = "Saturday"+dayNumber+" End"
                    }
                    if(index.includes("sub_total")){
                        var day = "Saturday"+dayNumber+" Hours"
                    }
                }
                if(index.includes("sunday")){
                    if(index.includes("start")){
                        var day = "Sunday"+dayNumber+" Start"
                    }
                    if(index.includes("end")){
                        var day = "Sunday"+dayNumber+" End"
                    }
                    if(index.includes("sub_total")){
                        var day = "Sunday"+dayNumber+" Hours"
                    }
                }
                if(index.includes("monday")){
                    if(index.includes("start")){
                        var day = "Monday"+dayNumber+" Start"
                    }
                    if(index.includes("end")){
                        var day = "Monday"+dayNumber+" End"
                    }
                    if(index.includes("sub_total")){
                        var day = "Monday"+dayNumber+" Hours"
                    }
                }
                if(index.includes("tuesday")){
                    if(index.includes("start")){
                        var day = "Tuesday"+dayNumber+" Start"
                    }
                    if(index.includes("end")){
                        var day = "Tuesday"+dayNumber+" End"
                    }
                    if(index.includes("sub_total")){
                        var day = "Tuesday"+dayNumber+" Hours"
                    }
                }
                if(index.includes("wednesday")){
                    if(index.includes("start")){
                        var day = "Wednesday"+dayNumber+" Start"
                    }
                    if(index.includes("end")){
                        var day = "Wednesday"+dayNumber+" End"
                    }
                    if(index.includes("sub_total")){
                        var day = "Wednesday"+dayNumber+" Hours"
                    }
                }
                if(index.includes("thursday")){
                    if(index.includes("start")){
                        var day = "Thursday"+dayNumber+" Start"
                    }
                    if(index.includes("end")){
                        var day = "Thursday"+dayNumber+" End"
                    }
                    if(index.includes("sub_total")){
                        var day = "Thursday"+dayNumber+" Hours"
                    }
                }
                if(index.includes("friday")){
                    if(index.includes("start")){
                        var day = "Friday"+dayNumber+" Start"
                    }
                    if(index.includes("end")){
                        var day = "Friday"+dayNumber+" End"
                    }
                    if(index.includes("sub_total")){
                        var day = "Friday"+dayNumber+" Hours"
                    }
                }

                //if(value.length > 0){
                    output += '<td class="large" style="font-weight: bold; background-color: #dddddd">'+day+'</td>';
                //}

                counter++;
                if (counter % 3 == 0) {
                    output += '<td class="small"></td>'
                    //output += '</tr>';
                    dayNumber++
                }
            });
                    output += '<tr>'
            $.each(d[foo], function (index, value) {
                    output += '<td class="large">' + value + '</td>';
                counter++;
                if (counter % 3 == 0) {
                    output += '<td class="small"></td>'
                    //output += '</tr>';
                    dayNumber++
                }
            });
            output += '<td>'+d.total+'</td>'
            output += '</tr>';

            var id = 'staff'+i+''
            output += '<tr id=' +
                    id+'>';
            output += '<td style="font-weight: bold">Staff: ' + i + '</td>';
            output += '<td>Full Shift <input name="qty[]" class="" type="checkbox"></td>';
//            $.each(d[foo], function (index, value) {
//                //output += '<td class="large">' + value + '</td>';
//                counter++;
//                if (counter % 3 == 0) {
//                    output += '<td> <input name="qty[]" class="" type="checkbox"</td>'
//                    dayNumber++
//                }
//            });
            output += '<td><input name="qty[]" class="form-control" type="text"></td>';
            output += '<td><input name="qty[]" class="form-control" type="text"></td>';
            output += '<td><input name="qty[]" class="form-control" type="text"></td>';
            output += '<td><input name="qty[]" class="form-control" type="text"></td>';
            output += '<td><input name="qty[]" class="form-control" type="text"></td>';
            output += '<td><input name="qty[]" class="form-control" type="text"></td>';
            output += '<td><input name="qty[]" class="form-control" type="text"></td>';
            output += '<td><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></td>';
            output += '</tr>';

//            output += '<table id="staffing" class="display" cellspacing="0" width="100%"> ' +
//                    '<thead> ' +
//                    '<tr> ' +
//                    '<th>Column 1</th> ' +
//                    '<th>Column 2</th> ' +
//                    '<th>Column 3</th> ' +
//                    '<th>Column 4</th> ' +
//                    '<th>Column 5</th> ' +
//                    '</tr> ' +
//                    '</thead> ' +
//                    '<tfoot> ' +
//                    '<tr> ' +
//                    '<th>Column 1</th> ' +
//                    '<th>Column 2</th> ' +
//                    '<th>Column 3</th> ' +
//                    '<th>Column 4</th> ' +
//                    '<th>Column 5</th> ' +
//                    '</tr> ' +
//                    '</tfoot> ' +
//                    '</table>'

        }
    }
            //output+='</table>';
            return output;
    }

    $(document).ready(function() {
        var table = $('#example2').DataTable( {
            "ajax": "/event/{{ $event->id }}",
            dom: '<"top"Blf>rT<"bottom"p><"clear">',
            buttons: [
                'copy', 'csv', 'excel', 'pdf'
            ],

            "columns": [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                { "data": "row_id" },
                { "data": "grade" },
                { "data": "position" },
                { "data": "qty" }

            ],
            "order": [[1, 'asc']]
        } );


        var t = $('#staffing').DataTable();
        var counter = 1;

        $('#addRow').on( 'click', function () {
            t.row.add( [
                counter +'.1',
                counter +'.2',
                counter +'.3',
                counter +'.4',
                'test' + counter

            ] ).draw( false );

            counter++;
        } );

        // Automatically add a first row of data
        //$('#addRow').click();


        // Add event listener for opening and closing details
        $('#example2 tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        } );


    } );





    $(document).ready(function() {
        var t = $('#staff').DataTable();
        var counter = 1;

        $('#addRow').on( 'click', function () {
            t.row.add( [
                counter +'.1',
                counter +'.2',
                counter +'.3',
                counter +'.4',
                'test' + counter

            ] ).draw( false );

            counter++;
        } );

        // Automatically add a first row of data
        $('#addRow').click();
    } );



    var specApp = angular.module("specApp", []);
    specApp.controller("MondayCtrl", function ($scope, $http) {

        $http.get("/event/{{ $event->id }}")
                .then(function (response) {
                    $scope.specs = response.data.data;
                });
        //console.log($scope.specs)
        $scope.specs = [];
        $scope.staff = [];
        var myArray = {'fname':'Bob'};
        $scope.staff.push(myArray)
        $scope.addRow = function(){

            var myArray = {'fname':'Bob'};
            $scope.staff.push(myArray)
        };

        $scope.removeRow = function (grade) {
            var index = 0;
            var comArr = eval($scope.staff);
            for (var i = 0; i < comArr.length; i++) {
                if (comArr[i].grade === grade) {
                    index = i;
                    break;
                }
            }
            if (index === -1) {
                alert("Something gone wrong");
            }
            $scope.staff.splice(index, 1);
        };
    });
</script>

