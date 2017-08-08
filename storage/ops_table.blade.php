<script>
    {{--var tabName = ""--}}

    {{--var app = angular.module('myApp', []);--}}
    {{--app.controller('myCtrl', function($scope, $http) {--}}
        {{--console.log("From app "+tabName)--}}
        {{--$http.get("/event/{{ $event->id }}/"+tabName+"")--}}
                {{--.then(function(response) {--}}
                    {{--$scope.specData = response.data.data;--}}

                    {{--for (i = 0; i < $scope.specData.length; i++) {--}}
                        {{--//if(i>0)--}}
                        {{--//$("#add_row")[0].onclick();--}}
                        {{--if($scope.specData[i].monday_start.split(',').length > 0){--}}
                            {{--spiltDays('monday', $scope.specData[i].monday_start, $scope.specData[i].monday_end);--}}
                        {{--}--}}
                        {{--if($scope.specData[i].tuesday_start.split(',').length > 0){--}}
                            {{--spiltDays('tuesday', $scope.specData[i].tuesday_start, $scope.specData[i].tuesday_end);--}}
                        {{--}--}}
                        {{--if($scope.specData[i].wednesday_start.split(',').length > 0){--}}
                            {{--spiltDays('wednesday', $scope.specData[i].wednesday_start, $scope.specData[i].wednesday_end);--}}
                        {{--}--}}
                        {{--if($scope.specData[i].thursday_start.split(',').length > 0){--}}
                            {{--spiltDays('thursday', $scope.specData[i].thursday_start, $scope.specData[i].thursday_end);--}}
                        {{--}--}}
                        {{--if($scope.specData[i].friday_start.split(',').length > 0){--}}
                            {{--spiltDays('friday', $scope.specData[i].friday_start, $scope.specData[i].friday_end);--}}
                        {{--}--}}
                        {{--if($scope.specData[i].saturday_start.split(',').length > 0){--}}
                            {{--spiltDays('saturday', $scope.specData[i].saturday_start, $scope.specData[i].saturday_end);--}}
                        {{--}--}}
                        {{--if($scope.specData[i].sunday_start.split(',').length > 0){--}}
                            {{--spiltDays('sunday', $scope.specData[i].sunday_start, $scope.specData[i].sunday_end);--}}
                        {{--}--}}

                        {{--console.log($scope.specData[i])--}}
                    {{--}--}}
                {{--});--}}

                {{--function spiltDays(day, dayStart, dayEnd) {--}}
                    {{--for (w = 0; w < dayStart.split(',').length; w++) {--}}
                        {{--var start = dayStart.split(',')[w]--}}
                        {{--var end = dayEnd.split(',')[w]--}}
                        {{--$scope.specData[i][day+'_start'+(w+1)] = start--}}
                        {{--$scope.specData[i][day+'_end'+(w+1)] = end--}}
                    {{--}--}}
                {{--}--}}
    {{--});--}}



</script>
<div class="col-lg-12" style="padding: 10px">
    <p><b>Row Functions: Select a row to use a function below.</b></p>
    <button type="button" class="btn btn-danger" onclick="removeTableRow()">Remove
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
    <button type="button" class="btn btn-warning" onclick="copyRow()">Copy
        <span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span>
    </button>
    <button type="button" class="btn btn-info" onclick="clearRow()">Clear
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    </button>
    <button type="button" class="btn btn-default" onclick="save_specs()">Save
        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
    </button>
</div>
{!! Form::model($event,[
                            'method' => 'POST',
                            'route' => ['dashboard.specs.store'],
                            'class' => 'form-horizontal save_specs',
                            'id'    => ''])
                            !!}
<ng-form>
<div class="animation">
<div class="col-lg-3" style="padding: 0">
    <table id="firstTable" class="table">
        {{--<input name="row_id[]" class="row_id" class="form-control" type="text" value="" hidden>--}}
        <input name="spec_name" id="spec_name" class="form-control hidden" type="text">
        <thead>
        <tr class="info">
            <th style="color:#d9edf7 ;">Role</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th style="color:#428bca ;">Role</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th>Select</th>
            <th>Add</th>
            <th>Role</th>
            <th>Qty</th>
            <th>Position</th>
        </tr>
        </thead>
        <tbody>
        <tr class="tr_clone" ng-repeat="x in specData">

            {{--<td>--}}
            {{--<input type="button" value="Remove"--}}
            {{--class="btn btn-danger addproduct"--}}
            {{--ng-click="removeRow($index)"/>--}}
            {{--</td>--}}
            <td width="" hidden>
                <input name="row_id[]" class="row_id" class="form-control" type="text" value="@{{ x.row_id }}">
            </td>
            <td width="10" style="vertical-align: middle; text-align: center">
                <input onchange="check(this)" type="checkbox" />
            </td>
            <td width="10" style="vertical-align: middle; text-align: center">
                <span id="add_row" onclick="addRows($(this).closest('table').attr('id'),this)" class="glyphicon glyphicon-plus" aria-hidden="true"
                style="cursor: pointer"></span>
            </td>
            <td width="120px">
                <select name="grade[]" class="form-control">
                    <option>@{{ x.grade }}</option>
                    @foreach($pay_grades as $roles)
                        <option>{{ $roles['role'] }}</option>
                    @endforeach
                </select>
            </td>

            <td width="70px">
                <input name="qty[]" class="form-control" type="text"
                       value="@{{ x.qty }}">
            </td>
            <td width="150">
                <input name="position[]" class="form-control" type="text"
                       value="@{{ x.position }}">
            </td>
        </tr>
        </tbody>
    </table>
</div>

<div id="spec_table" class="search-table-outter wrapper col-lg-9" style="padding: 0">
    {{--<form id="spec_rows">--}}
    <input class="hidden" name="events_id" value="{{ $event->id }}">
    <table id="days" class="table search-table inner days">
        <thead>
        <tr>
            <?php
            $week = 0;
            ?>
            @for($i=0; $i <= $diffInDays; $i++)
                <?php
                switch ($week) {
                    case 0:
                        $colour="info";
                        break;
                    case 1:
                        $colour="success";
                        break;
                    case 2:
                        $colour="danger";
                        break;
                    case 3:
                        $colour="warning";
                    default:
                        $colour="active";
                }

                if($i % 7 == 0){
                //if(dayOfWeek($day) == 'Mon'){//MONDAY
                $week++; ?>

                <th style="letter-spacing: 15px; color: black" class="{{ $colour }}" colspan="21">Week {{ $week }}</th>
                <?php
                }
                ?>
                @if($day ==7)
                    <?php $day = 0 ?>
                @endif

                <?php $day++; //$week++; ?>
                @endfor
        </tr>


        <tr>
            @for($i=0; $i <= $diffInDays; $i++)
            @if($day_number_table ==7)
            <?php $day_number_table=0 ?>
            @endif

            <th colspan="3">{{ dayOfWeek($day_number_table) }} {{ $ctm_start_date_table->day }}</th>

            <?php $day_number_table++; $ctm_start_date_table->addDay(); ?>
            @endfor
        </tr>
        <tr>
            @for($i=0; $i <= $diffInDays; $i++)
                @if($day_number_table ==7)
                    <?php $day_number_table=0 ?>
                @endif
                <th>Start</th>
                <th>End</th>
                <th>Hrs</th>
                <?php $day_number_table++; $ctm_start_date_table->addDay(); ?>
            @endfor
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr class="tr_clone" ng-repeat="x in specData">
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
                $fd = fullDayOfWeek($day_number_ng);
                $lower_day = strtolower($x);
                $lower_full_day = strtolower($fd);
                $start = "{{ spec.week$week." . $lower_day . $i . "_start }}";
                $end = "{{ spec.week$week." . $lower_day . $i . "_end}}";
                $sub_total = "{{ spec.week$week." . $lower_day . $i . "_sub_total }}";
                $red = '';
                $lower_day_start = $lower_day.'_start[]';
                $lower_day_end = $lower_day.'_end[]';
                $day_start = $lower_full_day.'_start'.$week;
                $day_end = $lower_full_day.'_end'.$week;
                $p = 'position';
                ?>


                @if($event_start_date->day==$ctm_start_date_table->day)
                    @if($ctm_start_date_table->day <= ($diffInDays_event + $event_start))
                        <?php $red = 'bg-danger'; $event_start_date->addDay(); ?>
                    @endif
                @endif
                <td class="times {{$red}}">
                    <select id="{{ $day_start }}" class="form-control" name="{{ $lower_day_start }}">
                        <option><?php echo "{{x.".$day_start."}}"; ?></option>
                        @foreach($arr as $time)
                            <option>{{ $time }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="times {{$red}}">
                    <select id="{{ $day_end }}" class="form-control" name="{{ $lower_day_end }}">
                        <option><?php echo "{{x.".$day_end."}}"; ?></option>
                        @foreach($arr as $time)
                            <option>{{ $time }}</option>
                        @endforeach
                    </select>
                    {{--<input name="{{ $lower_day }}_end[]" class="form-control users" type="text"--}}
                    {{--value="{{ $end }}">--}}
                </td>
                <td class="times {{$red}}">
                    <input style="background-color: #e0f1f9" name="{{ $lower_day }}_hours[]" class="form-control users" type="text">
                </td>
                <?php $day_number_ng++; $ctm_start_date_table->addDay();  ?>
                @endfor
                <td>
                    <div class="has-success has-feedback">
                        <input name="total[]" class="form-control" type="text">
                    </div>
                </td>


        </tr>
        </tbody>
    </table>
    <button type="submit">Save</button>
</div>
</div>
</ng-form>
</form>