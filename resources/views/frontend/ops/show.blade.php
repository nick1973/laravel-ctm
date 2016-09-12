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
        th, td { min-width: 150px; }


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
            padding: 0 15px 0 25px;
        }

        .DocumentItem
        {
            /*border:1px solid black;*/
            padding:0;
            height:200px;
        }

        .list-inline {
            white-space:nowrap;
        }
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
            <h1>Spec for {{ $event->event_name }}</h1>
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
                    <li role="presentation" class="active"><a href="#monday" aria-controls="monday" role="tab" data-toggle="tab">Spec</a></li>
                    <li role="presentation"><a href="#tuesday" aria-controls="tuesday" role="tab" data-toggle="tab">Summary</a></li>
                    <li role="presentation"><a href="#wednesday" aria-controls="wednesday" role="tab" data-toggle="tab">Accommodation & Orders</a></li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="monday">
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
                                                <div class="col-md-5 col-lg-5">
                                                    <select onclick="day('mon')" id="mon_start" ng-model='monday_start'
                                                            class="form-control">
                                                        @foreach($arr as $time)
                                                            <option>{{ $time }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Monday End</label>
                                                <div class="col-md-5 col-lg-5">
                                                    <select onclick="day('mon')" id="mon_end" ng-model='mon_end'
                                                            class="form-control">
                                                        @foreach($arr as $time)
                                                            <option>{{ $time }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Sub Total</label>

                                                <div class="col-md-5 col-lg-5">
                                                    <input type="text" class="form-control" id="mon_sub_total"
                                                           ng-model="mon_sub_total"/>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="DocumentItem">
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Tuesday Start</label>
                                                <div class="col-md-5 col-lg-5">
                                                    <select onclick="day('tues')" id="tues_start" ng-model='tues_start'
                                                            class="form-control">
                                                        @foreach($arr as $time)
                                                            <option>{{ $time }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Tuesday End</label>
                                                <div class="col-md-5 col-lg-5">
                                                    <select onclick="day('tues')" id="tues_end" ng-model='tues_end'
                                                            class="form-control">
                                                        @foreach($arr as $time)
                                                            <option>{{ $time }}</option>
                                                        @endforeach
                                                    </select>
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
                                                <label class="col-md-5 col-lg-5 control-label">Wednesday Start</label>
                                                <div class="col-md-5 col-lg-5">
                                                    <select onclick="day('wed')" id="wed_start" ng-model='wed_start'
                                                            class="form-control">
                                                        @foreach($arr as $time)
                                                            <option>{{ $time }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 col-lg-5 control-label">Wednesday End</label>
                                                <div class="col-md-5 col-lg-5">
                                                    <select onclick="day('wed')" id="wed_end" ng-model='wed_end'
                                                            class="form-control">
                                                        @foreach($arr as $time)
                                                            <option>{{ $time }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-5 col-lg-5 control-label">Sub Total</label>

                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="wed_sub_total"
                                                           ng-model="wed_sub_end"/>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="DocumentItem">
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Thursday Start</label>
                                                <div class="col-md-5 col-lg-5">
                                                    <select onclick="day('thur')" id="thur_start" ng-model='thur_start'
                                                            class="form-control">
                                                        @foreach($arr as $time)
                                                            <option>{{ $time }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Thursday End</label>
                                                <div class="col-md-5 col-lg-5">
                                                    <select onclick="day('thur')" id="thur_end" ng-model='thur_end'
                                                            class="form-control">
                                                        @foreach($arr as $time)
                                                            <option>{{ $time }}</option>
                                                        @endforeach
                                                    </select>
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
                                                <div class="col-md-5 col-lg-5">
                                                    <select onclick="day('fri')" id="fri_start" ng-model='fri_start'
                                                            class="form-control">
                                                        @foreach($arr as $time)
                                                            <option>{{ $time }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Friday End</label>
                                                <div class="col-md-5 col-lg-5">
                                                    <select onclick="day('fri')" id="fri_end" ng-model='fri_end'
                                                            class="form-control">
                                                        @foreach($arr as $time)
                                                            <option>{{ $time }}</option>
                                                        @endforeach
                                                    </select>
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
                                                <div class="col-md-5 col-lg-5">
                                                    <select onclick="day('sat')" id="sat_start" ng-model='sat_start'
                                                            class="form-control">
                                                        @foreach($arr as $time)
                                                            <option>{{ $time }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Saturday End</label>
                                                <div class="col-md-5 col-lg-5">
                                                    <select onclick="day('sat')" id="sat_end" ng-model='sat_end'
                                                            class="form-control">
                                                        @foreach($arr as $time)
                                                            <option>{{ $time }}</option>
                                                        @endforeach
                                                    </select>
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
                                                <div class="col-md-5 col-lg-5">
                                                    <select onclick="day('sun')" id="sun_start" ng-model='sun_start'
                                                            class="form-control">
                                                        @foreach($arr as $time)
                                                            <option>{{ $time }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Sunday End</label>
                                                <div class="col-md-5 col-lg-5">
                                                    <select onclick="day('sun')" id="sun_end" ng-model='sun_end'
                                                            class="form-control">
                                                        @foreach($arr as $time)
                                                            <option>{{ $time }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 col-lg-4 control-label">Sub Total</label>

                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="sun_sub_total"
                                                           ng-model="sun_sub_total"/>
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

                    <div role="tabpanel" class="tab-pane fade" id="tuesday">

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="wednesday">

                    </div>

                </div>
        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- container -->

<div class="search-table-outter wrapper">
    {!! Form::model($event,[
                            'method' => 'PATCH',
                            'route' => ['dashboard.specs.update',$event->id],
                            'class' => 'form-horizontal'])
                            !!}
    <table class="table search-table inner">
        <thead>
        <tr>
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
            <td width="200">
                <input name="grade[]" class="form-control users" type="text"
                       value="@{{spec.grade}}">
            </td>
            <td width="100">
                <input name="qty[]" class="form-control users" type="text"
                       value="@{{spec.qty}}">

            </td>
            <td width="300">
                <input name="position[]" class="form-control users" type="text"
                       value="@{{spec.position}}">
            </td>
            <td width="100">
                <input name="monday_start[]" class="form-control users" type="text"
                       value="@{{spec.monday_start}}">
            </td>
            <td width="100">
                <input name="monday_end[]" class="form-control users" type="text"
                       value="@{{spec.monday_end}}">
            </td>
            <td width="100">
                <input name="monday_hours[]" class="form-control users" type="text"
                       value="@{{spec.monday_hours}}">
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
                       value="@{{spec.tues_sub_total}}">
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
                       value="@{{spec.wed_sub_total}}">
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
                       value="@{{spec.thur_sub_total}}">
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
                       value="@{{spec.fri_sub_total}}">
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
                       value="@{{spec.sat_sub_total}}">
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
                       value="@{{spec.sun_sub_total}}">
            </td>
            <td>
                <input id="total" name="total[]" class="form-control users" type="text"
                       value="@{{spec.total}}">
            </td>

            <td>
                <input type="button" value="Remove"
                       class="btn btn-danger addproduct"
                       ng-click="removeRow(spec.id)"/>
            </td>

        </tr>
        </tbody>
    </table>
    <button class="btn btn-success" type="submit">Save</button>
    </form>
</div>
<footer>
    </br>
</footer>
</body>
</html>

    <script>
        function day(id) {
            var start = $('#'+id+'_start').val()
            var end = $('#'+id+'_end').val()
            var startTime = start.split(':');
            var endTime = end.split(':');
            var subTotal = ((endTime[0]*60+endTime[1]*1) - (startTime[0]*60+startTime[1]*1)) / 60;
            $('#'+id+'_sub_total').val(subTotal + ' hrs');
            $('#'+id+'_sub_total').trigger('input');
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
                $scope.specs.push({ 'grade':$scope.grade, 'qty': $scope.qty, 'position':$scope.position, 'id': $scope.id,
                                    'monday_start': $scope.monday_start, 'mon_end': $scope.mon_end, 'mon_sub_total': $scope.mon_sub_total,
                                    'tues_start': $scope.tues_start, 'tues_end': $scope.tues_end, 'tues_sub_total': $scope.tues_sub_total,
                                    'wed_start': $scope.wed_start, 'wed_end': $scope.wed_end, 'wed_sub_total': $scope.wed_sub_total,
                                    'thur_start': $scope.thur_start, 'thur_end': $scope.thur_end, 'thur_sub_total': $scope.thur_sub_total,
                                    'fri_start': $scope.fri_start, 'fri_end': $scope.fri_end, 'fri_sub_total': $scope.fri_sub_total,
                                    'sat_start': $scope.sat_start, 'sat_end': $scope.sat_end, 'sat_sub_total': $scope.sat_sub_total,
                                    'sun_start': $scope.sun_start, 'sun_end': $scope.sun_end, 'sun_sub_total': $scope.sun_sub_total,
                });
                $scope.grade='';
                $scope.pay='';
                $scope.leeway='';
                $scope.monday_start='';
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


//        $scope.addRow = function () {
//            $scope.bonds.push({
//                'item_name': $scope.item_name,
//                'btbuy': $scope.btbuy,
//                'bteup': $scope.bteup,
//                'bt_ref': $scope.bt_ref,
//                'quote_type': $scope.quote_type,
//                'id': $scope.id
//            });
//            //console.log($scope.bonus);
//            $scope.item_name = '';
//            $scope.bt_ref = '';
//            $scope.btbuy = '';
//            $scope.bteup = '';
//            $scope.quote_type = '';
//            $scope.id = '';
//        };


    </script>

