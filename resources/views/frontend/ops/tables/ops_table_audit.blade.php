<?php $ctm_start_date_table = new \Carbon\Carbon($ctm_start_date); ?>
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
    <button type="button" class="btn btn-default" onclick="">Save
        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
    </button>
</div>
{!! Form::model($event,[
                            'method' => 'POST',
                            'route' => ['dashboard.specs.store'],
                            'class' => 'form-horizontal',
                            'id'    => ''])
                            !!}

<div class="col-lg-3" style="padding: 0">
    <table id="audit_Table" class="table">
        <input name="row_id[]" class="row_id" class="form-control" type="text" value="1" hidden>
        <input name="spec_name" id="audit_spec" class="form-control hidden" type="text" value="audit">
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
        <tr class="tr_clone">
            {{--<td>--}}
            {{--<input type="button" value="Remove"--}}
            {{--class="btn btn-danger addproduct"--}}
            {{--ng-click="removeRow($index)"/>--}}
            {{--</td>--}}
            <td width="" hidden>
                <input class="row_id" class="form-control" type="text">
            </td>
            <td width="10" style="vertical-align: middle; text-align: center">
                <input onchange="check(this)" type="checkbox" />
            </td>
            <td width="10" style="vertical-align: middle; text-align: center">
                <span onclick="addRows($(this).closest('table').attr('id'),this)" class="glyphicon glyphicon-plus" aria-hidden="true"
                      style="cursor: pointer"></span>
            </td>
            <td width="120px">
                <select name="grade[]" class="form-control">
                    @foreach($pay_grades as $roles)
                        <option>{{ $roles['role'] }}</option>
                    @endforeach
                </select>
            </td>

            <td width="70px">
                <input name="qty[]" class="form-control" type="text"
                       value="">
            </td>
            <td width="150">
                <input name="position[]" class="form-control" type="text"
                       value="">
            </td>
        </tr>
        </tbody>
    </table>
</div>

<div id="spec_table" class="search-table-outter wrapper col-lg-9" style="padding: 0">
    {{--<form id="spec_rows">--}}
    <input class="hidden" name="events_id" value="{{ $event->id }}">
    <table id="audit_days" class="table search-table inner days">
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
        <tr class="tr_clone">
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
                $red = '';
                $lower_day_start = $lower_day.'_start[]';
                $lower_day_end = $lower_day.'_end[]';
                ?>


                @if($event_start_date->day==$ctm_start_date_table->day)
                    @if($ctm_start_date_table->day <= ($diffInDays_event + $event_start))
                        <?php $red = 'bg-danger'; $event_start_date->addDay(); ?>
                    @endif
                @endif
                <td class="times {{$red}}">
                    <select class="form-control" name="{{ $lower_day_start }}">
                        @foreach($arr as $time)
                            <option>{{ $time }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="times {{$red}}">
                    <select class="form-control" name="{{ $lower_day_end }}">
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
</form>

