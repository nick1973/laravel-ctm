@extends('frontend.layouts.master')

@section('content')
    <?php $id = ''; ?>
    <div>
        <h3>Staff Search</h3>
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
                    <form id="filters" class="form-inline">
                        <div class="col-lg-12" style="padding-top: 15px">
                            <div class="form-group">
                                <label for="exampleInputName2">Event</label>
                                <select id="event_name" class="form-control" name="event_name">
                                    <option>Please Choose an Event</option>
                                    @foreach($events as $event)
                                        <option id="{{ $event->id }}">{{ $event->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2">Postcode</label>
                                <input type="text" class="form-control" id="postcode"
                                       placeholder="Postcode" name="postcode">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2">Catchment Radius</label>
                                <select class="form-control" name="radius" id="radius">
                                    <option>0</option>
                                    <option>5</option>
                                    <option>10</option>
                                    <option>15</option>
                                    <option>20</option>
                                    <option>30</option>
                                    <option>40</option>
                                    <option>50</option>
                                    <option>50+</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12" style="padding-top: 15px">
                            <div class="form-group">
                                <label for="exampleInputEmail2">Limit to staff who have selected this event</label>
                                <label class="radio-inline">
                                    <input type="radio" name="staff_event" value="Yes"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="staff_event" value="No" checked> No
                                </label>
                            </div>
                            <div class="form-group" style="padding-left: 50px">
                                <label for="exampleInputEmail2">NRWSA Qualified</label>
                                <label class="radio-inline">
                                    <input type="radio" name="nrswa" value="Yes"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nrswa" value="No" checked> Any
                                </label>
                            </div>
                            <div class="form-group" style="padding-left: 50px">
                                <label for="exampleInputEmail2">Driver</label>
                                <label class="radio-inline">
                                    <input type="radio" name="uk_driving_license" value="Yes"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="uk_driving_license" value="No" checked> Any
                                </label>
                            </div>
                            <input name="app_status" value="3" hidden>
                            <input class="form-control btn-primary" type="button" onclick="return submitForm(this.form, 'events')" value="Apply Filter">
                            <img style="display: none" class="loaderImage" src="/ajax-loader.gif">
                            <a class="openmodal btn btn-warning" href="#contact"  data-toggle="modal" data-id="">View Map</a>
                        </div>
                    </form>

                    <div class="col-md-12 col-lg-12" style="padding-top: 40px">
                        <table id="events" class="table table-striped table-hover table-bordered dashboard-table">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Title</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Postcode</th>
                                <th>Age</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>NRSWA</th>
                                <th>Driver</th>
                                <th>Chosen Event</th>
                                <th></th>
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
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div><!-- row -->
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
                <div class="row">
                    <form id="filers" class="form-inline">
                        <div class="col-lg-12" style="padding-top: 15px">
                            <div class="form-group">
                                <label for="exampleInputName2">Event</label>
                                <select id="event_name_non_approved" class="form-control" name="event_name">
                                    <option>Please Choose an Event</option>
                                    @foreach($events as $event)
                                        <option id="{{ $event->id }}">{{ $event->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2">Postcode</label>
                                <input type="text" class="form-control" id="postcode_non_approved"
                                       placeholder="Postcode" name="postcode">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2">Catchment Radius</label>
                                <select class="form-control" name="radius" id="radius">
                                    <option>0</option>
                                    <option>5</option>
                                    <option>10</option>
                                    <option>15</option>
                                    <option>20</option>
                                    <option>30</option>
                                    <option>40</option>
                                    <option>50</option>
                                    <option>50+</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12" style="padding-top: 15px">
                            <div class="form-group">
                                <label for="exampleInputEmail2">Limit to staff who have selected this event</label>
                                <label class="radio-inline">
                                    <input type="radio" name="staff_event" value="Yes"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="staff_event" value="No" checked> No
                                </label>
                            </div>
                            <div class="form-group" style="padding-left: 50px">
                                <label for="exampleInputEmail2">NRWSA Qualified</label>
                                <label class="radio-inline">
                                    <input type="radio" name="nrswa" value="Yes"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nrswa" value="No" checked> Any
                                </label>
                            </div>
                            <div class="form-group" style="padding-left: 50px">
                                <label for="exampleInputEmail2">Driver</label>
                                <label class="radio-inline">
                                    <input type="radio" name="uk_driving_license" value="Yes"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="uk_driving_license" value="No" checked> Any
                                </label>
                            </div>
                            <input name="app_status" value="0" hidden>
                            <input class="form-control btn-primary" type="button" onclick="return submitForm(this.form, 'non_approved')" value="Apply Filter">
                            <img style="display: none" class="loaderImage" src="/ajax-loader.gif">
                            <a class="openmodal btn btn-warning" href="#contact"  data-toggle="modal" data-id="">View Map</a>
                        </div>
                    </form>

                    <div class="col-md-12 col-lg-12" style="padding-top: 40px">
                        <table id="non_approved" class="table table-striped table-hover table-bordered dashboard-table">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Title</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Postcode</th>
                                <th>Age</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>NRSWA</th>
                                <th>Driver</th>
                                <th>Chosen Event</th>
                                <th></th>
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
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div><!-- row -->
            </div>
        </div>
    </div>

    <script>
        var staff = []
        var postcodes = []
        $("#radius").change(function () {
            if($(this).find(":selected").text()=='50+'){
                $('#postcode').val('')
            }
        });

        $('#event_name').on('change', function() {
            var ar = <?php echo json_encode($events) ?>;
            function search(nameKey, myArray){
                for (var i=0; i < myArray.length; i++) {
                    if (myArray[i].name.trim() === nameKey) {
                        return myArray[i];
                    }
                }
            }
            var resultObject = search(this.value, ar);
            console.log(ar)
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
            postcodes = []
            var table = $('#'+dTable).DataTable();
            if (table instanceof $.fn.dataTable.Api) {
                table.destroy();
            } else {
                // not a datatable... do other stuff
            }
            if(dTable=='events'){
                var formData = $('#filters').serializeArray();
                var url = '/dashboard/manager/staff-search/approved'
            } else {
                var formData = $('#filers').serializeArray();
                var url = '/dashboard/manager/staff-search/non_approved'
            }
            //console.log(formData[0]['value'])
            $('.loaderImage').show();
            $.post(url, formData).done(function (results) {
                var sum = []

                $('.loaderImage').hide();
                $.each( results.data, function( index, value ){
                    staff.push(value)
                    if(value['postcode'] == null){
                    } else {
                        if( value['postcode'] != ''){
                            var str = value['postcode'].replace(/\s/g,'');
                            postcodes.push(str)
                        }
                    }
                });
                //console.log( staff )
//                console.log( postcodes );
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
                            text: 'Deselect All',
                            action: function ( e, dt, node, config ) {
                                deselect(dTable)
                            }
                        },
                        {
                            text: 'Select All',
                            action: function ( e, dt, node, config ) {
                                select(dTable)
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
                        { "data": "title" , className: "centre get" },
                        {
                            "data": function (data) {
                                return '<a href="/dashboard/manager/'+data.id+'">'+data.name+'</a>'
                            }, className: "centre get"
                        },
//                        { "data": "name" , className: "centre get" },
                        { "data": "lastname" , className: "centre get" },
                        { "data": "postcode" , className: "centre get" },
                        {
                            "data": function (data) {
                                //if (data.dob.indexOf("-") > 1){
                                var dob = data.dob
                                var yyyy = Number(dob.substr(0,4))
                                var mm = Number(dob.substr(5,2))
                                var dd = Number(dob.substr(8,2))
                                var d = new Date();
                                d.setFullYear(yyyy, mm, dd);
                                var ageDifMs = Date.now() - d.getTime();
                                var ageDate = new Date(ageDifMs); // miliseconds from epoch
                                var age = Math.abs(ageDate.getUTCFullYear() - 1970);
                                if(age < 18){
                                    return "Under 18"
                                }
                                if(age >= 18 && age < 25){
                                    return "Under 25"
                                } else {
                                    return "Over 25"
                                }
                                //} else
//                            {
//                                var dob = new Date(Number(data.dob)*1000);
//                                var ageDifMs = Date.now() - dob.getTime();
//                                var ageDate = new Date(ageDifMs); // miliseconds from epoch
//                                return Math.abs(ageDate.getUTCFullYear() - 1970);
//                            }
                            }, className: "centre get"
                        },
                        { "data": "mobile" , className: "centre get" },
                        { "data": "email" , className: "centre get" },
                        {
                            "data": function (data) {
                                if(data.nrswa == 'Yes'){
                                    return '<img src="/img/green-tick.png" height="20px">'
                                }
                                return ''//'<img src="/img/red_cross.png" height="20px">'
                            }, className: "centre get"
                        },
                        {
                            "data": function (data) {
                                if(data.driver_paper_work == 1){
                                    return '<img src="/img/green-tick.png" height="20px">'
                                }
                                return ''//'<img src="/img/red_cross.png" height="20px">'
                            }, className: "centre get"
                        },
                        {
                            "data": function (data) {
                                var name = []
                                <?php $events = \App\Models\Dropdowns\Tag::all(); ?>
                                        <?php foreach($events as $event){ ?>
                                        <?php foreach($event->users as $user){ ?>
                                if(data.id == '<?php echo $user->id ?>') {
                                    name.push('{{$event->name}}')
                                }
                                <?php } ?>
                                        <?php } ?>
                                if (jQuery.inArray( formData[0]['value'].toString(), name ) >= 0){
                                    //return name
                                    return '<img src="/img/green-tick.png" height="20px">'
                                }
                                return ''
                            }, className: "centre get"
                        },
                        {
                            "data": function (data) {
                                //if(data.postcode != ''){
//                                    postcodes.push(data.postcode)
                                //}
                                return data.postcode
                            }, className: "centre get", "visible": false
                        },
                        //{ "data": "postcode" , className: "centre get", "visible": true }
                    ]
                });
                //table.destroy();
            }).fail(function(xhr, status, error) {
                // error handling
                $('.loaderImage').hide();
                alert("Non valid postcode. Eg. CV1 8MD")
            });
        }
        var email_selected = [];
        var mobile_selected = [];

//        function deselect(table) {
//            var dataTable = $('#'+table).dataTable()
//            $(".user:input", dataTable.fnGetNodes()).each(function(){
//                $(this).prop("checked", !$(this).prop("checked"));
//            })
//        }


        function select(table) {
            var dataTable = $('#'+table).dataTable()
            $(".user:input", dataTable.fnGetNodes()).each(function(){
                //console.log($(this))
                $(this).prop('checked',true)
            })
        }
                function deselect(table) {
                    var dataTable = $('#'+table).dataTable()
                    $(".user:input:checked", dataTable.fnGetNodes()).each(function(){
                        //console.log($(this))
                        $(this).prop('checked',false)
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
                $("#free_input").append('<label>Mobile</label><input onpaste="pasted();" id="mobile_numbers" class="form-control" name="mobile_numbers">')
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
                var mobileArray = $("input[name=mobile_numbers]").val().replace(/\s/g, '').split(',')
                mobile_selected = mobileArray
                //console.log(mobile_selected)
            }


            if(mobile_selected.length >= 900){
                var mobile_selected_spliced = mobile_selected.splice(0,900);
                //console.log(mobile_selected)
                //console.log(mobile_selected_spliced)
                $.ajax({
                    type: "POST",
                    url: '/dashboard/manager/text',
                    data: {numbers: mobile_selected,
                        message: tinyMCE.get('textcomments').getContent({ format: 'text' })
                    }
                }).done(function(data) {
                    console.log(data)
                    $("#bal").append('<p>Text Local Credits:= ' + data.message + '</p>'
                    + '<p>posted numbers: ' + data.number_count + '</p>'
                    + '<p>imploded numbers: ' + data.message + '</p>')
                });
                $.ajax({
                    type: "POST",
                    url: '/dashboard/manager/text',
                    data: {numbers: mobile_selected_spliced,
                        message: tinyMCE.get('textcomments').getContent({ format: 'text' })
                    }
                }).done(function(data) {
                    console.log(data)
                    $("#bal").append('<p>Text Local Credits:= ' + data.message + '</p>'
                    + '<p>posted numbers: ' + data.number_count + '</p>'
                    + '<p>imploded numbers: ' + data.message + '</p>')
                });
                alert((mobile_selected.length+mobile_selected_spliced.length) + ' Texts been sent to ' + mobile_selected + mobile_selected_spliced);
                $('#textModal').modal('hide')
            } else{
                // Get the HTML contents of the currently active editor
                //console.debug(tinyMCE.activeEditor.getContent());
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
                    $("#bal").append('<p>Text Local Credits:= ' + data.message + '</p>'
                    + '<p>posted numbers: ' + data.number_count + '</p>'
                    + '<p>imploded numbers: ' + data.message + '</p>')
                });
                //location.reload();
                //$("#confirm_form").submit();
                alert(mobile_selected.length + ' Texts been sent to ' + mobile_selected);
                $('#textModal').modal('hide')
            }

        }

        function content() {

            // Get the HTML contents of the currently active editor
            //console.debug(tinyMCE.activeEditor.getContent());
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
            height : "480",
            plugins: "charactercount",
            //wordcount_cleanregex: /[0-9.(),;:!?%#$?\x27\x22_+=\\\/\-]*/g
            setup: function (editor) {
                editor.on('change', function(e) {
                    var count = this.plugins["charactercount"].getCount();
                    if (count > 5000)
                        $('#invalidContentHtml').show();
                    else
                        $('#invalidContentHtml').hide();
                });
            },
            init_instance_callback: function (editor) {
                $('.mce-tinymce').show('fast');
                $(editor.getContainer()).find(".mce-path").css("display", "none");
            }
        });


        tinymce.PluginManager.add('charactercount', function (editor) {
            var self = this;

            function update() {
                editor.theme.panel.find('#charactercount').text(['Characters: {0}', self.getCount()]);
            }

            editor.on('init', function () {
                var statusbar = editor.theme.panel && editor.theme.panel.find('#statusbar')[0];

                if (statusbar) {
                    window.setTimeout(function () {
                        statusbar.insert({
                            type: 'label',
                            name: 'charactercount',
                            text: ['Characters: {0}', self.getCount()],
                            classes: 'charactercount',
                            disabled: editor.settings.readonly
                        }, 0);

                        editor.on('setcontent beforeaddundo', update);

                        editor.on('keyup', function (e) {
                            update();
                        });
                    }, 0);
                }
            });

            self.getCount = function () {
                var tx = editor.getContent({ format: 'raw' });
                var decoded = decodeHtml(tx);
                var decodedStripped = decoded.replace(/(<([^>]+)>)/ig, "").trim();
                var tc = decodedStripped.length;
                return tc;
            };

            function decodeHtml(html) {
                var txt = document.createElement("textarea");
                txt.innerHTML = html;
                return txt.value;
            }
        });

        function pasted() {
            if($("#mobile_numbers").val()!=''){
                $("#mobile_numbers").val($("#mobile_numbers").val() + ',')
            }
        }
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
                            <p>Pay rate: Under 25's £7.05 (plus Holiday Entitlement) total Gross Pay £7.90. Over 25's £7.50 (plus Holiday Entitlement) total Gross Pay £8.41</p>
                            <p>Pay date: </p>
                            <p>Shifts: </p>
                            <p>Uniform: Black trousers, white shirt & sturdy black shoes</p>
                            <p>Transport: None provided (Please check that you can get there before calling to book shifts)</p>
                            <p>Camping:</p>
                            <p>Please call 01676 549001 for further details and to book shifts</p>
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
                    <form>
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

    <style>
        #map {
            width: 100%;
            height: 700px;
        }
    </style>

    <div class="modal fade" id="contact" role="dialog" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="back" >
                <div class="modal-header">
                    <h4>Contact<h4>
                </div>
                <div class="modal-body">
                    <div id="map"></div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        var locations = []
        var ev = []
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 54.5, lng: -3.644},
                zoom: 6
            });
            // Create an array of alphabetical characters used to label the markers.
            var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
            var infoWin = new google.maps.InfoWindow();
            var markers = locations.map(function(location, i) {
                var marker = new google.maps.Marker({
                    position: location,
                });
                google.maps.event.addListener(marker, 'click', function(evt) {
                        var info = '<p>Name: ' + staff[i]['name'] + '</p>'
                                    + '<p>Surname: ' + staff[i]['lastname'] + '</p>'
                                    + '<p>Email: ' + staff[i]['email'] + '</p>'
                                    + '<p>Mobile: ' + staff[i]['mobile'] + '</p>'
                        infoWin.setContent(info);
                        infoWin.open(map, marker);
                })
                return marker;
            });

            var event_marker = ev.map(function(location, i) {
                var marker = new google.maps.Marker({
                    position: location,
                    icon: image
                });
                google.maps.event.addListener(marker, 'click', function(evt) {
                    //infoWin.setContent(location.info);
                    infoWin.setContent($("#event_name").val());
                    infoWin.open(map, marker);
                })
                infoWin.setContent($("#event_name").val());
                infoWin.open(map, marker);
                return marker;
            });

            // Add a marker clusterer to manage the markers.
            var markerCluster = new MarkerClusterer(map, markers,
                    {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
            var event_markerCluster = new MarkerClusterer(map, event_marker,
                    {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
        }

        $('#contact').on('shown.bs.modal', function () {
            locations = []
            ev = []
            $.ajax({
                type: "POST",
                url: '/dashboard/manager/postcode',
                data: {postcodes: postcodes,
                        event: $("#postcode").val()}
            }).done(function(data) {
                //EVENT needs to go here
                //console.log(data.ev)
                $.each( data.ev, function( index, value ){
                    ev.push({'lat': + value['latitude'], 'lng': + value['longitude']})
                });
                $.each( data.data, function( index, value ){
                    locations.push({'lat': + value['latitude'], 'lng': + value['longitude']})
                });
            });
            setTimeout(function(){
                initMap()
                google.maps.event.trigger(map, "resize");
            }, 1000)



        });

    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCD7jKYXhgDTka8qlsPSqNcU2HV7DCwfUs"></script>
@endsection