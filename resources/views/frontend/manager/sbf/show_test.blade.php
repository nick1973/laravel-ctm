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

    {{--<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">--}}

    {{--<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>--}}
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/js/colResizable-1.5.min.js"></script>

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
            <a href="/dashboard/manager" class="btn btn-warning">Back to Dashboard</a>
            <a href="/dashboard/sbf" class="btn btn-info active">Staff Booking Form</a>
        </div>
        <div class="col-md-6">
        </div>
    </div>
</div>
<div class="">
        <div class="col-md-12 col-lg-12">
            {{--{{ $spec }}--}}
            {{--@foreach($spec->staff as $value)--}}
                {{--Row{{ $value->pivot->row_id}} User {{ $users->find($value->pivot->user_id)->name }}--}}
                {{--<br>--}}
            {{--@endforeach--}}

            <h1>Spec for {{ $event->event_name }}, {{ $diffInDays+1 }} Day Event.</h1>
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
            <div id="top_centre" class="col-md-2 col-lg-2 col-lg-offset-5 col-md-offset-5">
                <br/>
                <img src="/ajax-loader.gif" class="loaderImage" style="display: none; padding-left: 5px;text-align: center">
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

                <table id="staff" class="table" cellspacing="0" hidden>
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
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <td class="large left">
                                <select name="days[]" class="form-control days" multiple required ondblclick="reloadSelect(this)" onchange="saveDays(this)">
                                    @for($i=0; $i <= $diffInDays; $i++)
                                        @if($day_number ==7)
                                            <?php $day_number=0; ?>
                                        @endif
                                        <option selected id="{{ dayOfWeek($day_number) }}{{ $i }}" value="[{{ dayOfWeek($day_number) }} {{ $ctm_start_date->day }}]">{{ dayOfWeek($day_number) }} {{ $ctm_start_date->day }}</option>
                                        <?php $day_number++; $ctm_start_date->addDay(); ?>
                                    @endfor
                                </select>
                            </td>
                            <td class="medium start">
                                <select name="start[]" class="form-control">
                                    <option><?php foreach($arr as $time) {?>
                                    <option>{{ $time }}</option>
                                    <?php } ?></option>
                                </select>
                            </td>
                            <td class="medium finish">
                                <select name="end[]" class="form-control">
                                    <option><?php foreach($arr as $time) {?>
                                    <option>{{ $time }}</option>
                                    <?php } ?></option>
                                </select>
                            </td>
                            <td>
                                <input name="agency[]" class="form-control" type="text" value=""/>
                                {{--@foreach($specs as $spec)--}}
                                    <div class="hidden">
                                        <input name="spec_id" class="form-control static" value="{{$spec->id}}" />
                                    </div>
                                {{--@endforeach--}}
                            </td>
                            <td id="name_row">
                                <input name="name[]" onclick="getId(this)" onfocus="searchName(this)"
                                               class="form-control noID name" type="text"
                                               value=""/>
                            </td>
                            <td><input name="last_name[]" onclick="getId(this)" onfocus="searchLastName(this)" class="form-control noID" type="text"/></td>
                            <td><input class="form-control noID" type="text" value=""/></td>
                            <td><input class="form-control noID" type="text" value=""/></td>
                            <td><input class="form-control noID" type="text" value=""/></td>
                            <td><input class="form-control noID" type="text" value=""/></td>
                            <td><input class="form-control noID" type="text" value=""/></td>
                            <td><input class="form-control noID" type="text" value=""/></td>
                            <td><input name="user_id[]" class="form-control noID user_id hidden" type="text" value=""/></td>
                            <td><input name="row_id[]" class="form-control noID hidden" type="text" value=""/></td>
                            <td><input class="form-control btn btn-info" type="button" value="Split" onclick="staffing(this)"/></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            <input type="submit" value="save" onclick="addNote()">
        </div><!-- col-md-12 -->

    <div id="result"></div>

</div><!-- container -->

<script>



    function clearStaff(item) {
        $(item).closest('tr').find('td').find('input[type="text"]').val('')
    }

    function reloadSelect(item) {

        var value = $(item).closest("tr").find('td:eq(0)').find('select option:selected').text()
        if(value.includes('staff')){
            if (value.indexOf(',') > -1) {
                var staff = value.split(',')
            }
        }
        //console.log(staff[0])

        $(item).closest("tr").find('td:eq(0)').find('select').prop('multiple', true)

        $(item).closest("tr").find('td:eq(0)').find('select').prop('multiple', true)
        $(item).closest("tr").find('td:eq(0)').find('select option:selected').remove()
        $(item).closest("tr").find('td:eq(0)').find('select option').remove()
        @for($i=0; $i <= $diffInDays; $i++)
        @if($day_number_scope ==7)
        <?php $day_number_scope=0; ?>
        @endif
                //'+staff[0]+',
                $(item).append('<option>{{ dayOfWeek($day_number_scope) }} {{ $ctm_start_date_scope->day }}</option>');
        <?php $day_number_scope++; $ctm_start_date_scope->addDay(); ?>
        @endfor
    }

    function addNote() {
        $('.loaderImage').show('fade');
        //$('body').css('background-color', '#e589d7')
        var formData = $(".table_form").serializeArray();
        var url = $(".table_form").attr( "action" );
        $.ajax({
            url : url,
            type: "POST",
            data : formData,
            success: function(data, textStatus, jqXHR)
            {
                //data - response from server
                $('.loaderImage').hide('fade');
                //$('body').css('background-color', '#ffffff')
                console.log(data)
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log(textStatus)
            }
        });
    }
</script>
<script>
    var rows;
    function once(fn, context) {
        var result;
        return function() {
            if(fn) {
                result = fn.apply(context || this, arguments);
                fn = null;
            }
            return result;
        };
    }
    var rowID = once(function () {
        var array = []
        @foreach($spec->staff as $value)
            array.push({{ $value->pivot->row_id }});
                @endforeach
        var arr = [1, 1, 2, 1, 3, 3, 4, 5];
        var sorted_arr = array.slice().sort();
        var rows = [];
        for (var i = 0; i < array.length - 1; i++) {
            if (sorted_arr[i + 1] == sorted_arr[i]) {
                rows.push(sorted_arr[i]);
            }
        }
        for (var i = 0; i < rows.length; i++) {

            var name = $('#exampleTable_'+rows[i]+'_staff5').closest('tr')
            //var tableId = $(name).closest('table').attr('id')
            var tableId = 'exampleTable_'+rows[i]
            //console.log(rows[i]);
            var row = $("<tr>");

            row.append($('<td class="large"><select name="days[]" class="form-control"  onchange="saveDays(this)" multiple required>'+
                    <?php
                            for($i=0; $i <= $diffInDays; $i++)
                            {
                            if($day_number_rep ==7){
                                $day_number_rep=0;
                            } ?>
                            '<option selected id="{{ dayOfWeek($day_number_rep) }}{{ $i }}">{{ dayOfWeek($day_number_rep) }} {{ $ctm_start_date_rep->day }}</option>'+
                    <?php $day_number_rep++; $ctm_start_date_rep->addDay();
                            }?>
                            '</select></td>'))
                    .append($('<td width="75" class="start"><select name="start[]" id="_start" class="form-control"><option><?php foreach($arr as $time) {?><option>{{ $time }}</option><?php } ?></option></select></td>'))
                    .append($('<td width="75" class="finish"><select name="end[]" id="_end" class="form-control"><option><?php foreach($arr as $time) {?><option>{{ $time }}</option><?php } ?></option></select></td>'))
                    .append($('<td><input name="agency[]" class="form-control" type="text" value=""/></td>'))
                    .append($('<td><input name="name[]" onfocus="searchName(this)"class="form-control noID name" type="text"value=""/></td>'))
                    .append($('<td><input name="last_name[]" onfocus="searchLastName(this)" class="form-control noID" type="text"/></td>'))
                    .append($('<td><input class="form-control noID" type="text" value=""/></td>'))
                    .append($('<td><input class="form-control noID" type="text" value=""/></td>'))
                    .append($('<td><input class="form-control noID" type="text" value=""/></td>'))
                    .append($('<td><input class="form-control noID" type="text" value=""/></td>'))
                    .append($('<td><input class="form-control noID" type="text" value=""/></td>'))
                    .append($('<td><input class="form-control noID" type="text" value=""/></td>'))
                    .append($('<td><input name="user_id[]" class="form-control noID user_id hidden" type="text" value=""/></td>'))
                    .append($('<td><input name="row_id[]" class="form-control noID hidden" type="text" value=""/></td>'))
                    .append($('<td><input class="form-control btn btn-info" type="button" value="Split" onclick="staffing(this)"/></td>'))
                    .append($('<td><input class="form-control btn btn-danger remove" type="button" value="Remove" onclick="remove(this)"/></td>'));

            //$("#exampleTable_1 tbody").append(row);
            $('#'+ tableId + ' ' + 'tbody').append(row);
        }
    })

    <?php
    function duplicateRows($a){
        $arr_unique = array_unique($a);
        $arr_duplicates = array_diff_assoc($a, $arr_unique);
        return $arr_duplicates;
    } ?>

    function fetchData() {
        rowID()
        <?php
            //$boo =  (array) $spec->staff;
//                                    $staff = file_get_contents('http://localhost/spec-staff/4');
                //$json = file_get_contents('http://localhost/spec-staff/4');
                //$obj = json_decode($json);
        ?>
        //ONLY 1 ROW IN THE TABLE
        @foreach($spec->staff as $key=>$value)
        <?php $xx = 5; ?>

                $("#exampleTable_{{ $value->pivot->row_id}}_staff{{$xx}}").closest("tr").find('td:eq(0)').find('select')
                        .removeAttr('multiple')
                .attr('ondblclick','reloadSelect(this)')
                        .append('<option selected>{{ $value->pivot->days}}</option>');

                $("#exampleTable_{{ $value->pivot->row_id}}_staff{{$xx}}").val('{{ $users->find($value->pivot->user_id)->name }}')
                        .removeAttr('onclick');
        <?php $xx++; ?>
                $("#exampleTable_{{ $value->pivot->row_id}}_staff{{$xx}}").val('{{ $users->find($value->pivot->user_id)->lastname }}')
                .removeAttr('onclick');
        <?php $xx++; ?>
                $("#exampleTable_{{ $value->pivot->row_id}}_staff{{$xx}}").val('{{ $users->find($value->pivot->user_id)->uk_driving_license }}');
        <?php $xx++; ?>
                $("#exampleTable_{{ $value->pivot->row_id}}_staff{{$xx}}").val('{{ $users->find($value->pivot->user_id)->mobile }}');
        <?php $xx++; ?>
                $("#exampleTable_{{ $value->pivot->row_id}}_staff{{$xx}}").val('{{ $users->find($value->pivot->user_id)->email }}');
        <?php $xx++; ?>
                $("#exampleTable_{{ $value->pivot->row_id}}_staff{{$xx}}").val('{{ $users->find($value->pivot->user_id)->rtw_dirty }}');
        <?php $xx++; ?>
                $("#exampleTable_{{ $value->pivot->row_id}}_staff{{$xx}}").val('{{ $users->find($value->pivot->user_id)->medical_conditions }}');
        <?php $xx++; ?>
                $("#exampleTable_{{ $value->pivot->row_id}}_staff{{$xx}}").val(ifAge('{{ $users->find($value->pivot->user_id)->dob }}'));
        <?php $xx++; ?>
                $("#exampleTable_{{ $value->pivot->row_id}}_staff{{$xx}}").val('{{ $users->find($value->pivot->user_id)->id }}');
        <?php $xx++; ?>
                $("#exampleTable_{{ $value->pivot->row_id}}_staff{{$xx}}").val('{{ $value->pivot->row_id }}');
        <?php $array[] = $value->pivot->row_id; ?>
    @endforeach

    <?php
    if(isset($array)){

//MORE THAN 1 ROW IN THE TABLE
          foreach (duplicateRows($array) as $row){
                      $xx = 5;
                          foreach ($spec->staff()->orderBy('specs_user.id','asc')->get() as $key=>$value){ ?>
        @if($value->pivot->row_id==$row)

                addTopTime('exampleTable_{{$row}}')

            $("#exampleTable_{{$row}}_staff{{$xx}}").closest("tr").find('td:eq(0)').find('select')
                    .removeAttr('multiple')
                    .attr('ondblclick','reloadSelect(this)')
                    .append('<option selected>{{ $value->pivot->days}}</option>');

            $("#exampleTable_{{$row}}_staff{{$xx}}").closest("tr").find('td:eq(1)').find('select')
                    .append('<option selected>{{ $value->pivot->start}}</option>');

            $("#exampleTable_{{$row}}_staff{{$xx}}").closest("tr").find('td:eq(2)').find('select')
                    .append('<option selected>{{ $value->pivot->end}}</option>');

            $("#exampleTable_{{$row}}_staff{{$xx}}").val('{{ $users->find($value->pivot->user_id)->name }}');
        <?php $xx++; ?>
                $("#exampleTable_{{$row}}_staff{{$xx}}").val('{{ $users->find($value->pivot->user_id)->lastname }}');
        <?php $xx++; ?>
                $("#exampleTable_{{$row}}_staff{{$xx}}").val('{{ $users->find($value->pivot->user_id)->uk_driving_license }}');
        <?php $xx++; ?>
                $("#exampleTable_{{$row}}_staff{{$xx}}").val('{{ $users->find($value->pivot->user_id)->mobile }}');
        <?php $xx++; ?>
                $("#exampleTable_{{$row}}_staff{{$xx}}").val('{{ $users->find($value->pivot->user_id)->email }}');
        <?php $xx++; ?>
                $("#exampleTable_{{$row}}_staff{{$xx}}").val('{{ $users->find($value->pivot->user_id)->rtw_dirty }}');
        <?php $xx++; ?>
                $("#exampleTable_{{$row}}_staff{{$xx}}").val('{{ $users->find($value->pivot->user_id)->medical_conditions }}');
        <?php $xx++; ?>
                $("#exampleTable_{{$row}}_staff{{$xx}}").val(ifAge('{{ $users->find($value->pivot->user_id)->dob }}'));
        <?php $xx++; ?>
                $("#exampleTable_{{$row}}_staff{{$xx}}").val('{{ $users->find($value->pivot->user_id)->id }}');
        <?php $xx++; ?>
                $("#exampleTable_{{ $value->pivot->row_id}}_staff{{$xx}}").val('{{ $value->pivot->row_id }}');
        <?php $xx = $xx + 7; ?>
        @endif
        <?php  }
        }
        }?>
    }
</script>



@include('frontend.manager.sbf.includes.autocomplete')
<footer>
</footer>
</body>
</html>

@include('frontend.manager.sbf.includes.tables')

