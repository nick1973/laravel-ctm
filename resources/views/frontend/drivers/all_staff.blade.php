@extends('frontend.layouts.master')

@section('content')

    <a href="/dashboard/drivers" class="btn btn-success active">Driver Documents</a>
    <a href="/dashboard/drivers/staff/all" class="btn btn-primary">All Staff</a>
    <h2>All Approved Staff</h2>
    <div class="row">

        <div class="col-md-12 col-lg-12">
            {{--<h4>Add New Event <span style="vertical-align: middle"><i style="color: green" class="fa fa-plus-square fa-2x" aria-hidden="true"></i></span></h4>--}}
            <div class="table-responsive">
                <table id="staff_table" class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Payroll number</th>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>DOB</th>
                        <th>Driver Paperwork Complete</th>
                        <th>Date Expires (dd-mm-yyyy)</th>
                        <th>Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- col-md-10 -->

    </div><!-- row -->
    <script>

        $(document).ready( function () {
            var table = $('#staff_table').DataTable( {
                "ajax": "/dashboard/search/drivers/all",
                //dom: '<"top"Blf>rTi<"bottom"p><"clear">',
                dom: 'Bfrtip',
                buttons: [
                    'csv',
//                    { text: 'Save Form',
//                        action: function ( e, dt, node, config ) {
//                            $('#result').submit();
//                        }
//                    },
                    {
                        extend: 'copyHtml5',
                        text: 'Copy Staff',
                        //className: 'btn-primary',
                        header: false,
                        exportOptions: {
                            //columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13 ],
                            modifier: {
                                selected: true,
                                page: 'current'
                            }
                        }
                    },
                ],
                //18 columns /dashboard/manager/17
                "columns": [
                    { "data": "payroll" , className: "centre get" },
                    { "data": function (data) {
                        return '<a href="/dashboard/manager/'+data.id+'">'+data.name+'</a>'
                    }, className: "centre get" },
                    { "data": "lastname" , className: "centre get" },
                    { "data": function (data) {
                        var dob = data.dob
                        var yyyy = Number(dob.substr(0,4))
                        var mm = Number(dob.substr(5,2))
                        var dd = Number(dob.substr(8,2))
                        return dd + '-' + mm + '-' + yyyy
                    }, className: "centre get"
                    },
                    {
                        "data": function (data) {
                            if(data.driver_paper_work == 1){
                                return  '<form method="POST">' +
                                        '<input type="hidden" name="_method" value="PATCH">' +
                                        '<input name="id" type="text" value="'+data.id+'" hidden>' +
                                        '<input onclick="return submitForm(this.form)" name="driver_paper_work" type="checkbox" value="1" checked>' +
                                        '<input name="driver_paper_work" type="checkbox" value="0" hidden checked>' +
                                        //'<input onclick="return submitForm(this.form)" type="button" value="Save" >' +
                                        '</form>'
                            } else{
                                return  '<form method="POST">' +
                                        '<input type="hidden" name="_method" value="PATCH">' +
                                        '<input name="id" type="text" value="'+data.id+'" hidden>' +
                                        '<input name="driver_paper_work" type="checkbox" value="0" hidden checked>' +
                                        '<input onclick="return submitForm(this.form)" name="driver_paper_work" type="checkbox" value="1">' +
                                        //'<input onclick="return submitForm(this.form)" type="button" value="Save" >' +
                                        '</form>'
                            }
                        } , "visible": false
                    },
                    {
                        "data": function (data) {
                            return  '<form method="POST">' +
                                    '<input type="hidden" name="_method" value="PATCH">' +
                                    '<input name="id" type="text" value="'+data.id+'" hidden>' +
                                    '<input class="form-control" onchange="return submitForm(this.form)" onkeyup="return submitForm(this.form)" name="driver_dates" type="date" value="'+data.driver_dates+'">' +
                                    '</form>'
                        }, "visible": false
                    },
                    { "data": "updated_at" , className: "centre get" },
                ],
                //select: true
            } );
        } );

        function submitForm(form){
            var formData = $(form).serializeArray();
            //console.log($(form['name="id"']).val())
            var url = 'drivers/'+formData[1]['value']
            console.log(formData[1]['value'])
            //var url = form.attr("action");
            //var formData = $(form).serializeArray();
            $.post(url, formData).done(function (data) {
                console.log(formData);
            });
        }
        //        $.ajax({
        //            type: "POST",
        //            url: url,
        //            data: formData,
        //            success: success,
        //            //dataType: dataType
        //        });
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