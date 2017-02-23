@extends('frontend.layouts.master')

@section('content')

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
                    <form class="form-inline">
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
                                <input type="text" class="form-control" id="postcode" placeholder="Postcode" name="postcode">
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
                                </select>
                            </div>
                    </div>
                        <div class="col-lg-12" style="padding-top: 15px">
                            <div class="form-group">
                                <label for="exampleInputEmail2">Limit to staff who have selected this event</label>
                                <label class="radio-inline">
                                    <input type="radio" name="staff_event" value="1"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="staff_event" value="0" checked> No
                                </label>
                            </div>
                            <div class="form-group" style="padding-left: 50px">
                                <label for="exampleInputEmail2">NRWSA Qualified</label>
                                <label class="radio-inline">
                                    <input type="radio" name="nrswa" value="Yes"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nrswa" value="No" checked> No
                                </label>
                            </div>
                            <div class="form-group" style="padding-left: 50px">
                                <label for="exampleInputEmail2">Driver</label>
                                <label class="radio-inline">
                                    <input type="radio" name="uk_driving_license" value="Yes"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="uk_driving_license" value="No" checked> No
                                </label>
                            </div>
                            <input class="form-control btn-primary" type="button" onclick="return submitForm(this.form)" value="Apply Filter">
                        </div>
                    </form>
                    <div class="col-md-12 col-lg-12" style="padding-top: 40px">
                            <table id="events" class="table table-striped table-hover table-bordered dashboard-table">
                                <thead>
                                    <tr>
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
        var table = $('#events').DataTable( { });
        table.destroy();
        var formData = $(form).serializeArray();
        var url = '/dashboard/manager/staff-search/approved'
        console.log(formData[1]['value'])
        $.post(url, formData).done(function (results) {
            console.log(results.data);

            var table = $('#events').DataTable( {
                //paging: false,
                //searching: false,
                data: results.data,
                "columns": [
                    { "data": "title" , className: "centre get" },
                    { "data": "name" , className: "centre get" },
                    { "data": "lastname" , className: "centre get" },
                    {
                        "data": function (data) {
                            if (data.dob.indexOf("-") > 1){
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
                            } else
                            {
                                var dob = new Date(Number(data.dob)*1000);
                                var ageDifMs = Date.now() - dob.getTime();
                                var ageDate = new Date(ageDifMs); // miliseconds from epoch
                                return Math.abs(ageDate.getUTCFullYear() - 1970);
                            }
                        }, className: "centre get"
                    },
                    {
                        "data": function (data) {
                            if(data.nrswa == "Yes"){
                                return '<img src="/img/green-tick.png" height="20px">'
                            }
                            return '<img src="/img/red_cross.png" height="20px">'
                        }, className: "centre get"
                    },
                    {
                        "data": function (data) {
                            if(data.driver_paper_work == "Yes"){
                                return '<img src="/img/green-tick.png" height="20px">'
                            }
                            return '<img src="/img/red_cross.png" height="20px">'
                        }, className: "centre get"
                    },
                    {
                        "data": function (data) {
                            if(data.driver_paper_work == "Yes"){
                                return '<img src="/img/green-tick.png" height="20px">'
                            }
                            return '<img src="/img/red_cross.png" height="20px">'
                        }, className: "centre get"
                    }
                    //{ "data": "nrswa" , className: "centre get" },
                    //{ "data": "lastname" , className: "centre get" }
//                    {
//                        "data": function (data) {
//                            return '<a href="/dashboard/sbf/' + data.id + '" class="btn btn-warning">SBF</a>';
//                        }
//                    }
                ]
            });
            //table.destroy();
        });
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
@endsection