<div class="col-lg-12" style="padding: 10px">
    <p>Row Functions: Select a row to use a function below.</p>
    <button type="button" class="btn btn-danger" onclick="removeTableRow()">Remove
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
    <button type="button" class="btn btn-warning" onclick="copyRow()">Copy
        <span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span>
    </button>
    <button type="button" class="btn btn-info" onclick="clearRow()">Clear
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    </button>
</div>
<div class="col-lg-3" style="padding: 0">
    <table id="firstTable" class="table">
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
                <input name="row_id[]" class="form-control" type="text"
                       value="">
            </td>
            <td width="10" style="vertical-align: middle; text-align: center">
                <input onchange="check(this)" type="checkbox" />
            </td>
            <td width="10" style="vertical-align: middle; text-align: center">
                <span onclick="addRows(this)" class="glyphicon glyphicon-plus" aria-hidden="true"></span>
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
    {!! Form::model($event,[
                            'method' => 'POST',
                            'route' => ['dashboard.specs.store'],
                            'class' => 'form-horizontal',
                            'id'    => 'spec_rows'])
                            !!}
    {{--<form id="spec_rows">--}}
    <input class="hidden" name="events_id" value="{{ $event->id }}">
    <table id="days" class="table search-table inner">
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
                ?>


                @if($event_start_date->day==$ctm_start_date_table->day)
                    @if($ctm_start_date_table->day <= ($diffInDays_event + $event_start))
                        <?php $red = 'bg-danger'; $event_start_date->addDay(); ?>
                    @endif
                @endif
                <td class="times {{$red}}">
                    <select class="form-control">
                        @foreach($arr as $time)
                            <option>{{ $time }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="times {{$red}}">
                    <select class="form-control">
                        @foreach($arr as $time)
                            <option>{{ $time }}</option>
                        @endforeach
                    </select>
                    {{--<input name="{{ $lower_day }}_end[]" class="form-control users" type="text"--}}
                    {{--value="{{ $end }}">--}}
                </td>
                <td class="times {{$red}}">
                    <input style="background-color: #e0f1f9" name="{{ $lower_day }}_hours[]" class="form-control users" type="text"
                           value="">
                </td>
                <?php $day_number_ng++; $ctm_start_date_table->addDay();  ?>
            @endfor

            <td>
                <div class="has-success has-feedback">
                    <input name="total[]" class="form-control users" type="text"
                           value="" readonly>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    </form>
</div>

<script>
    function editTabs(value) {
        if(value.checked){
            $(".existingTabs").append('<input type="text" class="form-control '+$(value).val()+'" required>').hide().fadeIn()
        } else {
            $(".existingTabs").find('input.'+$(value).val()).fadeOut(400, function () {
                $(this).remove()
            })
        }
    }

    $(function() {

        $('#tabsModalEdit').on('show.bs.modal', function (e) {
            $(".existingTabs").find('.checkbox').remove()
            $("#tabs").find('li').find('a').each(function(n, i) {
                var href = this.href;
                var tabs = (href.split("#").pop())
                if(tabs!="event_summary") {
                    $(".existingTabs").append('<div class="checkbox">' +
                        '<label>' +
                        '<input onchange="editTabs(this)" type="checkbox" name="' + tabs + '" value="' + tabs + '"> ' +
                        tabs +
                        '</label> ' +
                        '</div>')
                }
            });
        })
        


        $('#tabsModalRemove').on('show.bs.modal', function (e) {
            $(".existingTabs").find('.checkbox').remove()
            $("#tabs").find('li').find('a').each(function(n, i) {
                var href = this.href;
                var tabs = (href.split("#").pop())
                //console.log(tabs)
                if(tabs!="event_summary"){
                    $(".existingTabs").append('<div class="checkbox">' +
                        '<label>' +
                        '<input type="checkbox" name="'+tabs+'" value="'+tabs+'"> ' +
                        tabs +
                        '</label> ' +
                        '</div>')
                }
            });
        })

        $('#form_modal_tabs_edit').on('submit', function(event){
            event.preventDefault();
            var boo = $(this).find("input:checked").val()
            var inputVal = $(this).find("input."+boo).val()
            console.log(inputVal)
            if(inputVal != '') {
                //changes text but need to change both text and href
                //$("#tabs").find('li .csas').prop("href", "#"+inputVal)
                 $("#tabs").find('li').find('a[href$="'+boo+'"]').text(inputVal).attr("href", "#"+inputVal)
                    .closest('li').removeClass().addClass(inputVal)
                $("#parking").attr("id",inputVal);
            } else {

            }
            $(".existingTabs").find('input[type$="text"]').remove()
            $('#tabsModalEdit').modal('hide')

        });

        $('#form_modal_tabs_remove').on('submit', function(event){
            event.preventDefault();
            var boo = $(this).find("input:checked").val()
            console.log(boo)
//            if(boo == 'spec') {
//                alert("Can't remove this tab, but you can edit it!")
//                $('#tabsModalRemove').modal('hide')
//            } else {
                $("#tabs").find('li.'+boo).remove()
                $(".tab-content").find('#'+boo).remove()
                $('#tabsModalRemove').modal('hide')
//            }
        });

        $('#form_modal_tabs').on('submit', function(event){
            event.preventDefault();
            duplicateTabs($(this).find('input[name="new_text"]').val())
            console.log('fired')
            $('#tabsModal').modal('hide')
        });

        function addTab(name) {
            $("#tabs").append('<li class="'+name+'" role="presentation">' +
                '<a href="#'+name+'" aria-controls="'+name+'" role="tab" data-toggle="tab">'+name+'</a>' +
                '</li>')
            //Clone the 3 tabs and rename accordingly
            var clone_tabs = $('#extra_tab').clone();
            $('#three_tabs').append(clone_tabs);
                //alter the a href name dynamically
                $('#three_tabs > div:last').attr('id', name)
                $('#three_tabs > div:last ul li a:eq(0)').attr('href', '#'+name+'_summary')
                $('#three_tabs > div:last ul li a:eq(1)').attr('href', '#'+name+'_spec')
                $('#three_tabs > div:last ul li a:eq(2)').attr('href', '#'+name+'_costs')
                //alter the div id's name dynamically
                $('#three_tabs > div:last .tab-content > div:eq(0)').attr('id', name+'_summary')
                $('#three_tabs > div:last .tab-content > div:eq(1)').attr('id', name+'_spec')
                $('#three_tabs > div:last .tab-content > div:eq(2)').attr('id', name+'_costs')
            save_tabs()
        }

        function duplicateTabs(input) {
            console.log(input)
            var tabs = []
            $("#tabs").find('li').find('a').each(function(n, i) {
                var href = this.href;
                tabs.push(href.split("#").pop())
            });
            var foo = $.inArray( input, tabs );
            console.log(tabs)
            if(foo=='-1'){
                addTab(input)
            } else {
                //alert(input + ' Already Exists!')
            }
        }
    })

    function clearRow() {
    var $tr    = $('#firstTable').find('.highlighted')
    $tr.find(':text').val('');
    var $tr    = $('#days').find('.highlighted')
    $tr.find(':text').val('');
    }

    function copyRow() {
    var $tr    = $('#firstTable').find('.highlighted')//.css('background-color', 'yellow')
    var $clone_roles = $tr.clone();
    var $tr_days    = $('#days').find('tr.tr_clone.highlighted')
    var $clone_days = $tr_days.clone();
    $clone_roles.find('td:eq(1)').find('input:checkbox').removeAttr('checked')
    $clone_roles.removeClass('highlighted')
    $clone_days.removeClass('highlighted')
    $tr.after($clone_roles);
    $tr_days.after($clone_days);
    }

    function addRows(el) {
    var $tr    = $(el).closest('.tr_clone');
    var $clone = $tr.clone();
    var $trt    = $('#days').find('tr.tr_clone:first-child')
    //var $trt    = $('#days').find('tr.tr_clone.highlighted')
    var $clonet = $trt.clone();
    $clone.find(':text').val('');
    var foo = $clone.find('td:eq(1)')
    $tr.after($clone);
    $trt.after($clonet);
    //console.log(num)
    };

    function check(el) {
    var index = $(el).closest('tr').index();
    console.log(index)
    if ($(el).is(":checked")) {
    $(el).closest('tr').addClass("highlighted");
    $('#days').find('tr.tr_clone:eq('+index+')').addClass("highlighted")
    } else {
    $(el).closest('tr').removeClass("highlighted")
    $('#days').find('tr.tr_clone:eq('+index+')').removeClass("highlighted")
    }
    }

    function removeTableRow() {
    $('.highlighted').remove()
    }
</script>