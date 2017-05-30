<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="/js/ops_scripts.js"></script>
    {{--<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.17/angular.min.js"></script>--}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        /*.search-table-outter {border:2px solid red;}*/
        /*.search-table{table-layout: fixed; margin:40px auto 0px auto; }*/
        /*.search-table, td, th{border-collapse:collapse; border:1px solid #777;}*/
        th{padding:20px 7px; font-size:14px; color:#ffffff; background:#428bca;}
        td{padding:5px 10px; height:35px;}

        .search-table-outter { overflow-x: scroll; }
        .times { min-width: 120px; }
        .large { min-width: 150px; }

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

        .small-td{
            width: 20px;
        }

        .table th {
            text-align: center;
        }

        .highlighted{
            background-color: #EEEEEE;
        }
        .tabs{
            background-color:#ffff00;
        }
    </style>

</head>
<body id="app-layout">
<?php

function dayOfWeek($day){
    switch ($day) {
        case 1:
            return "Mon";
            break;
        case 2:
            return "Tues";
            break;
        case 3:
            return "Wed";
            break;
        case 4:
            return "Thurs";
            break;
        case 5:
            return "Fri";
            break;
        case 6:
            return "Sat";
            break;
        case 0:
            return "Sun";
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



$event_start_date = new \Carbon\Carbon($event_start_date);
$event_start = $event_start_date->day;
$ctm_start = new \Carbon\Carbon($ctm_start_date);
$ctm_start_date_table = new \Carbon\Carbon($ctm_start_date);
$ctm_start_date_ng = new \Carbon\Carbon($ctm_start_date);
$ctm_start_date_scope = new \Carbon\Carbon($ctm_start_date);
//$day_number = $ctm_start_date->dayOfWeek;

 $red = '';

$date = new DateTime('2011-06-28 00:00:00');
$count = 24 * 60 / 30;
$arr = array();
while($count--) {
    $arr[] = $date->add(new DateInterval("P0Y0DT0H30M"))->format("H:i");
}
echo $arr[1];
?>
@include('includes.partials.logged-in-as')
@include('frontend.includes.nav')
<div style="padding-top: 38px">
    <div class="container">
        <div class="col-md-6">
            <h2>Operation Managers Dashboard</h2>
            <a href="/dashboard/ops" class="btn btn-primary">Back to Dashboard</a>
            <a href="/dashboard/ops/create" class="btn btn-danger">Add New Event</a>
        </div>
    </div>
</div>
<div style="padding: 5px">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h3>Spec for {{ $event->event_name }}, {{ $diffInDays+1 }} Day Event, {{ $day_number }} Day Number, next day-{{next_day(0)}}
             {{ $event_start_date->format('m/d/Y') }} {{ $diffInDays_event }}
            </h3>
            {{--<button type="button" class="btn btn-danger" onclick="removeTableRow()">Remove</button>--}}
            {{--<button type="button" class="btn btn-warning" onclick="copyRow()">Copy</button>--}}
            {{--<button type="button" class="btn btn-info" onclick="clearRow()">Clear</button>--}}
        </div>
    </div>
</div>

<div style="padding: 5px">
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#tabsModal">Add Tab
        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
    </button>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#tabsModalRemove">Remove Tab
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tabsModalEdit">Edit Tab
        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
    </button>
</div>
<div class="modal fade bs-example-modal-sm" id="tabsModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Add Tab</h4>
            </div>
            <div class="modal-body">
                <form id="form_modal_tabs">
                    <div class="form-group">
                        <label for="new_text" class="control-label">Tab Name:</label>
                        <input name="new_text" type="text" class="form-control" id="new_text" value="" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" value="Add" class="btn btn-warning">
                        {{--<button data-dismiss="modal" type="submit" class="btn btn-primary">Send message</button>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" id="tabsModalRemove" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Remove Tab</h4>
            </div>
            <form id="form_modal_tabs_remove">
                <div class="modal-body">
                    <p>Choose a Spec to remove</p>
                        <div class="form-group existingTabs"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" value="Remove" class="btn btn-danger">
                            {{--<button data-dismiss="modal" type="submit" class="btn btn-primary">Send message</button>--}}
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" id="tabsModalEdit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Tab</h4>
            </div>
            <form id="form_modal_tabs_edit">
                <div class="modal-body">
                    <p>Choose a tab to edit</p>
                    <div class="form-group existingTabs"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" value="Edit" class="btn btn-info">
                        {{--<button data-dismiss="modal" type="submit" class="btn btn-primary">Send message</button>--}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Nav tabs -->
{{--NEED TO BE DYNAMIC FROM DB DATA--}}
<div style="padding-bottom: 10px">
    <ul id="tabs" class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#event_summary" aria-controls="event_summary" role="tab" data-toggle="tab">Event Summary</a></li>
        @if(empty($tab_array))
            <li role="presentation" class=""><a href="#parking" aria-controls="Parking" role="tab" data-toggle="tab">Parking</a></li>
            <li role="presentation" class=""><a href="#audit" aria-controls="Audit" role="tab" data-toggle="tab">Audit</a></li>
            <li role="presentation" class=""><a href="#csas" aria-controls="Audit" role="tab" data-toggle="tab">CSAS</a></li>
        @endif
        @foreach($tab_array as $tab)
            @if(strtolower($tab)!='event summary')
                <li role="presentation" class="{{strtolower($tab)}}"><a href="#{{strtolower($tab)}}" aria-controls="{{strtolower($tab)}}" role="tab" data-toggle="tab">{{$tab}}</a></li>

                <?php
                $table = Storage::disk('public')->get('ops_table.blade.php');
                Storage::disk('views')->put($event->id.'/'.strtolower($tab).'_table.blade.php', $table);
                ?>
            @endif
        @endforeach
    </ul>
</div>


<div id="three_tabs" class="tab-content">

    <div role="tabpanel" class="tab-pane fade in active" id="event_summary">
        Event Summary
    </div>

    @if(empty($tab_array))
        {{--PARKING--}}
        <div role="tabpanel" class="tab-pane fade in" id="parking">
            <ul id="audit_tabs" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#parking_summary" aria-controls="parking_summary" role="tab" data-toggle="tab">Summary</a></li>
                <li role="presentation" class="spec"><a href="#parking_spec" aria-controls="parking_spec" role="tab" data-toggle="tab">Spec</a></li>
                <li role="presentation" class=""><a href="#parking_costs" aria-controls="parking_costs" role="tab" data-toggle="tab">Costs</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="parking_summary">
                    summary
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="parking_spec">
                    @include('frontend.ops.tables.ops_table1')
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="parking_costs">
                    Costs
                </div>
            </div>
        </div>
        {{--AUDIT--}}
        <div role="tabpanel" class="tab-pane fade in" id="audit">
            <ul id="audit_tabs" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#audit_summary" aria-controls="audit_summary" role="tab" data-toggle="tab">Summary</a></li>
                <li role="presentation" class="spec"><a href="#audit_spec" aria-controls="audit_spec" role="tab" data-toggle="tab">Spec</a></li>
                <li role="presentation" class=""><a href="#audit_costs" aria-controls="audit_costs" role="tab" data-toggle="tab">Costs</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="audit_summary">
                    summary
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="audit_spec">
                    {{--@include('frontend.ops.tables.ops_table1')--}}
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="audit_costs">
                    Costs
                </div>
            </div>
        </div>
        {{--CSAS--}}
        <div role="tabpanel" class="tab-pane fade in" id="csas">
            <ul id="csas_tabs" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#csas_summary" aria-controls="csas_summary" role="tab" data-toggle="tab">Summary</a></li>
                <li role="presentation" class="spec"><a href="#csas_spec" aria-controls="csas_spec" role="tab" data-toggle="tab">Spec</a></li>
                <li role="presentation" class=""><a href="#csas_costs" aria-controls="csas_costs" role="tab" data-toggle="tab">Costs</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="csas_summary">
                    summary
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="csas_spec">
                    {{--@include('frontend.ops.tables.ops_table1')--}}
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="csas_costs">
                    Costs
                </div>
            </div>
        </div>
    @endif
    @foreach($tab_array as $key=>$tab)
        <div role="tabpanel" class="tab-pane fade in" id="{{strtolower($tab)}}">
            <ul id="{{strtolower($tab)}}_tabs" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#{{strtolower($tab)}}_summary" aria-controls="parking_summary" role="tab" data-toggle="tab">Summary</a></li>
                <li role="presentation" class="spec"><a href="#{{strtolower($tab)}}_spec" aria-controls="parking_spec" role="tab" data-toggle="tab">Spec</a></li>
                <li role="presentation" class=""><a href="#{{strtolower($tab)}}_costs" aria-controls="parking_costs" role="tab" data-toggle="tab">Costs</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="{{strtolower($tab)}}_summary">
                    summary
                    {{ $tab }}
                </div>
                @if($tab!="Event Summary")
                    <div role="tabpanel" class="tab-pane fade in" id="{{strtolower($tab)}}_spec">
                        @include('frontend.ops.tables.'.$event->id.'.'.strtolower($tab).'_table')
                        <script>
                            $("#hidden_tab_name").val('{{strtolower($tab)}}').attr("id",'{{strtolower($tab)}}'+"_tab_name")
                            $("#firstTable").attr("id",'{{strtolower($tab)}}'+"_Table");
                            $("#days").attr("id",'{{strtolower($tab)}}'+"_days");
                        </script>
                    </div>
                @endif
                <div role="tabpanel" class="tab-pane fade in" id="{{strtolower($tab)}}_costs">
                    Costs
                </div>
            </div>
        </div>
    @endforeach
{{--AUDIT--}}
    {{--<div role="tabpanel" class="tab-pane fade in" id="audit">--}}
        {{--<ul id="audit_tabs" class="nav nav-tabs" role="tablist">--}}
            {{--<li role="presentation" class="active"><a href="#audit_summary" aria-controls="audit_summary" role="tab" data-toggle="tab">Summary</a></li>--}}
            {{--<li role="presentation" class="spec"><a href="#audit_spec" aria-controls="audit_spec" role="tab" data-toggle="tab">Spec</a></li>--}}
            {{--<li role="presentation" class=""><a href="#audit_costs" aria-controls="audit_costs" role="tab" data-toggle="tab">Costs</a></li>--}}
        {{--</ul>--}}
        {{--<div class="tab-content">--}}
            {{--<div role="tabpanel" class="tab-pane fade in active" id="audit_summary">--}}
                {{--summary--}}
            {{--</div>--}}
            {{--<div role="tabpanel" class="tab-pane fade in" id="audit_spec">--}}
                {{--@include('frontend.ops.tables.ops_table1')--}}
            {{--</div>--}}
            {{--<div role="tabpanel" class="tab-pane fade in" id="audit_costs">--}}
                {{--Costs--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--CSAS--}}

    {{--<div role="tabpanel" class="tab-pane fade in" id="csas">--}}
        {{--<ul id="csas_tabs" class="nav nav-tabs" role="tablist">--}}
            {{--<li role="presentation" class="active"><a href="#csas_summary" aria-controls="csas_summary" role="tab" data-toggle="tab">Summary</a></li>--}}
            {{--<li role="presentation" class="spec"><a href="#csas_spec" aria-controls="csas_spec" role="tab" data-toggle="tab">Spec</a></li>--}}
            {{--<li role="presentation" class=""><a href="#csas_costs" aria-controls="csas_costs" role="tab" data-toggle="tab">Costs</a></li>--}}
        {{--</ul>--}}
        {{--<div class="tab-content">--}}
            {{--<div role="tabpanel" class="tab-pane fade in active" id="csas_summary">--}}
                {{--summary--}}
            {{--</div>--}}
            {{--<div role="tabpanel" class="tab-pane fade in" id="csas_spec">--}}
{{--                @include('frontend.ops.tables.ops_table1')--}}
            {{--</div>--}}
            {{--<div role="tabpanel" class="tab-pane fade in" id="csas_costs">--}}
                {{--Costs--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div role="tabpanel" class="tab-pane fade in" id="extra_tab">
            <ul id="csas_tabs" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#csas_summary" aria-controls="csas_summary" role="tab" data-toggle="tab">Summary</a></li>
                <li role="presentation" class="spec"><a href="#csas_spec" aria-controls="csas_spec" role="tab" data-toggle="tab">Spec</a></li>
                <li role="presentation" class=""><a href="#csas_costs" aria-controls="csas_costs" role="tab" data-toggle="tab">Costs</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="csas_summary">
                    summary
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="csas_spec">
                    {{--                @include('frontend.ops.tables.ops_table1')--}}
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="csas_costs">
                    Costs
                </div>
            </div>
    </div>
</div>
{{--<button onclick="save_tabs()">Save Tabs</button>--}}
<script>
    function save_tabs() {
        var formData = $("#tabs_form").serializeArray();
        var tab_href = []
        var tab_title = []
        var tabs_to_be_saved = $("#tabs li").find('a').each(function () {
            tab_title.push($(this).text())
            tab_href.push($(this).attr('href'))
        })
        var event_id = '{{ $event->id }}'
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '<?= csrf_token() ?>'
            }
        });
        $.post("/dashboard/ops/tabs/save",
            { 'tab_title': tab_title,
                'tab_href': tab_href,
                'event_id': '<?= $event->id ?>',
            },
            function(data, status){
                console.log(status);
            });
    }
</script>

<footer>
    {{--<div class="form-group col-md-3 col-lg-3">--}}
        {{--<button class="btn btn-success pull-right" type="submit">Save</button>--}}
    {{--</div>--}}
</footer>
</body>
</html>

<script>
    $('a').on('shown.bs.tab', function (e) {
        //console.log(e.relatedTarget)
        if (e.target.hasAttribute('data-hours')){
            $('#spec_table').show('fade');
        } else {
            $('#spec_table').hide('fade');
        }
    })

    function copyStart(id) {
        var val = $('#'+id).val()
    @for($i=0; $i <= $diffInDays; $i++)
    @if($day_number_copy ==7)
                <?php $day_number_copy=0 ?>
                @endif
                <?php
                $nextDay = next_day($day_number_copy);
                $x = dayOfWeek($day_number_copy);
                $lower_day = strtolower($x);
                ?>
        var next_lowerDay = '{{ $nextDay }}';
        if(id==='{{$lower_day}}{{$i}}_start'){
            $('#{{$nextDay}}{{$i+1}}_start').val(val).trigger("change");
            day('{{$nextDay}}{{$i+1}}');
        }
        if(id==='{{$lower_day}}{{$i}}_end'){
            $('#{{$nextDay}}{{$i+1}}_end').val(val).trigger("change");
            day('{{$nextDay}}{{$i+1}}');
        }
        <?php $day_number_copy++ ?>
        @endfor
    }

    var hours = [];
    function day(id) {
        var start = $('#'+id+'_start').val()
        var end = $('#'+id+'_end').val()
        var startTime = start.split(':');
        var endTime = end.split(':');
        var subTotal = ((endTime[0]*60+endTime[1]*1) - (startTime[0]*60+startTime[1]*1)) / 60;
        $('#'+id+'_sub_total').val(subTotal);
        $('#'+id+'_sub_total').trigger('input');
        if(!isNaN(subTotal)){
            hours.push(subTotal)
        }
        // ADDS ARRAY
        var total = 0;
        for (var i = 0; i < hours.length; i++) {
            total += hours[i];
        }
        $("#grand_total").val(total + ' hrs');
        $('#grand_total').trigger('input');
        @for($i=0; $i <= $diffInDays; $i++)
        // store values in an array throughout the form
        // calculate the total and send it to ID
        var mon = $('#monday{{$i}}_sub_total').val();
        var tues = $('#tuesday{{$i}}_sub_total').val();
        var wed = $('#wednesday{{$i}}_sub_total').val();
        var thur = $('#thursday{{$i}}_sub_total').val();
        var fri = $('#friday{{$i}}_sub_total').val();
        var sat = $('#saturday{{$i}}_sub_total').val();
        var sun = $('#sunday{{$i}}_sub_total').val();
        @endfor

    };

    var pay_grades = <?php echo json_encode($pay_grades);?>;
    $("#role").change(function () {
        var id = $(this).children(":selected").attr("id");//the count
        var x = id - 1;
        //console.log(x);
        var input = $('#pay');
        input.val(pay_grades[x]['pay']);
        input.trigger('input');
        /////////////////////////
        var input2 = $('#leeway');
        input2.val(pay_grades[x]['leeway']);
        input2.trigger('input');
        /////////////////////////
        var input3 = $('#training');
        input3.val(pay_grades[x]['training']);
        input3.trigger('input');
        //////////////////////////////////
        var input3 = $('#accreditation');
        input3.val(pay_grades[x]['accreditation']);
        input3.trigger('input');
        //////////////////////////////////
        var input3 = $('#charge_per_hour');
        input3.val(pay_grades[x]['charge_per_hour']);
        input3.trigger('input');
        //////////////////////////////////
        var input3 = $('#margin');
        input3.val(pay_grades[x]['margin']);
        input3.trigger('input');
        //////////////////////////////////
        var input3 = $('#id');
        input3.val(pay_grades[x]['id']);
        input3.trigger('input');
        //console.log(pay_grades[x]['id']);
    });
    {{--var specApp = angular.module("specApp", []);--}}
    {{--specApp.controller("MondayCtrl", function ($scope, $http) {--}}

    {{--$http.get("/event/{{ $event->id }}")--}}
    {{--.then(function (response) {--}}
    {{--$scope.specs = response.data.data;--}}
    {{--});--}}
    {{--//console.log($scope.specs)--}}
    {{--$scope.specs = [];--}}
    {{--$scope.specs.week1 = {};--}}
    {{--$scope.addRow = function(){--}}

    {{--var myArray = {'grade':$scope.grade, 'qty':$scope.qty, 'position':$scope.position, 'total':$scope.total,--}}
    {{--'week1':{},'week2':{},'week3':{},'week4':{},'week5':{},'week6':{},'week7':{},'week8':{}, 'week9':{},--}}
    {{--'week10':{},'week11':{},'week12':{},'week13':{},'week14':{},'week15':{},'week16':{},'week17':{},'week18':{},'week19':{},'week20':{},--}}
    {{--};--}}
    {{--<?php $week = 0; ?>--}}
    {{--@for($i=0; $i <= $diffInDays; $i++)--}}
    {{--@if($day_number_scope ==7)--}}
    {{--<?php $day_number_scope=0 ?>--}}
    {{--@endif--}}
    {{--<?php--}}
    {{--$x = dayOfWeek($day_number_scope);--}}
    {{--$lower_day = strtolower($x);--}}
    {{--$start =   "$lower_day$i"."_start";--}}
    {{--$end = "$lower_day$i"."_end";--}}
    {{--$sub_total = "$lower_day$i"."_sub_total";--}}
    {{--if($i % 7 == 0){--}}
    {{--$week++;--}}
    {{--}--}}
    {{--?>--}}
    {{--//$scope = $scope.specs.week1;--}}
    {{--myArray.week{{$week}}.{{ $start }} = $scope.{{ $start }},--}}
    {{--myArray.week{{$week}}.{{ $end }} = $scope.{{ $end }},--}}
    {{--myArray.week{{$week}}.{{ $sub_total }} = $scope.{{ $sub_total }}--}}
    {{--<?php $day_number_scope++; ?>--}}
    {{--@endfor--}}
    {{--//console.log(myArray);--}}
    {{--$scope.specs.push(myArray)--}}
    {{--};--}}


    {{--$scope.removeRow = function(index){--}}
    {{--$scope.specs.splice(index, 1);--}}
    {{--};--}}




    {{--//            $scope.removeRow = function (grade) {--}}
    {{--//                var index = 0;--}}
    {{--//                var comArr = eval($scope.specs);--}}
    {{--//                for (var i = 0; i < comArr.length; i++) {--}}
    {{--//                    if (comArr[i].grade === grade) {--}}
    {{--//                        index = i;--}}
    {{--//                        break;--}}
    {{--//                    }--}}
    {{--//                }--}}
    {{--//                if (index === -1) {--}}
    {{--//                    alert("Something gone wrong");--}}
    {{--//                }--}}
    {{--//                $scope.specs.splice(index, 1);--}}
    {{--//            };--}}
    {{--});--}}
</script>
