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
        th, td { min-width: 100px; }
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
switch ($day) {
    case 1:
        $day = "Monday";
        break;
    case 2:
        $day = "Tuesday";
        break;
    case 3:
        $day = "Wednesday";
        break;
    case 4:
        $day = "Thursday";
        break;
    case 5:
        $day = "Friday";
        break;
    case 6:
        $day = "Saturday";
        break;
    case 7:
        $day = "Sunday";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
}

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
            <h1>Spec for {{ $event->event_name }}, Day {{ $day }}, {{ $diffInDays }} Day's</h1>

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
                        <h4>{{ $event->event_start_date }}</h4>
                        <h4>{{ $event->event_end_date }}</h4>
                        <h4>{{ $event->ctm_start_date }}</h4>
                        <h4>{{ $event->ctm_end_date }}</h4>
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
                                    <input id="id" ng-model="id" hidden>
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
                                        <li class="DocumentItem">

                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Monday Start</label>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="input-group">
                                                    <select onclick="day('mon')" id="mon_start" ng-model='mon_start'
                                                            class="form-control">
                                                        @foreach($arr as $time)
                                                            <option>{{ $time }}</option>
                                                        @endforeach
                                                    </select>
                                                      <span class="input-group-btn">
                                                        <button onclick="copyStart('mon_start')" class="btn btn-default" type="button">Copy>></button>
                                                      </span>
                                                    </div><!-- /input-group -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Monday End</label>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="input-group">
                                                        <select onclick="day('mon')" id="mon_end" ng-model='mon_end'
                                                                class="form-control">
                                                            @foreach($arr as $time)
                                                                <option>{{ $time }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-btn">
                                                        <button onclick="copyStart('mon_end')" class="btn btn-default" type="button">Copy>></button>
                                                      </span>
                                                    </div><!-- /input-group -->
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Sub Total</label>
                                                <div class="col-md-4 col-lg-4">
                                                    <input type="text" class="form-control" id="mon_sub_total"
                                                           ng-model="mon_sub_total"/>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="DocumentItem">
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Tuesday Start</label>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="input-group">
                                                        <select onclick="day('tues')" id="tues_start" ng-model='tues_start'
                                                                class="form-control">
                                                            @foreach($arr as $time)
                                                                <option>{{ $time }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-btn">
                                                        <button onclick="copyStart('tues_start')" class="btn btn-default" type="button">Copy>></button>
                                                      </span>
                                                    </div><!-- /input-group -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Tuesday End</label>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="input-group">
                                                        <select onclick="day('tues')" id="tues_end" ng-model='tues_end'
                                                                class="form-control">
                                                            @foreach($arr as $time)
                                                                <option>{{ $time }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-btn">
                                                        <button onclick="copyStart('tues_end')" class="btn btn-default" type="button">Copy>></button>
                                                      </span>

                                                    </div><!-- /input-group -->
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Sub Total</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="tues_sub_total"
                                                           ng-model="tues_sub_total"/>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="DocumentItem">
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Wednesday Start</label>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="input-group">
                                                        <select onclick="day('wed')" id="wed_start" ng-model='wed_start'
                                                                class="form-control">
                                                            @foreach($arr as $time)
                                                                <option>{{ $time }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-btn">
                                                        <button onclick="copyStart('wed_start')" class="btn btn-default" type="button">Copy>></button>
                                                      </span>
                                                    </div><!-- /input-group -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Wednesday End</label>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="input-group">
                                                        <select onclick="day('wed')" id="wed_end" ng-model='wed_end'
                                                                class="form-control">
                                                            @foreach($arr as $time)
                                                                <option>{{ $time }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-btn">
                                                        <button onclick="copyStart('wed_end')" class="btn btn-default" type="button">Copy>></button>
                                                      </span>

                                                    </div><!-- /input-group -->
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Sub Total</label>

                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="wed_sub_total"
                                                           ng-model="wed_sub_total"/>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="DocumentItem">
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Thursday Start</label>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="input-group">
                                                        <select onclick="day('thur')" id="thur_start" ng-model='thur_start'
                                                                class="form-control">
                                                            @foreach($arr as $time)
                                                                <option>{{ $time }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-btn">
                                                        <button onclick="copyStart('thur_start')" class="btn btn-default" type="button">Copy>></button>
                                                      </span>
                                                    </div><!-- /input-group -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Thursday End</label>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="input-group">
                                                        <select onclick="day('thur')" id="thur_end" ng-model='thur_end'
                                                                class="form-control">
                                                            @foreach($arr as $time)
                                                                <option>{{ $time }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-btn">
                                                        <button onclick="copyStart('thur_end')" class="btn btn-default" type="button">Copy>></button>
                                                      </span>

                                                    </div><!-- /input-group -->
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Sub Total</label>

                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="thur_sub_total"
                                                           ng-model="thur_sub_total"/>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="DocumentItem">
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Friday Start</label>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="input-group">
                                                        <select onclick="day('fri')" id="fri_start" ng-model='fri_start'
                                                                class="form-control">
                                                            @foreach($arr as $time)
                                                                <option>{{ $time }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-btn">
                                                        <button onclick="copyStart('fri_start')" class="btn btn-default" type="button">Copy>></button>
                                                      </span>
                                                    </div><!-- /input-group -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Friday End</label>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="input-group">
                                                        <select onclick="day('fri')" id="fri_end" ng-model='fri_end'
                                                                class="form-control">
                                                            @foreach($arr as $time)
                                                                <option>{{ $time }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-btn">
                                                        <button onclick="copyStart('fri_end')" class="btn btn-default" type="button">Copy>></button>
                                                      </span>

                                                    </div><!-- /input-group -->
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Sub Total</label>

                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="fri_sub_total"
                                                           ng-model="fri_sub_total"/>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="DocumentItem">
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Saturday Start</label>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="input-group">
                                                        <select onclick="day('sat')" id="sat_start" ng-model='sat_start'
                                                                class="form-control">
                                                            @foreach($arr as $time)
                                                                <option>{{ $time }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-btn">
                                                        <button onclick="copyStart('sat_start')" class="btn btn-default" type="button">Copy>></button>
                                                      </span>
                                                    </div><!-- /input-group -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Saturday End</label>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="input-group">
                                                        <select onclick="day('sat')" id="sat_end" ng-model='sat_end'
                                                                class="form-control">
                                                            @foreach($arr as $time)
                                                                <option>{{ $time }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-btn">
                                                        <button onclick="copyStart('sat_end')" class="btn btn-default" type="button">Copy>></button>
                                                      </span>

                                                    </div><!-- /input-group -->
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Sub Total</label>

                                                <div class="col-md-4">
                                                    <input onclick="day('sun')" type="text" class="form-control" id="sat_sub_total"
                                                           ng-model="sat_sub_total"/>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="DocumentItem">
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Sunday Start</label>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="input-group">
                                                        <select onclick="day('sun')" id="sun_start" ng-model='sun_start'
                                                                class="form-control">
                                                            @foreach($arr as $time)
                                                                <option>{{ $time }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-btn">
                                                        <button onclick="copyStart('sun_start')" class="btn btn-default" type="button">Copy>></button>
                                                      </span>
                                                    </div><!-- /input-group -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Sunday End</label>
                                                <div class="col-md-6 col-lg-6">
                                                    <div class="input-group">
                                                        <select onclick="day('sun')" id="sun_end" ng-model='sun_end'
                                                                class="form-control">
                                                            @foreach($arr as $time)
                                                                <option>{{ $time }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-btn">
                                                        <button onclick="copyStart('sun_end')" class="btn btn-default" type="button">Copy>></button>
                                                      </span>

                                                    </div><!-- /input-group -->
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Sub Total</label>

                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="sun_sub_total"
                                                           ng-model="sun_sub_total"/>
                                                    <input type="text" class="form-control hidden" id="grand_total"
                                                           ng-model="total" />
                                                </div>
                                            </div>
                                        </li>
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
                <th>Mon Start</th>
                <th>Mon Finish</th>
                <th>Mon hours</th>

                <th>Tues Start</th>
                <th>Tues Finish</th>
                <th>Tues hours</th>

                <th>Wed Start</th>
                <th>Wed Finish</th>
                <th>Wed hours</th>

                <th>Thur Start</th>
                <th>Thur Finish</th>
                <th>Thur hours</th>

                <th>Fri Start</th>
                <th>Fri Finish</th>
                <th>Fri hours</th>

                <th>Sat Start</th>
                <th>Sat Finish</th>
                <th>Sat hours</th>

                <th>Sun Start</th>
                <th>Sun Finish</th>
                <th>Sun hours</th>

                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="spec in specs">
                <td>
                    <input type="button" value="Remove"
                           class="btn btn-danger addproduct"
                           ng-click="removeRow(spec.grade)"/>
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
                <td width="100">
                    <input name="monday_start[]" class="form-control users" type="text"
                           value="@{{spec.mon_start}}">
                </td>
                <td width="100">
                    <input name="monday_end[]" class="form-control users" type="text"
                           value="@{{spec.mon_end}}">
                </td>
                <td width="100">
                    <input name="monday_hours[]" class="form-control users" type="text"
                           value="@{{spec.mon_sub_total}}" readonly>
                </td>

                <td width="100">
                    <input name="tuesday_start[]" class="form-control users" type="text"
                           value="@{{spec.tues_start}}">
                </td>
                <td width="100">
                    <input name="tuesday_end[]" class="form-control users" type="text"
                           value="@{{spec.tues_end}}">
                </td>
                <td width="100">
                    <input name="tuesday_hours[]" class="form-control users" type="text"
                           value="@{{spec.tues_sub_total}}" readonly>
                </td>

                <td width="100">
                    <input name="wednesday_start[]" class="form-control users" type="text"
                           value="@{{spec.wed_start}}">
                </td>
                <td width="100">
                    <input name="wednesday_end[]" class="form-control users" type="text"
                           value="@{{spec.wed_end}}">
                </td>
                <td width="100">
                    <input name="wednesday_hours[]" class="form-control users" type="text"
                           value="@{{spec.wed_sub_total}}" readonly>
                </td>

                <td width="100">
                    <input name="thursday_start[]" class="form-control users" type="text"
                           value="@{{spec.thur_start}}">
                </td>
                <td width="100">
                    <input name="thursday_end[]" class="form-control users" type="text"
                           value="@{{spec.thur_end}}">
                </td>
                <td width="100">
                    <input name="thursday_hours[]" class="form-control users" type="text"
                           value="@{{spec.thur_sub_total}}" readonly>
                </td>

                <td width="100">
                    <input name="friday_start[]" class="form-control users" type="text"
                           value="@{{spec.fri_start}}">
                </td>
                <td width="100">
                    <input name="friday_end[]" class="form-control users" type="text"
                           value="@{{spec.fri_end}}">
                </td>
                <td width="100">
                    <input name="friday_hours[]" class="form-control users" type="text"
                           value="@{{spec.fri_sub_total}}" readonly>
                </td>

                <td width="100">
                    <input name="saturday_start[]" class="form-control users" type="text"
                           value="@{{spec.sat_start}}">
                </td>
                <td width="100">
                    <input name="saturday_end[]" class="form-control users" type="text"
                           value="@{{spec.sat_end}}">
                </td>
                <td width="100">
                    <input name="saturday_hours[]" class="form-control users" type="text"
                           value="@{{spec.sat_sub_total}}" readonly>
                </td>

                <td width="100">
                    <input name="sunday_start[]" class="form-control users" type="text"
                           value="@{{spec.sun_start}}">
                </td>
                <td width="100">
                    <input name="sunday_end[]" class="form-control users" type="text"
                           value="@{{spec.sun_end}}">
                </td>
                <td width="100">
                    <input name="sunday_hours[]" class="form-control users" type="text"
                           value="@{{spec.sun_sub_total}}" readonly>
                </td>
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
    {{--<div class="form-group col-md-3 col-lg-3">--}}
        {{--<button class="btn btn-default pull-right" onclick="addSpec()">Save</button>--}}
    {{--</div>--}}
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

            function addSpec() {
                var formData = $("#spec_rows").serializeArray();
                $.ajax({
                    url: "/specs",
                    type: "POST",
                    data: formData,
                    success: function (data, textStatus, jqXHR) {
                        //data - response from server
                        console.log(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                    }
                });
            };

            function copyStart(id) {
                var val = $('#'+id).val()
                if(id==='mon_start'){
                    $('#tues_start').val(val).trigger("change");
                    day('tues');
                }
                if(id==='mon_end'){
                    $('#tues_end').val(val).trigger("change");
                    day('tues');
                }
                if(id==='tues_start'){
                    $('#wed_start').val(val).trigger("change");
                    day('wed');
                }
                if(id==='tues_end'){
                    $('#wed_end').val(val).trigger("change");
                    day('wed');
                }
                if(id==='wed_start'){
                    $('#thur_start').val(val).trigger("change");
                    day('thur');
                }
                if(id==='wed_end'){
                    $('#thur_end').val(val).trigger("change");
                    day('thur');
                }
                if(id==='thur_start'){
                    $('#fri_start').val(val).trigger("change");
                    day('fri');
                }
                if(id==='thur_end'){
                    $('#fri_end').val(val).trigger("change");
                    day('fri');
                }
                if(id==='fri_start'){
                    $('#sat_start').val(val).trigger("change");
                    day('sat');
                }
                if(id==='fri_end'){
                    $('#sat_end').val(val).trigger("change");
                    day('sat');
                }
                if(id==='sat_start'){
                    $('#sun_start').val(val).trigger("change");
                    day('sun');
                }
                if(id==='sat_end'){
                    $('#sun_end').val(val).trigger("change");
                    day('sun');
                }
                if(id==='sun_start'){
                    $('#mon_start').val(val).trigger("change");
                    day('mon');
                }
                if(id==='sun_end'){
                    $('#mon_end').val(val).trigger("change");
                    day('mon');
                }
            }

        function day(id) {
            var start = $('#'+id+'_start').val()
            var end = $('#'+id+'_end').val()
            var startTime = start.split(':');
            var endTime = end.split(':');
            var subTotal = ((endTime[0]*60+endTime[1]*1) - (startTime[0]*60+startTime[1]*1)) / 60;
            $('#'+id+'_sub_total').val(subTotal);
            $('#'+id+'_sub_total').trigger('input');
            var mon = $('#mon_sub_total').val();
            var tues = $('#tues_sub_total').val();
            var wed = $('#wed_sub_total').val();
            var thur = $('#thur_sub_total').val();
            var fri = $('#fri_sub_total').val();
            var sat = $('#sat_sub_total').val();
            var sun = $('#sun_sub_total').val();
            $('#grand_total').val(+mon+ +tues+ +wed+ +thur+ +fri+ +sat+ +sun + ' hrs').trigger("change");

        };

        var pay_grades = <?php echo json_encode($pay_grades);?>;
        $("#role").change(function () {
            var id = $(this).children(":selected").attr("id");//the count
            var x = id - 1;
            console.log(x);
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
            console.log(pay_grades[x]['id']);
        });


        var specApp = angular.module("specApp", []);
        specApp.controller("MondayCtrl", function ($scope, $http) {

            $http.get("/event/{{ $event->id }}")
                    .then(function (response) {
                        $scope.specs = response.data;
                    });

            $scope.specs = [];

            $scope.addRow = function(){
                $scope.specs.push({ 'grade':$scope.grade, 'qty': $scope.qty, 'position':$scope.position,
                                    'mon_start': $scope.mon_start, 'mon_end': $scope.mon_end, 'mon_sub_total': $scope.mon_sub_total,
                                    'tues_start': $scope.tues_start, 'tues_end': $scope.tues_end, 'tues_sub_total': $scope.tues_sub_total,
                                    'wed_start': $scope.wed_start, 'wed_end': $scope.wed_end, 'wed_sub_total': $scope.wed_sub_total,
                                    'thur_start': $scope.thur_start, 'thur_end': $scope.thur_end, 'thur_sub_total': $scope.thur_sub_total,
                                    'fri_start': $scope.fri_start, 'fri_end': $scope.fri_end, 'fri_sub_total': $scope.fri_sub_total,
                                    'sat_start': $scope.sat_start, 'sat_end': $scope.sat_end, 'sat_sub_total': $scope.sat_sub_total,
                                    'sun_start': $scope.sun_start, 'sun_end': $scope.sun_end, 'sun_sub_total': $scope.sun_sub_total,
                                    'total': $scope.total,
                });
                $scope.grade='';
                $scope.pay='';
                $scope.leeway='';
                $scope.mon_start='';
                $scope.mon_end='';
                $scope.mon_sub_total='';
                $scope.tues_start='';
                $scope.tues_end='';
                $scope.tues_sub_total='';
                $scope.wed_start='';
                $scope.wed_end='';
                $scope.wed_sub_total='';
                $scope.thur_start='';
                $scope.thur_end='';
                $scope.thur_sub_total='';
                $scope.fri_start='';
                $scope.fri_end='';
                $scope.fri_sub_total='';
                $scope.sat_start='';
                $scope.sat_end='';
                $scope.sat_sub_total='';
                $scope.sun_start='';
                $scope.sun_end='';
                $scope.sun_sub_total='';
                $scope.total='';
            };

            $scope.removeRow = function (grade) {
                var index = 0;
                var comArr = eval($scope.specs);
                for (var i = 0; i < comArr.length; i++) {
                    if (comArr[i].grade === grade) {
                        index = i;
                        break;
                    }
                }
                if (index === -1) {
                    alert("Something gone wrong");
                }
                $scope.specs.splice(index, 1);
            };
        });
    </script>

