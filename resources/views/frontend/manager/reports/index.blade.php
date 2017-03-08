@extends('frontend.layouts.master')

@section('content')
    <?php $id = ''; ?>
    <div>
        <h3>Staff Report</h3>
        <div id="bal"></div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Approved</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Non Approved</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <div class="row">
                    <form id="reports" class="form-inline">
                        <div class="col-lg-12" style="padding-top: 15px">
                            <div class="form-group">
                                <label for="exampleInputName2">Heard About?</label>
                                <select id="heard" class="form-control" name="heard">
                                    <option value="">Please Choose where heard about</option>
                                    @foreach($heard as $hear)
                                        <option id="{{ $hear->id }}">{{ $hear->hear_about_us_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName2">Promotions</label>
                                <select id="promo" class="form-control" name="promo">
                                    <option value="">Please Choose a Promotions</option>
                                    @foreach($promotions as $promotion)
                                        <option id="{{ $promotion->id }}">{{ $promotion->promo_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName2">Uni's</label>
                                <select id="uni" class="form-control" name="uni">
                                    <option value="">Please Choose a Uni</option>
                                    @foreach($unis as $uni)
                                        <option id="{{ $uni->id }}">{{ $uni->uni_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12" style="padding-top: 15px">
                            <label for="exampleInputName2">From:</label>
                            <input class="form-control" name="from" type="date">
                            <label for="exampleInputName2">To:</label>
                            <input class="form-control" name="to" type="date">
                            <input class="form-control btn-primary" type="button" onclick="return submitForm(this.form, 'filter_reports')" value="Apply Filter">
                            <img style="display: none" class="loaderImage" src="/ajax-loader.gif">
                        </div>
                    </form>

                    <div class="col-md-12 col-lg-12" style="padding-top: 40px">
                        <table id="filter_reports" class="table table-striped table-hover table-bordered dashboard-table">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Payroll</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Heard About</th>
                                <th>Promo's</th>
                                <th>Uni's</th>
                                <th>Application Created</th>
                                <th>Application Updated</th>
                            </tr>
                            </thead>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div><!-- row -->
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
                <div class="row">
                    <form id="reports_non" class="form-inline">
                        <div class="col-lg-12" style="padding-top: 15px">
                            <div class="form-group">
                                <label for="exampleInputName2">Heard About?</label>
                                <select id="heard" class="form-control" name="heard">
                                    <option value="">Please Choose where heard about</option>
                                    @foreach($heard as $hear)
                                        <option id="{{ $hear->id }}">{{ $hear->hear_about_us_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName2">Promotions</label>
                                <select id="promo" class="form-control" name="promo">
                                    <option value="">Please Choose a Promotions</option>
                                    @foreach($promotions as $promotion)
                                        <option id="{{ $promotion->id }}">{{ $promotion->promo_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName2">Uni's</label>
                                <select id="uni" class="form-control" name="uni">
                                    <option value="">Please Choose a Uni</option>
                                    @foreach($unis as $uni)
                                        <option id="{{ $uni->id }}">{{ $uni->uni_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12" style="padding-top: 15px">
                            <label for="exampleInputName2">From:</label>
                            <input class="form-control" name="from" type="date">
                            <label for="exampleInputName2">To:</label>
                            <input class="form-control" name="to" type="date">
                            <input class="form-control btn-primary" type="button" onclick="return submitForm(this.form, 'non_approved')" value="Apply Filter">
                            <img style="display: none" class="loaderImage" src="/ajax-loader.gif">
                        </div>
                    </form>

                    <div class="col-md-12 col-lg-12" style="padding-top: 40px">
                        <table id="non_approved" class="table table-striped table-hover table-bordered dashboard-table">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Payroll</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Heard About</th>
                                <th>Promo's</th>
                                <th>Uni's</th>
                                <th>Application Created</th>
                                <th>Application Updated</th>
                            </tr>
                            </thead>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div><!-- row -->
            </div>
        </div>
    </div>

    <script>


        $("#radius").change(function () {
            if($(this).find(":selected").text()=='50+'){
                $('#postcode').val('')
            }
        });

        $('#event_name').on('change', function() {
            var ar = <?php echo json_encode($events) ?>;
            function search(nameKey, myArray){
                for (var i=0; i < myArray.length; i++) {
                    if (myArray[i].name === nameKey) {
                        return myArray[i];
                    }
                }
            }
            var resultObject = search(this.value, ar);
            $("#postcode").val(resultObject.postcode)
        });

        $('#event_name_non_approved').on('change', function() {
            var ar = <?php echo json_encode($events) ?>;
            function search(nameKey, myArray){
                for (var i=0; i < myArray.length; i++) {
                    if (myArray[i].name === nameKey) {
                        return myArray[i];
                    }
                }
            }
            var resultObject = search(this.value, ar);
            $("#postcode_non_approved").val(resultObject.postcode)
        });

        function submitForm(form, dTable){
//            $.fn.dataTable.moment( 'dddd, MMMM Do, YYYY' );
            var table = $('#'+dTable).DataTable();
            if (table instanceof $.fn.dataTable.Api) {
                table.destroy();
            } else {
                // not a datatable... do other stuff
            }
            if(dTable=='filter_reports'){
                var formData = $('#reports').serializeArray();
                var url = '/dashboard/manager/staff-report/approved'
            } else {
                var formData = $('#reports_non').serializeArray();
                var url = '/dashboard/manager/staff-report/non_approved'
            }

            //console.log(formData[1]['value'])
            //console.log(formData[0]['value'])
            $('.loaderImage').show();
            $.post(url, formData).done(function (results) {
                $('.loaderImage').hide();
                console.log(results.data);
                setTimeout(self.timeoutHandler, 750);

                var table = $('#'+dTable).DataTable( {
                    "sPaginationType": "full_numbers",
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false,
                    "bProcessing": true,
                    data: results.data,
                    dom: 'Bflrtip',
                    buttons: [
                        'csv',
                        {
                            text: 'Select All',
                            action: function ( e, dt, node, config ) {
                                selectApproved(dTable)
                            }
                        },
                        {
                            text: 'Email Staff',
                            action: function ( e, dt, node, config ) {
                                send_user('email',dTable)
                            }
                        },
                        {
                            text: 'Text Staff',
                            action: function ( e, dt, node, config ) {
                                send_user('text',dTable)
                            }
                        }
                    ],
                    "columns": [
                        {
                            "data": function (data) {
                                return '<input class="user" type="checkbox" name="'+data.email+'" id="'+data.mobile+'">'
                            }, className: "centre get"
                        },
                        { "data": "email" , className: "centre get", "visible": false },
                        { "data": "payroll" , className: "centre get" //, "visible": false
                        },
                        {
                            "data": function (data) {
                                return '<a href="/dashboard/manager/'+data.id+'">'+data.name+'</a>'
                            }, className: "centre get"
                        },
//                        { "data": "name" , className: "centre get" },
                        { "data": "lastname" , className: "centre get" },
                        { "data": "mobile" , className: "centre get" },
                        { "data": "email" , className: "centre get" },
                        //{ "data": "heard_about_us" , className: "centre get" },
                        {
                            "data": "heard_about_us",
                            "render": function (data) {
                                if(data=='-1'){
                                    return ''
                                }
                                if(data=='1'){
                                    return 'Other'
                                }
                                if(data=='2'){
                                    return 'Word of mouth'
                                }
                                if(data=='3'){
                                    return 'Event website'
                                }
                                if(data=='4'){
                                    return 'Online job site e.g. Indeed/Total Jobs etc.'
                                }
                                if(data=='5'){
                                    return 'University job board'
                                }
                                    return data
                            }
                        },
                        { "data": "promotion" , className: "centre get" },
                        { "data": "uni" , className: "centre get" },
                        {
                            "data": "created_at",
                            "render": function (data) {
                                var date = new Date(data);
                                var month = date.getMonth() + 1;
                                return date.getDate() + "-" + month + "-" + date.getFullYear();
                            }
                        },
                        {
                            "data": "updated_at",
                            "render": function (data) {
                                var date = new Date(data);
                                var month = date.getMonth() + 1;
                                return date.getDate() + "-" + month + "-" + date.getFullYear();
                            }
                        }
                    ]
                });
                //table.destroy();
            }).fail(function(xhr, status, error) {
                // error handling
                $('.loaderImage').hide();
                //alert("Non valid postcode. Eg. CV1 8MD")
            });
        }
        var email_selected = [];
        var mobile_selected = [];

        function selectApproved(table) {
            var dataTable = $('#'+table).dataTable()
            $(".user:input", dataTable.fnGetNodes()).each(function(){
                $(this).attr('checked',true)
            })
        }

        function send_user(message, table){
            var selected = [];
            var mobile = [];
            var dataTable = $('#'+table).dataTable()
            $(".user:input:checked", dataTable.fnGetNodes()).each(function(){
                selected.push($(this).attr('name'));
                mobile.push($(this).attr('id'));
            })
            var sorted_arr = selected.slice().sort();
            var text_sorted_arr = mobile.slice().sort();
            var emailresults = [];
            var textresults = [];
            for (var i = 0; i < selected.length - 1; i++) {
                if (sorted_arr[i + 1] == sorted_arr[i]) {
                    emailresults.push(sorted_arr[i]);
                }
            }
            for (var i = 0; i < mobile.length - 1; i++) {
                if (text_sorted_arr[i + 1] == text_sorted_arr[i]) {
                    textresults.push(text_sorted_arr[i]);
                }
            }
            email_selected = sorted_arr
            mobile_selected = mobile
            //console.log(email_selected)

            if(mobile_selected.length == 0){
                //console.log(mobile_selected)
                $("#free_input input").remove()
                $("#free_input label").remove()
                $("#free_input").append('<label>Mobile (07777777777,07555555555)</label><input id="mobile_numbers" class="form-control" name="mobile_numbers">')
            } else {
                $("#free_input label").remove()
                $("#free_input input").remove()
            }


            if(message=='email'){
                $('#emailModal').modal('show')
            } else{
                $('#textModal').modal('show')
            }
        }

        function textcontent() {
            if(mobile_selected.length == 0){
                var mobile = [];
                var mobileArray = $("input[name=mobile_numbers]").val().split(',')
                mobile_selected = mobileArray
                console.log(mobile_selected)
            }

            // Get the HTML contents of the currently active editor
            console.debug(tinyMCE.activeEditor.getContent());
            //method1 getting the content of the active editor
            $.ajax({
                type: "POST",
                url: '/dashboard/manager/text',
                data: {numbers: mobile_selected,
                    message: tinyMCE.get('textcomments').getContent({ format: 'text' })
                }
            }).done(function(data) {
                //$( this ).addClass( "done" );
                console.log(data)
                $("#bal").append('<p>Text Local Credits:= ' + data + '</p>')
            });
            //location.reload();
            //$("#confirm_form").submit();
            alert('Text been sent to ' + mobile_selected);
            $('#textModal').modal('hide')
        }

        function content() {
            // Get the HTML contents of the currently active editor
            console.debug(tinyMCE.activeEditor.getContent());
            //method1 getting the content of the active editor
            $.ajax({
                type: "POST",
                url: '/email',
                data: {email: tinyMCE.get('comments').getContent(),
                    e_address: email_selected
                }
            });
            //location.reload();
            //$("#confirm_form").submit();
            alert('Email has been sent to ' + email_selected);
            $('#emailModal').modal('hide')
        }

        tinymce.init({
            selector: '#comments',
            plugins: "fullpage",
            fullpage_default_font_family: "'Open Sans', sans-serif;",
            content_css : "/css/content.css",
            height : "480"
        });

        tinymce.init({
            selector: '#textcomments',
            height : "480"
        });
    </script>
    <style>
        .centre {
            text-align: center;
        }
        .centandcaps{
            text-align: center;
            text-transform: uppercase;
        }
    </style>
    <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Email</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <textarea id="comments">
				<p>Hi,</p>
                <p>We are currently staffing the following event. Spaces are limited to 1 booking per call.</p>
                            <p>Event: </p>
                            <p>Dates: </p>
                            <p>Positions available: </p>
                            <p>Pay date: </p>
                            <p>Shifts: </p>
                            <p>Uniform: Black trousers, white shirt & sturdy black shoes</p>
                            <p>Transport: None provided (Please check that you can get there before calling to book shifts)</p>
                            <p>Camping:</p>
                            <p>Please call 01676 549001 for further details and to bo0ok shifts</p>
                            <p>Please note we do not book people through emails</p>
                            <p>Regards,</p>
                            <p>Emma & Abbie</p>
			</textarea>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button onclick="content()" class="btn btn-primary" type="submit">Send</button>
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="textModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Text</h4>
                </div>
                <div class="modal-body">
                    <form id="text_form">
                        <div class="form-group" id="free_input"></div>
                        <textarea id="textcomments"></textarea>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button onclick="textcontent()" class="btn btn-primary" type="submit">Send</button>
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div>
        </div>
    </div>
@endsection