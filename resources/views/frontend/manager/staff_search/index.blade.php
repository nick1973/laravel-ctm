@extends('frontend.layouts.master')

@section('content')
    <?php $id = ''; ?>
    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Approved</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">None Approved</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <div class="row">
                    <form id="filers" class="form-inline">
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
                                <select class="form-control" name="radius">
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
                                    <input type="radio" name="staff_event" value="1" disabled> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="staff_event" value="0" checked disabled> No
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
                            <input class="form-control btn-primary" type="button" onclick="return submitForm(this.form)" value="Apply Filter">
                            <img style="display: none" class="loaderImage" src="/ajax-loader.gif">
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
                                        <th>Age</th>
                                        <th>NRSWA</th>
                                        <th>Driver</th>
                                        <th>Chosen Event</th>
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
                                </tr>
                            </table>
                    </div>
                </div><!-- row -->
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">...</div>
        </div>
    </div>

<script>
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

    function submitForm(form){
        var table = $('#events').DataTable();
        if (table instanceof $.fn.dataTable.Api) {
            table.destroy();
        } else {
            // not a datatable... do other stuff
        }
        var formData = $('#filers').serializeArray();
        var url = '/dashboard/manager/staff-search/approved'
        //console.log(formData[1]['value'])
        console.log(formData[0]['value'])
        $('.loaderImage').show();
        $.post(url, formData).done(function (results) {
            $('.loaderImage').hide();
            console.log(results.data);
            setTimeout(self.timeoutHandler, 750);

            var table = $('#events').DataTable( {
                "sPaginationType": "full_numbers",
                "bPaginate": true,
                "bLengthChange": true,
                "bFilter": true,
                "bSort": false,
                "bInfo": true,
                "bAutoWidth": false,
                "bProcessing": true,
                data: results.data,
                dom: 'Bflrtip',
                buttons: [
                    //'csv',
                    {
                        text: 'Email Staff',
                        action: function ( e, dt, node, config ) {
                                send_user('email')
                        }
                    },
                    {
                        text: 'Text Staff',
                        action: function ( e, dt, node, config ) {
                            send_user('text')
                        }
                    }
                ],
                "columns": [
                    {
                        "data": function (data) {
                                return '<input class="user" type="checkbox" name="'+data.email+'" checked>'
                        }, className: "centre get"
                    },
                    { "data": "email" , className: "centre get", "visible": false },
                    { "data": "title" , className: "centre get" },
                    { "data": "name" , className: "centre get" },
                    { "data": "lastname" , className: "centre get" },
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

                            <?php $events = \App\Models\Dropdowns\Tag::all(); ?>
                                    <?php foreach($events as $event){ ?>

                                <?php foreach($event->users as $user){ ?>

                            if(data.id == '<?php echo $user->id ?>') {
                                if (formData[0]['value'].toString() == '<?php echo $event->name ?>') {
                                    return '<img src="/img/green-tick.png" height="20px">'
                                }
                                return ''
                            }
                                <?php } ?>

                            <?php } ?>
                                    return ''
                        }, className: "centre get"
                    }
                ]
            });
            //table.destroy();
        }).fail(function(xhr, status, error) {
                    // error handling
            $('.loaderImage').hide();
                alert("Non valid postcode. Eg. CV1 8MD")
                });
    }

    function send_user(message){
        var selected = [];
        $('.user:input:checked').each(function() {
            selected.push($(this).attr('name'));
        });
        console.log(selected)
        if(message=='email'){
            $('#emailModal').modal('show')
        } else{
            $('#textModal').modal('show')
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Email</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <p>send emails via post</p>
                        <input type="button" value="send">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="textModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Text</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <p>send emails via post</p>
                        <input type="button" value="send">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection