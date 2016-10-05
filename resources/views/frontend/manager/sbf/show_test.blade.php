<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
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


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    {{--<link rel="stylesheet" href="/resources/demos/style.css">--}}
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    {{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--}}
    {{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>--}}
    {{--<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.17/angular.min.js"></script>--}}

    {{--<script src="//code.jquery.com/jquery-1.12.3.js"></script>--}}
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>



    {{--<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">--}}
    {{--<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>--}}
<style>
    td.details-control {
        background: url('/details_open.png') no-repeat center center;
        cursor: pointer;
    }
    tr.shown td.details-control {
        background: url('/details_close.png') no-repeat center center;
    }

    .dataTables_length, .dataTables_filter, .dataTables_info, .dataTables_paginate, .paging_simple_numbers
    {
        display: none;
    }

    .row_selected{background-color: #0000ff !important; z-index:9999}

    .large { min-width: 150px; }
    .medium { min-width: 100px; }
    .small { min-width: 50px; }

    /*table.dataTable thead th, table.dataTable thead td{*/
        /*border-bottom: none;*/
    /*}*/
    /*table.dataTable.no-footer{*/
        /*border-bottom: 1px solid #111;*/
    /*}*/
</style>

</head>
<body id="app-layout" ng-controller="MondayCtrl">
<?php
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

            <table id="exampleTable">
                <thead>
                <tr>
                    <th></th>
                    <th>row id</th>
                    <th>Role</th>
                    <th>Position</th>
                    <th>Qty</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tbody>
            </table>


            <table id="staff" class="table" cellspacing="0" width="100%" hidden>
            <thead>
                <tr style="color: #5bc0de">
                    <th>Start</th>
                    <th>Finish</th>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th>Driver</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>RTW</th>
                    <th>Medical</th>
                    <th>Age</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
                <tbody>
                    <tr>
                        <th class="medium"></th>
                        <th class="medium"></th>
                        <td><input class="form-control" type="text" value=""/></td>
                        <td><input class="form-control" type="text" value=""/></td>
                        <td><input class="form-control" type="text" value=""/></td>
                        <td><input class="form-control" type="text" value=""/></td>
                        <td><input class="form-control" type="text" value=""/></td>
                        <td><input class="form-control" type="text" value=""/></td>
                        <td><input class="form-control" type="text" value=""/></td>
                        <td><input class="form-control" type="text" value=""/></td>
                        <td><input class="form-control btn btn-info" type="button" value="Split" onclick="staffing(this)"/></td>
                        <th></th>
                    </tr>
                </tbody>
            </table>
        </div><!-- col-md-12 -->
</div><!-- container -->

<footer>
    </br>
</footer>
</body>
</html>

<script>
    $(document).ready(function() {


    });
</script>

<script>
var iTableCounter = 1;
var oInnerTable;
var oTable;
var table;
var TableHtml;
// IN A FUNCTION THAT PASSES THE MAIN PARENT ID TO USE TO HOOK
function staffing(id) {
    var id = $(id).closest('table').attr('id');
        function add() {
            var t = $("#" + id).DataTable();
            t.row.add( [

                '<td class="large"><select class="form-control"><option><?php foreach($arr as $time) {?><option>{{ $time }}</option><?php } ?></option></select></td>',
                '<td width="75"><select class="form-control"><option><?php foreach($arr as $time) {?><option>{{ $time }}</option><?php } ?></option></select></td>',
                '<td><input class="form-control" type="text" value=""/></td>',
                '<td><input class="form-control" type="text" value=""/></td>',
                '<td><input class="form-control" type="text" value=""/></td>',
                '<td><input class="form-control" type="text" value=""/></td>',
                '<td><input class="form-control" type="text" value=""/></td>',
                '<td><input class="form-control" type="text" value=""/></td>',
                '<td><input class="form-control" type="text" value=""/></td>',
                '<td><input class="form-control" type="text" value=""/></td>',
                '<td><input class="form-control btn btn-info" type="button" value="Split" onclick="staffing(this)"/></td>',
                '<td><input class="form-control btn btn-danger remove" type="button" value="Remove" onclick="remove(this)"/></td>'
            ] ).draw();
        }
           add();
}

    function remove(tag) {
        var id = $(tag).closest('table').attr('id');
        $('#'+id+' tbody').on( 'click', 'tr', function () {
            var t = $("#" + id).DataTable();
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                t.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }

            $('.remove').click( function () {
                t.row('.selected').remove().draw( false );
            } );
        });
    }

    function fnFormatDetails(table_id, html) {
        $("#exampleTable_" + table_id).DataTable({
            "paging":   false,
            "ordering": false,
            "info":     false
        });

        var sOut = "<table id=\"exampleTable_" + table_id + "\">";
        sOut += html;
        sOut += "</table>";
        return sOut;
    }

    //Run On HTML Build
    $(document).ready(function () {



        TableHtml = $("#staff").html();

        //Insert a 'details' column to the table
        var nCloneTh = document.createElement('th');
        var nCloneTd = document.createElement('td');
        nCloneTd.innerHTML = '<img src="http://i.imgur.com/SD7Dz.png">';
        nCloneTd.className = "center";

        $('#exampleTable thead tr').each(function () {
            this.insertBefore(nCloneTh, this.childNodes[0]);
        });

        $('#exampleTable tbody tr').each(function () {
            this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
        });

        //Initialse DataTables
        var oTable = $('#exampleTable').dataTable({
            "ajax": "/event/{{ $event->id }}",
            //dom: '<"top"Blf>rT<"clear">',
            dom: 'Bp',
            buttons: [
                'copy', 'excel', 'pdf'
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
                { "data": "qty" },
                { "data": "qty" }
            ],
            "order": [[1, 'asc']]
        });

        var table = $('#exampleTable').DataTable({
            retrieve: true,
            searching: false
        });

        /* Add event listener for opening and closing details
         * Note that the indicator for showing which row is open is not controlled by DataTables,
         * rather it is done here
         */


        $('#exampleTable tbody').on('click', 'td.details-control', function () {
            var nTr = $(this).parents('tr')[0];
            var nextTr = $(this).parents('tr')[1];
            var tr = $(this).closest('tr');
            var row = table.row( tr );
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                this.src = "http://i.imgur.com/SD7Dz.png";
                oTable.fnClose(nTr);
            }
            else {
                /* Open this row */
                this.src = "http://i.imgur.com/d4ICC.png";

//                oTable.fnOpen(nTr, fnFormatDetails(iTableCounter, TableHtml), format(row.data()));
                oTable.fnOpen(nTr, shits(row.data()));
                oInnerTable = $("#exampleTable_" + iTableCounter).DataTable({
//                    "bJQueryUI": true,
//                    "sPaginationType": "full_numbers"
                });

                iTableCounter ++;
            }
        });



    });

function shits ( d ) {
    // `d` is the original data object for the row
    var output;
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
            output += '</tr>';
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
            //output += '<td><input class="form-control btn btn-info clone" type="button" value="Clone" onclick="clone(this)"/></td>'
            output += '</tr>';
            var id = 'staff'+i+''
            output += '<tr id='+id+'>';
            output += '<td style="font-weight: bold">Staff: ' + i + '</td>';
            output += '</tr>';

            //output += '<td colspan="'+dayNumber+'">';
            output += '<td colspan="100%">';
            output += fnFormatDetails(iTableCounter, TableHtml);
            iTableCounter ++;
            output += '<td>';
            output += '</tr>';
        }
    }
    return output;
}
</script>

