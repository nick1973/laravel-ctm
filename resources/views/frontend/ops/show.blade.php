<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html ng-app="specApp">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet"
          href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script
            src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script
            src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script
            src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.17/angular.min.js"></script>
    <style>
        /*.search-table-outter {border:2px solid red;}*/
        /*.search-table{table-layout: fixed; margin:40px auto 0px auto; }*/
        /*.search-table, td, th{border-collapse:collapse; border:1px solid #777;}*/
        th{padding:20px 7px; font-size:14px; color:#ffffff; background:#428bca;}
        td{padding:5px 10px; height:35px;}

        .search-table-outter { overflow-x: scroll; }
        th, td { min-width: 155px; }
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
            <h2>Operation Managers Dashboard</h2>
            <a href="/dashboard/ops" class="btn btn-primary">Back to Dashboard</a>
            <a href="/dashboard/ops/create" class="btn btn-danger">Add New Event</a>
        </div>
        <div class="col-md-6">

        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h1>Spec for {{ $event->event_name }}, {{ $diffInDays+1 }} Day Event, {{ $day_number }} Day Number, next day-{{next_day(0)}}</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-lg-3 col-md-3">
                        <h4>Event Name:</h4>
                        <h4>Contract Manager:</h4>
                        <h4>Operation Manager:</h4>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <h4>{{ $event->event_name }}</h4>
                        <h4>{{ $event->contract_manager }}</h4>
                        <h4>{{ $event->operation_manager }}</h4>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <h4>Event Start Date:</h4>
                        <h4>Event End Date:</h4>
                        <h4>CTM Start Date:</h4>
                        <h4>CTM End Date:</h4>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <h4>{{ $event_start_date->format('m/d/Y') }}</h4>
                        <h4>{{ $event_end_date->format('m/d/Y') }}</h4>
                        <h4>{{ $ctm_start_date->format('m/d/Y') }}</h4>
                        <h4>{{ $ctm_end_date->format('m/d/Y') }}</h4>
                    </div>
                </div>
            </div>



                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a data-hours="" href="#spec_hours" aria-controls="spec_hours" role="tab" data-toggle="tab">Spec Hours</a></li>
                    <li role="presentation"><a href="#spec_costs" aria-controls="spec_costs" role="tab" data-toggle="tab">Spec Costs</a></li>
                    <li role="presentation"><a href="#tuesday" aria-controls="tuesday" role="tab" data-toggle="tab">Summary</a></li>
                    <li role="presentation"><a href="#wednesday" aria-controls="wednesday" role="tab" data-toggle="tab">Accommodation & Orders</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="spec_hours">
                        </br>


                        <form class="form-horizontal" role="form" ng-submit="addRow()">
                            <div class="col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Role</label>

                                    <div class="col-md-6">
                                        <select id="role" ng-model='grade'
                                                class="form-control">
                                            <?php
                                            $i = 0;
                                            foreach ($pay_grades as $obj) {
                                                $i++;
                                                echo "<option id='" . $i . "' value='" . $obj{'role'} . "'>" . $obj{'role'} . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <input id="id" ng-model="id" hidden="">
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Qty</label>

                                    <div class="col-md-3">
                                        <input id="qty" class="form-control"
                                               ng-model="qty"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Position</label>

                                    <div class="col-md-9 col-md-9">
                                        <input ng-model='position' class='form-control' id='position'>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div style="padding-left:110px">
                                        <input type="submit" value="Add"
                                               class="btn btn-primary"/>
                                        {{--<input type="button" value="Clear Totals"--}}
                                        {{--class="btn btn-warning clearproduct"/>--}}
                                    </div>
                                </div>
                            </div>

                            <!--                COLUMN 2-->
                            <div class="col-md-8 col-md-8">

                                <div class="DocumentList">
                                    <ul class="list-inline">
                                        @for($i=0; $i <= $diffInDays; $i++)
                                            @if($day_number >6)
                                                <?php $day_number=0 ?>
                                            @endif
                                                <?php $x = dayOfWeek($day_number);
                                                $lower_case_day = strtolower($x) ?>
                                            <li class="DocumentItem">
                                                <div class="form-group">
                                                    <label class="col-md-4 col-lg-4 control-label">
                                                        {{ dayOfWeek($day_number) }} {{ $ctm_start->day }} Start
                                                    </label>
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="input-group">
                                                            <select onclick="day('{{$lower_case_day}}{{$i}}')" id="{{$lower_case_day}}{{$i}}_start"
                                                                    ng-model='{{$lower_case_day}}{{$i}}_start'
                                                                    class="form-control">
                                                                @foreach($arr as $time)
                                                                    <option>{{ $time }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="input-group-btn">
                                                            <button onclick="copyStart('{{$lower_case_day}}{{$i}}_start')" class="btn btn-default" type="button">Copy>></button>
                                                          </span>
                                                        </div><!-- /input-group -->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 col-lg-4 control-label">
                                                        {{ dayOfWeek($day_number) }} {{ $ctm_start->day }} End
                                                    </label>
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="input-group">

                                                            <select onclick="day('{{$lower_case_day}}{{$i}}')" id="{{$lower_case_day}}{{$i}}_end"
                                                                    ng-model='{{$lower_case_day}}{{$i}}_end'
                                                                    class="form-control">
                                                                @foreach($arr as $time)
                                                                    <option>{{ $time }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="input-group-btn">
                                                            <button onclick="copyStart('{{$lower_case_day}}{{$i}}_end')" class="btn btn-default" type="button">Copy>></button>
                                                          </span>
                                                        </div><!-- /input-group -->
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 col-lg-4 control-label">Sub Total</label>
                                                    <div class="col-md-4 col-lg-4">
                                                        <input type="text" class="form-control" id="{{$lower_case_day}}{{$i}}_sub_total"
                                                               ng-model="{{$lower_case_day}}{{$i}}_sub_total"/>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php $day_number++; $ctm_start->addDay(); ?>
                                        @endfor
                                            {{--grand_total--}}
                                            <div class="form-group ">
                                                <label class="col-md-4 col-lg-4 control-label">Total</label>
                                                <div class="col-md-4 col-lg-4">
                                                    <input type="text" class="form-control" id="grand_total"
                                                           ng-model="total"/>
                                                </div>
                                            </div>
                                    </ul>
                                </div>
                                <br/>
                                {{--<a href="/peripherals/{{ $customer->crf_id }}" class="btn btn-success">Auto Add Bonds Override!</a>--}}
                            </div>
                        </form>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="spec_costs">

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="well col-md-6 col-lg-6">
                                <div class="form-group col-md-12 col-lg-12">
                                    <label for="inputEmail3" class="col-sm-3 col-md-2 col-lg-2 control-label">Margin%</label>
                                    <div class="col-sm-10 col-md-3 col-lg-3">
                                        <input onkeyup="specCosts()" id="margin" type="text" class="form-control">
                                    </div>

                                    <label for="inputEmail3" class="col-sm-3 col-md-2 col-lg-2 control-label">NI%</label>
                                    <div class="col-sm-10 col-md-3 col-lg-3">
                                        <input onkeyup="specCosts()" id="ni_number" type="text" class="form-control">
                                    </div>
                                </div>

                                <table class="">
                                    <thead>
                                        <tr>
                                            <th class="cost-table">Role</th>
                                            <th class="cost-table">CTM Base Cost</th>
                                            <th class="cost-table">Client Charge Rate</th>
                                        </tr>
                                    </thead>
                                    <tbody id="results">
                                    </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>


                            {{--<button>Push</button>--}}
                        <script>
                            //specCosts();

                            function specCosts() {
                                //$(document).ready(function (){

                                var arrayFromPHP = <?php echo json_encode($pay_grades); ?>;

                                $.getJSON("/event/{{ $event->id }}", function (result) {
                                    $("#results").empty();
                                    $.each(result, function (i, obj) {

                                        $.each(arrayFromPHP, function (index, value) {

                                            if (value.role === obj['grade']) {

                                                var ni = $("#ni_number").val();
                                                var margin = $("#margin").val();
                                                var clientCharge = (+value.charge_per_hour *((ni/100)+1))*(100/(100-margin));
                                                $("#results").append(
                                                        '<tr>' +
                                                        '<td class="cost-td">' + obj.grade + '</td>' +
                                                        '<td class="cost-td">' + value.charge_per_hour + '</td>' +
                                                        '<td id="client_charge" class="cost-td">' +
                                                        clientCharge.toFixed(2) +
                                                        '</td>' +
                                                        '</tr>')
                                            }
                                        });
                                    });
//
                                });
                            }
                            //});

                        </script>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="wednesday">
                    </div>

                </div>
        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- container -->

<div id="spec_table" class="search-table-outter wrapper">
    {!! Form::model($event,[
                            'method' => 'POST',
                            'route' => ['dashboard.specs.store'],
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
                @for($i=0; $i <= $diffInDays; $i++)
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
            <tr ng-repeat="spec in specs track by $index">
                <td>
                    <input type="button" value="Remove"
                           class="btn btn-danger addproduct"
                           ng-click="removeRow($index)"/>
                </td>
                <td width="200" hidden>
                    <input name="row_id[]" class="form-control large" type="text"
                           value="@{{$index + 1}}">
                </td>
                <td width="200">
                    <input name="grade[]" class="form-control large" type="text"
                           value="@{{spec.grade}}">
                </td>
                <td width="100">
                    <input name="qty[]" class="form-control" type="text"
                           value="@{{spec.qty}}">
                </td>
                <td width="300">
                    <input name="position[]" class="form-control large" type="text"
                           value="@{{spec.position}}">
                </td>
                <?php
                    $week = 0;
                ?>
                @for($i=0; $i <= $diffInDays; $i++)
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
                                   value="{{ $start }}" id="">
                        </td>
                        <td width="100">
                            <input name="{{ $lower_day }}_end[]" class="form-control users" type="text"
                                   value="{{ $end }}">
                        </td>
                        <td width="100">
                            <input name="{{ $lower_day }}_hours[]" class="form-control users" type="text"
                                   value="{{ $sub_total }}">
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
        <button class="btn btn-success pull-right" type="submit">Save</button>
    </div>
    </form>
</div>
<footer>
    </br>
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
        var gTotal = 0;
        function day(id) {
            var number = id.match(/\d+/);
            console.log(number[0])
            if(number[0]===0){
                gTotal = 0
            }
            var start = $('#'+id+'_start').val()
            var end = $('#'+id+'_end').val()
            var startTime = start.split(':');
            var endTime = end.split(':');
            var subTotal = ((endTime[0]*60+endTime[1]*1) - (startTime[0]*60+startTime[1]*1)) / 60;
            $('#'+id+'_sub_total').val(subTotal);
            $('#'+id+'_sub_total').trigger('input');
            if($.isNumeric(subTotal)){
                gTotal += subTotal;
            }
            //console.log(id)
            $("#grand_total").val(gTotal + ' hrs');
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


        var specApp = angular.module("specApp", []);
        specApp.controller("MondayCtrl", function ($scope, $http) {

            $http.get("/event/{{ $event->id }}")
                    .then(function (response) {
                        $scope.specs = response.data.data;
                    });
            //console.log($scope.specs)
            $scope.specs = [];
            $scope.specs.week1 = {};
            $scope.addRow = function(){

                var myArray = {'grade':$scope.grade, 'qty':$scope.qty, 'position':$scope.position, 'total':$scope.total,
                                'week1':{},'week2':{},'week3':{},'week4':{},'week5':{},'week6':{},'week7':{},'week8':{}, 'week9':{},
                    'week10':{},'week11':{},'week12':{},'week13':{},'week14':{},'week15':{},'week16':{},'week17':{},'week18':{},'week19':{},'week20':{},
                };
                <?php $week = 0; ?>
                @for($i=0; $i <= $diffInDays; $i++)
                @if($day_number_scope ==7)
                <?php $day_number_scope=0 ?>
                @endif
                <?php
                $x = dayOfWeek($day_number_scope);
                $lower_day = strtolower($x);
                $start =   "$lower_day$i"."_start";
                $end = "$lower_day$i"."_end";
                $sub_total = "$lower_day$i"."_sub_total";
                if($i % 7 == 0){
                    $week++;
                }
                ?>
                        //$scope = $scope.specs.week1;
                myArray.week{{$week}}.{{ $start }} = $scope.{{ $start }},
                myArray.week{{$week}}.{{ $end }} = $scope.{{ $end }},
                myArray.week{{$week}}.{{ $sub_total }} = $scope.{{ $sub_total }}
                <?php $day_number_scope++; ?>
                @endfor
                //console.log(myArray);
                $scope.specs.push(myArray)
            };


            $scope.removeRow = function(index){
                $scope.specs.splice(index, 1);
            };




//            $scope.removeRow = function (grade) {
//                var index = 0;
//                var comArr = eval($scope.specs);
//                for (var i = 0; i < comArr.length; i++) {
//                    if (comArr[i].grade === grade) {
//                        index = i;
//                        break;
//                    }
//                }
//                if (index === -1) {
//                    alert("Something gone wrong");
//                }
//                $scope.specs.splice(index, 1);
//            };
        });
    </script>

