<script>
var iTableCounter = 1;
var oInnerTable;
var oTable;
var table;
var TableHtml;
var count = 1;
// IN A FUNCTION THAT PASSES THE MAIN PARENT ID TO USE TO HOOK

function staffing(id) {
    daysSplit(id)
    var tableId = $(id).closest('table').attr('id');
    var tableNo = tableId.match(/\d+/)
    function add() {
        var t = $("#" + tableId).DataTable();
        t.row.add( [
            '<td class="large"><select name="days[]" class="form-control"  onchange="saveDays(this)" ondblclick="reloadSelect(this)" multiple>'+
            <?php
    for($i=0; $i <= $diffInDays; $i++)
    {
        if($day_number_copy ==7){
        $day_number_copy=0;
    } ?>
        '<option id="{{ dayOfWeek($day_number_copy) }}{{ $i }}" value="{{ dayOfWeek($day_number_copy) }} {{ $ctm_start_date_copy->day }}">{{ dayOfWeek($day_number_copy) }} {{ $ctm_start_date_copy->day }}</option>'+
        <?php $day_number_copy++; $ctm_start_date_copy->addDay();
        } ?>

    '</select></td>',
            '<td width="75"><select name="start[]" id="'+tableId+'_start'+count+'" class="form-control"><option><?php foreach($arr as $time) {?><option>{{ $time }}</option><?php } ?></option></select></td>',
            '<td width="75"><select name="end[]" id="'+tableId+'_end" class="form-control"><option><?php foreach($arr as $time) {?><option>{{ $time }}</option><?php } ?></option></select></td>',
            '<td><input id="'+tableId+'_agency'+count+'" class="form-control" type="text" value=""/></td>',
            '<td><input onfocus="searchName(this)" id="'+tableId+'_first_name'+count+'" class="form-control hasID" type="text" value=""/></td>',
            '<td><input onfocus="searchLastName(this)" id="'+tableId+'_Last_name'+count+'" class="form-control hasID" type="text" value=""/></td>',
            '<td><input id="'+tableId+'_driver'+count+'" class="form-control hasID" type="text" value=""/></td>',
            '<td><input id="'+tableId+'_mobile'+count+'" class="form-control hasID" type="text" value=""/></td>',
            '<td><input id="'+tableId+'_email'+count+'" class="form-control hasID" type="text" value=""/></td>',
            '<td><input id="'+tableId+'_rtw'+count+'" class="form-control hasID" type="text" value=""/></td>',
            '<td><input id="'+tableId+'_medical'+count+'" class="form-control hasID" type="text" value=""/></td>',
            '<td><input id="'+tableId+'_age'+count+'" class="form-control hasID" type="text" value=""/></td>',
            '<td><input name="user_id[]" id="'+tableId+'_id'+count+'" class="form-control hasID hidden" value="5"/></td>',
            '<td><input name="row_id[]" class="form-control hidden" value="'+tableNo+'"/></td>',
            '<td><input class="form-control btn btn-warning" type="button" value="Clear" onclick="clearStaff(this)"/></td>',
            '<td><input class="form-control btn btn-danger remove" type="button" value="Remove" onclick="remove(this)"/></td>'
    ] ).draw();
    }
    add();
    addTopTime(tableId)
    //reloadSelect(id)
    count++;
    $(".timeObj").change(function () {
        var foo = $('select[name=timeObj]').val()
        //console.log(foo)
    });
    count++
}

function addTopTime(id) {
    //APPEND TWO DROPDOWNS FOR THE TIME
    //$("#"+id).find('.start').replaceWith('<td width="75" class="start"><select name="start[]" id="'+id+'_start" class="form-control"><option><?php foreach($arr as $time) {?><option>{{ $time }}</option><?php } ?></option></select></td>')
    //$("#"+id).find('.finish').replaceWith('<td width="75" class="finish"><select name="end[]" id="'+id+'_end" class="form-control"><option><?php foreach($arr as $time) {?><option>{{ $time }}</option><?php } ?></option></select></td>')
    $("#"+id).find('.start').find('select').removeClass('hidden')
    $("#"+id).find('.finish').find('select').removeClass('hidden')

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

        var row_id = 0
        $('#'+id+' > tbody > tr').each(function(index, value) {//:not(:first)
            row_id += Number($('td:eq(13)', this).find('input').length)
        });
        //console.log(row_id)
        $('.remove').click( function () {
            t.row('.selected').remove().draw( false );
            if(row_id >1){
                //$('#'+id+' td:first').find('select').removeAttr('multiple')

            } else {
                $('#'+id+' td:first').find('select').prop('multiple', true).dblclick()
                //$("#"+id).find('.start').addClass('hidden')
                //$("#"+id).find('.finish').addClass('hidden')

                //clearStaff($('#'+id+' td:first').find('select'))
                //$('#'+id+' td:first').find('select option').remove()
            }

        });
    });
}

