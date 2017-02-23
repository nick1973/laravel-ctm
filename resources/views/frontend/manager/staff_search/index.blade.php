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
                            <input type="button" onclick="return submitForm(this.form)" value="">
                        </div>
                    </form>
                    <div class="col-md-12 col-lg-12" style="padding-top: 40px">
                            <table id="events" class="table table-striped table-hover table-bordered dashboard-table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                    </tr>
                                </thead>
                                <tr>
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
        var formData = $(form).serializeArray();
        var url = '/dashboard/manager/staff-search/approved'
        console.log(formData[1]['value'])
        $.post(url, formData).done(function (results) {
            console.log(results.data);
            var table = $('#events').DataTable( {
                data: results.data,
                "columns": [
                    { "data": "title" , className: "centre get" },
                    { "data": "name" , className: "centre get" },
                    { "data": "lastname" , className: "centre get" },
//                    {
//                        "data": function (data) {
//                            return '<a href="/dashboard/sbf/' + data.id + '" class="btn btn-warning">SBF</a>';
//                        }
//                    }
                ]
            } );
        });
    }
</script>

@endsection