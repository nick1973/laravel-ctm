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

    {{--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}

    {{--<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">--}}

    {{--<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>--}}
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


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
    ?>
</head>
<body>
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
                    </tr>
                </tbody>
            </table>

            <form id="tabel_form" method="post" action="#">
                <table id="staff" class="table" cellspacing="0" width="100%" hidden>
                <thead>
                    <tr style="color: #5bc0de">
                        <th>Days</th>
                        <th>Start</th>
                        <th>Finish</th>
                        <th>Agency</th>
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
                            <td class="large">
                                <select name="timeObj" class="form-control" multiple>
                                    @for($i=0; $i <= $diffInDays; $i++)
                                        @if($day_number ==7)
                                            {{$day_number=0}}
                                        @endif
                                        <option id="{{ dayOfWeek($day_number) }}{{ $i }}">{{ dayOfWeek($day_number) }} {{ $ctm_start_date->day }}</option>
                                        {{ $day_number++  }} {{ $ctm_start_date->addDay() }}
                                    @endfor
                                </select>
                            </td>
                            <th class="medium"></th>
                            <th class="medium"></th>
                            <td><input class="form-control" type="text" value=""/></td>
                            {{--<td><input onclick="getId(this)" class="form-control" type="text" value=""/></td>--}}
                            <td>
                                <select onclick="getId(this)" onchange="findStaff(this)"
                                        class="form-control large">
                                    <option></option>
                                    <?php
                                    $i = 0;
                                    foreach ($users as $obj) {
                                        $i++;
                                        echo "<option id='" . $i . "' value='" . $obj{'name'} . "'>" . $obj{'name'} . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td><input onkeyup="searchLastName(this)" class="form-control noID" type="text"/></td>
                            <td><input class="form-control noID" type="text" value=""/></td>
                            <td><input class="form-control noID" type="text" value=""/></td>
                            <td><input class="form-control noID" type="text" value=""/></td>
                            <td><input class="form-control noID" type="text" value=""/></td>
                            <td><input class="form-control noID" type="text" value=""/></td>
                            <td><input class="form-control noID" type="text" value=""/></td>
                            <td><input class="form-control btn btn-info" type="button" value="Split" onclick="staffing(this)"/></td>
                            <th></th>
                        </tr>
                        <button type="submit">submit</button>
                    </tbody>
                </table>
            </form>
        </div><!-- col-md-12 -->
</div><!-- container -->
<script>
    $(function(){
        console.log( "ready!" );

        window.searchLastName = function searchLastName(item) {
            if(getId(item)){
                $(item).autocomplete({
                    source: ["c++", "java", "php", "coldfusion", "javascript", "asp", "ruby"]
                });
            }
        }

    var pay_grades = <?php echo json_encode($users);?>;
    //$("#exampleTable_1first_name").change(function () {
        window.findStaff = function findStaff(item) {
        var tableId = $(item).closest('table').attr('id')
        var id = $(item).children(":selected").attr("id");//the count
        var x = id - 1;
        //console.log(x);
        var input = $('#'+tableId+'_staff4');
        input.val(pay_grades[x]['lastname']);
        input.trigger('input');
        /////////////////////////
        var input2 = $('#'+tableId+'_staff5');
        input2.val(pay_grades[x]['uk_driving_license']);
        input2.trigger('input');
        /////////////////////////
        var input3 = $('#'+tableId+'_staff6');
        input3.val(pay_grades[x]['mobile']);
        input3.trigger('input');
        //////////////////////////////////
        var input3 = $('#'+tableId+'_staff7');
        input3.val(pay_grades[x]['email']);
        input3.trigger('input');
        //////////////////////////////////
        var input3 = $('#'+tableId+'_staff8');
        input3.val(pay_grades[x]['charge_per_hour']);
        input3.trigger('input');
        //////////////////////////////////
        var input3 = $('#'+tableId+'_staff9');
        input3.val(pay_grades[x]['medical_conditions']);
        input3.trigger('input');
        //////////////////////////////////
        var input3 = $('#'+tableId+'_staff10');
        input3.val(pay_grades[x]['id']);
        input3.trigger('input');
        //console.log(pay_grades[x]['id']);
    };

        window.getId = function getId(id) {
        var tableId = $(id).closest('table').attr('id')
        var first_name = $(id).attr('id',tableId+'first_name')
        var count = 1
        $('#'+tableId).find('td').each(function(i, el) {
            var inputEl = $(el).children().get(0)
            var input = $(inputEl).hasClass('noID')
            if(input){
                $(inputEl).attr('id',tableId+'_staff'+count)

            }
            count++
        })
            console.log(first_name)
            return true;
    }
    });
</script>

<footer>
</footer>
</body>
</html>

@include('frontend.manager.sbf.includes.tables')