function fnFormatDetails(table_id, html) {
    $("#exampleTable_" + table_id).DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false
    });

    var sOut = "<table class='staff' id=\"exampleTable_" + table_id + "\">";
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
                "className":      'details-control closed',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            //{ "data": "row_id" },
            { "data": "grade" },
            { "data": "position" },
            { "data": "qty" }
        ],
        "order": [[1, 'asc']],
        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            $('td:eq(0)', nRow).addClass( "text-primary" );
            $('td:eq(1),td:eq(2),td:eq(3),td:eq(4)', nRow).addClass( "lead" );
        }
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
        //location.reload()
            $(this).addClass('closed')
        var nTr = $(this).parents('tr')[0];
        var nextTr = $(this).parents('tr')[1];
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        if (oTable.fnIsOpen(nTr)) {
            /* This row is already open - close it */
            this.src = "http://i.imgur.com/d4ICC.png";
            oTable.fnClose(nTr);
        }
        else {
            $(this).removeClass('closed')
            /* Open this row */
            this.src = "http://i.imgur.com/d4ICC.png";

//                oTable.fnOpen(nTr, fnFormatDetails(iTableCounter, TableHtml), format(row.data()));
            oTable.fnOpen(nTr, shifts(row.data()));
            oInnerTable = $("#exampleTable_" + iTableCounter).DataTable({
            });

            $(".name").each(function(){
                $(this)[0].onclick();
            })
            //fetchData()
            dragNdrop()
            top_centre()
            iTableCounter ++;
            //selectedDays(row.data())
        }
    });
});

function top_centre() {
    $( "#top_centre" ).slider({
        range: "max",
        min: 10,
        max: 100,
        value: 0,
        slide: function( event, ui ) {
            $( "#amount" ).val( ui.value );
            $(".colspan").attr('colspan', ui.value+'%')
            //console.log(ui.value)
        }
    });
}

function dragNdrop() {
    var countTables = $('.staff').length;
    //console.log(countTables)
    for(var x=1; x <=countTables; x++){
        $("#exampleTable_" + x + " tbody").sortable({
            items: "> tr",//:not(:first)
            appendTo: "parent",
            helper: "clone",
            placeholder: 'ui-state-highlight',
            classes: {
                "ui-sortable": "highlight"
            },
            update: function(event, ui) {
                addNote()
            }
        }).disableSelection();//.effect("bounce", "slow" );
    }
}

function selectedDays(d) {
    Object.size = function(obj) {
        var size = 0, key;
        for (key in obj) {
            if (obj.hasOwnProperty(key)) size++;
        }
        return size-7;
    };

    var daySize = Object.size(d);

    for(var x = 1; x <= daySize; x++) {
        var dayNumber = '{{ $day_number }}';
        var counter1 = 0
        var foo = 'week' + x.toString()


            @for($i=0; $i <= $diffInDays; $i++)
                <?php $x=0; ?>
                <?php if($diffInDays % 7 == 0){ $x++ ?>

                    <?php if($day_number == 7){ $day_number=0; }?>
                            $("#exampleTable_{{$x}}").find('td:first').find('select')
                        .append('<option><?php echo dayOfWeek($day_number); echo $ctm_start_date->day;  ?></option>')

                <?php $day_number++; ?>
                <?php $ctm_start_date->addDay(); ?>
                //console.log('{{$ctm_start_date->day}}')

                <?php } ?>
            @endfor

    }


//    $(".days").each(function () {
//        $(this).css('background-color', 'yellow')
//    })
}

