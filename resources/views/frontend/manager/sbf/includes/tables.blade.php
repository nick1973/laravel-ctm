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
            $('td:eq(0)', nRow).css( "width", "100px" );
            $('td:eq(0)', nRow).addClass( "text-primary" );
            //$('td:eq(1),td:eq(2),td:eq(3),td:eq(4)', nRow).css( "width", "50px" );
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
            $('.week').parent('td').attr('colspan', 4)
            iTableCounter ++;
            //selectedDays(row.data())
        }
    });
});

function top_centre() {

    var s = $("#top_centre").slider({
        range: "max",
        min: 1,
        max: 4,
        value: 4,
        slide: function (event, ui) {
            $("#amount").val(ui.value);
            $('.week').parent('td').attr('colspan', ui.value)
            //$("td").attr('colspan', ui.value+'%')
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

function addRows(el) {
    var $tr    = $(el).closest('.tr_clone');
    var $clone = $tr.clone();
    $clone.find(':text').val('');
    var foo = $clone.find('td:eq(1)')
//    $( foo[0]+" :contains('.')" ).css( "text-decoration", "underline" );

//    if(foo.indexOf('.')){
//        console.log('found .')
//        var num = foo.split(".").pop()
//        num =+1
//    }
    //$clone.find('td:eq(1)').text(foo + '.' + num)
    $tr.after($clone);
    console.log(num)
};

function shifts ( d ) {
    // `d` is the original data object for the row
    var week = 0
    var dates = []
    for(var xx = 0; xx <= d['date'].length; xx++) {
        if(xx % 7 == 0){
            week++;
            dates.push(['week'+week])
        }
        dates[week-1].push([d['date'][xx]])
    }
    console.log(dates)
    var output;
    Object.size = function(obj) {
        var size = 0, key;
        for (key in obj) {
            if (obj.hasOwnProperty(key)) size++;
        }
        return size-8;
    };
    // Get the size of an object
    var daySize = Object.size(d);
    //console.log("day size " + daySize)
    for(var x = 1; x <= daySize; x++) {
        var dayNumber = '{{ $day }}';
        var counter1 = 0
        var foo = 'week' + x.toString()


        output += '<tr class="week">';
        output += '<td style="font-weight: bold; padding-top: 15px" width="75px">WEEK: ' + x + '</td>';
        output += '</tr>';
        //output += '<tr>';

        output += '<tr>';

        output += '<tr>';
        output += '<td></td>';
        output += '<td></td>';

        //console.log(dates[x])
        $.each(dates[x-1], function (index, value) {
            if (!value.includes("week")) {
                output += '<td class="small" style="font-weight: bold;text-align: center" colspan="2">' + value + '</td>';
            }
        })
        output += '</tr>';


        output += '<td></td>';
        output += '<td></td>';
        //console.log(d[foo])
        $.each(d[foo], function (index, value) {

            if (index.includes("saturday")) {
                if (index.includes("start")) {
                    var day = "Start"
                }
                if (index.includes("end")) {
                    var day = "End"
                }
            }
            if (index.includes("sunday")) {
                if (index.includes("start")) {
                    var day = "Start"
                }
                if (index.includes("end")) {
                    var day = "End"
                }
            }
            if (index.includes("monday")) {
                if (index.includes("start")) {
                    var day = "Start"
                }
                if (index.includes("end")) {
                    var day = "End"
                }
            }
            if (index.includes("tuesday")) {
                if (index.includes("start")) {
                    var day = "Start"
                }
                if (index.includes("end")) {
                    var day = "End"
                }
            }
            if (index.includes("wednesday")) {
                if (index.includes("start")) {
                    var day = "Start"
                }
                if (index.includes("end")) {
                    var day = "End"
                }
            }
            if (index.includes("thursday")) {
                if (index.includes("start")) {
                    var day = "Start"
                }
                if (index.includes("end")) {
                    var day = "End"
                }
            }
            if (index.includes("friday")) {
                if (index.includes("start")) {
                    var day = "Start"
                }
                if (index.includes("end")) {
                    var day = "End"
                }
            }
            output += '<td class="small" style="font-weight: bold;text-align: center">' + day + '</td>';
        });
        output += '<td class="small" style="font-weight: bold;text-align: center">Agent</td>';
        output += '<td class="small" style="font-weight: bold;text-align: center">First Name</td>';
        output += '<td class="small" style="font-weight: bold;text-align: center">Surname</td>';
        output += '<td class="small" style="font-weight: bold;text-align: center">Driver</td>';
        output += '<td class="small" style="font-weight: bold;text-align: center">Mobile</td>';
        output += '<td class="small" style="font-weight: bold;text-align: center">Email</td>';
        output += '<td class="small" style="font-weight: bold;text-align: center">RTW</td>';
        output += '<td class="small" style="font-weight: bold;text-align: center">Medical</td>';
        output += '<td class="small" style="font-weight: bold;text-align: center">Age</td>';
        output += '</tr>';



        for (var i = 1; i <= d.qty; i++) {
            var counter = 0;

            var id = 'staff' + i + ''

            output += '<tr class="tr_clone">';

            output += '<td><input onclick="addRows(this)" type="button" class="btn btn-success" value="Split"></td>';
            //output += '<td><input class="form-control btn btn-warning" type="button" value="Clear" onclick="clearStaff(this)"/></td>';

            output += '<td style="font-weight: bold; padding-left: 0px" width="75px">Staff: ' + i + '</td>';
            //console.log(d) TIMES
            //output += '<tr class="times">'
            $.each(d[foo], function (index, value) {
                output += '<td class="small"><input class="form-control" value="' + value + '"></td>';
            });
//        output += '{{ Form::open(['route' => 'dashboard.sbf.store', 'class' => 'table_form']) }}';
            //output += '<input id="row_id_'+iTableCounter+'" name="row_id[]" value="'+iTableCounter+'">';
        output += '<td>' +
                '<input name="agency[]" class="form-control" type="text" value=""/>' +
                '<div class="hidden">' +
                '<input name="spec_id" class="form-control static" value="{{$spec->id}}" />' +
                '</div>' +
                '</td>';
        output += '<td id="name_row">' +
                '<input name="name[]" onclick="getId(this)" onfocus="searchName(this)" class="form-control noID name" type="text" value=""/>' +
                '</td>';
            output += '<td><input name="last_name[]" onclick="getId(this)" onfocus="searchLastName(this)" class="form-control noID" type="text"/></td>'
            output += '<td><input class="form-control noID" type="text" value=""/></td>' +
                    '<td><input class="form-control noID" type="text" value=""/></td>' +
                    '<td><input class="form-control noID" type="text" value=""/></td>' +
                    '<td><input class="form-control noID" type="text" value=""/></td>' +
                    '<td><input class="form-control noID" type="text" value=""/></td>' +
                    '<td><input class="form-control noID" type="text" value=""/></td>' +
                    '<td><input name="user_id[]" class="form-control noID user_id hidden" type="text" value=""/></td>' +
                    '<td><input name="row_id[]" class="form-control noID hidden" type="text" value=""/></td>'
//        output += fnFormatDetails(iTableCounter, TableHtml);
//        output += '</td>';
//        iTableCounter ++;
//        output += '</form>';
//        output += '</tr>';

            //output += '</table>';

            //output += '<tr></tr>';
        }
    }

    return output;
}
</script>