function shifts ( d ) {
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
    //console.log("day size " + daySize)
    for(var x = 1; x <= daySize; x++) {
        var dayNumber = '{{ $day }}';
        var counter1 = 0
        var foo = 'week' + x.toString()
        output += '<tr>';
        output += '<td style="font-weight: bold">WEEK: ' + x + '</td>';
        output += '</tr>';

        output += '<tr>';
        $.each(d[foo], function (index, value) {
                if(counter1 % 7 == 0 && x > 1){
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
                counter1++;
                if (counter1 % 3 == 0) {
                    output += '<td class="small"></td>'
                    //output += '</tr>';
                    dayNumber++
                }
            });
            //console.log(d)
            output += '<tr class="times">'
            $.each(d[foo], function (index, value) {
                output += '<td class="large"><b>' + value + '</b></td>';

                counter1++;
                if (counter1 % 3 == 0) {
                    output += '<td class="small"></td>'
                    //output += '</tr>';
                    dayNumber++
                }
            });

        output += '</tr>';
        output += '<tr>';


        for (var i = 1; i <= d.qty; i++) {
            var counter = 0;

            output += '<tr>';
//            output += '</tr>';
//            output += '<tr>';

//            $.each(d[foo], function (index, value) {
//                if(counter % 7 == 0 && x > 1){
//                    dayNumber = +dayNumber+7
//                }
//                if(index.includes("saturday")){
//                    if(index.includes("start")){
//                        var day = "Saturday"+dayNumber+" Start"
//                    }
//                    if(index.includes("end")){
//                        var day = "Saturday"+dayNumber+" End"
//                    }
//                    if(index.includes("sub_total")){
//                        var day = "Saturday"+dayNumber+" Hours"
//                    }
//                }
//                if(index.includes("sunday")){
//                    if(index.includes("start")){
//                        var day = "Sunday"+dayNumber+" Start"
//                    }
//                    if(index.includes("end")){
//                        var day = "Sunday"+dayNumber+" End"
//                    }
//                    if(index.includes("sub_total")){
//                        var day = "Sunday"+dayNumber+" Hours"
//                    }
//                }
//                if(index.includes("monday")){
//                    if(index.includes("start")){
//                        var day = "Monday"+dayNumber+" Start"
//                    }
//                    if(index.includes("end")){
//                        var day = "Monday"+dayNumber+" End"
//                    }
//                    if(index.includes("sub_total")){
//                        var day = "Monday"+dayNumber+" Hours"
//                    }
//                }
//                if(index.includes("tuesday")){
//                    if(index.includes("start")){
//                        var day = "Tuesday"+dayNumber+" Start"
//                    }
//                    if(index.includes("end")){
//                        var day = "Tuesday"+dayNumber+" End"
//                    }
//                    if(index.includes("sub_total")){
//                        var day = "Tuesday"+dayNumber+" Hours"
//                    }
//                }
//                if(index.includes("wednesday")){
//                    if(index.includes("start")){
//                        var day = "Wednesday"+dayNumber+" Start"
//                    }
//                    if(index.includes("end")){
//                        var day = "Wednesday"+dayNumber+" End"
//                    }
//                    if(index.includes("sub_total")){
//                        var day = "Wednesday"+dayNumber+" Hours"
//                    }
//                }
//                if(index.includes("thursday")){
//                    if(index.includes("start")){
//                        var day = "Thursday"+dayNumber+" Start"
//                    }
//                    if(index.includes("end")){
//                        var day = "Thursday"+dayNumber+" End"
//                    }
//                    if(index.includes("sub_total")){
//                        var day = "Thursday"+dayNumber+" Hours"
//                    }
//                }
//                if(index.includes("friday")){
//                    if(index.includes("start")){
//                        var day = "Friday"+dayNumber+" Start"
//                    }
//                    if(index.includes("end")){
//                        var day = "Friday"+dayNumber+" End"
//                    }
//                    if(index.includes("sub_total")){
//                        var day = "Friday"+dayNumber+" Hours"
//                    }
//                }
//                //if(value.length > 0){
//                output += '<td class="large" style="font-weight: bold; background-color: #dddddd">'+day+'</td>';
//                //}
//                counter++;
//                if (counter % 3 == 0) {
//                    output += '<td class="small"></td>'
//                    //output += '</tr>';
//                    dayNumber++
//                }
//            });
//            //console.log(d)
//            output += '<tr class="times">'
//            $.each(d[foo], function (index, value) {
//                output += '<td class="large"><b>' + value + '</b></td>';
//
//                counter++;
//                if (counter % 3 == 0) {
//                    output += '<td class="small"></td>'
//                    //output += '</tr>';
//                    dayNumber++
//                }
//            });
//            output += '<td><b>'+d.total+'</b></td>'
            //output += '<td><input class="form-control btn btn-info clone" type="button" value="Clone" onclick="clone(this)"/></td>'
            output += '</tr>';
            var id = 'staff'+i+''
            output += '<tr id='+id+'>';
            output += '<td style="font-weight: bold">Staff: ' + i + '</td>';
            output += '</tr>';

            //output += '<td colspan="'+dayNumber+'">';
            //output += '<td colspan="100%">';
            output += '<td class="colspan" colspan="10%">';
            output += '{{ Form::open(['route' => 'dashboard.sbf.store', 'class' => 'table_form']) }}';
            //output += '<input id="row_id_'+iTableCounter+'" name="row_id[]" value="'+iTableCounter+'">';
            output += fnFormatDetails(iTableCounter, TableHtml);
            iTableCounter ++;
            output += '</form>';
            output += '<td>';
            output += '</tr>';
        }
    }
    return output;
}
</script>