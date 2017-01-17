@extends('frontend.layouts.master')

@section('content')

    {{--<p>add staff</p>--}}

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
                        <th>Driver paperwork complete</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>RTW</th>
                        <th>Medical notes</th>
                        <th>Age</th>
                        <th>Emergency contact name</th>
                        <th>Emergency contact relationship</th>
                        <th>Emergency contact number</th>
                        <th>Emergency contact mobile</th>
                        <th>Notes</th>
                        <th>Postcode</th>
                        <th>Land Line</th>
                        <th>D1</th>
                        <th>UK Driving License</th>
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
                    </tbody>
                </table>
            </div>
        </div>



    </div><!-- col-md-10 -->

    </div><!-- row -->
    <script>

        $(document).ready( function () {
            var table = $('#staff_table').DataTable( {
                "ajax": "/dashboard/manager/staff/search/all",
                //dom: '<"top"Blf>rTi<"bottom"p><"clear">',
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        text: 'Copy Staff',
                        //className: 'btn-primary',
                        header: false,
                        exportOptions: {
                            columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13 ],
                            modifier: {
                                selected: true,
                                page: 'current'
                            }
                        }
                    },
                ],
                    //18 columns
                "columns": [
                    { "data": "payroll" , className: "centre get",
                        "visible": false },
                    { "data": "name" , className: "centre get" },
                    { "data": "lastname" , className: "centre get" },
                    { "defaultContent": "",
                        "visible": false },
                    { "data": "mobile" , className: "centre get" },
                    { "data": "email" , className: "centre get" },
                    { "data": "profile_confirmed" , className: "centre get" },
                    { "data": "medical_conditions_info" , className: "centre get",
                        "visible": false },
                    {
                        "data": function (data) {
                            if (data.dob.indexOf("-") > 1){
                                return data.dob;
                            } else
                            {
                                var dob = new Date(Number(data.dob)*1000);
                                var day = dob.getDay();
                                var month = dob.getMonth()+1;
                                var year = dob.getFullYear();
                                if(day<10) {
                                    day='0'+day
                                }
                                if(month<10) {
                                    month='0'+month
                                }
                                //return day + '-' + month + '-' + year;

                                var today = new Date();
                                var dd = today.getDate();
                                var mm = today.getMonth()+1; //January is 0!
                                var yyyy = today.getFullYear();
                                if(dd<10) {
                                    dd='0'+dd
                                }
                                if(mm<10) {
                                    mm='0'+mm
                                }
                                //return dd+'-'+mm+'-'+yyyy;
                                var foo = + new Date();
                                var difference = foo - Number(data.dob);
                                //return difference + ' ' + foo + ' ' + data.dob
                                var t = new Date(difference);
                                //return t.getMinutes()*60*60 + ' days';


                                    var ageDifMs = Date.now() - data.dob.getTime();
                                    var ageDate = new Date(ageDifMs); // miliseconds from epoch
                                    return Math.abs(ageDate.getUTCFullYear() - 1970);




                            }
                        }
                    },
                    //{ "data": "dob" , className: "centre get" },
                    { "data": "emergency_contact_name" , className: "centre get",
                        "visible": false },
                    { "data": "emergency_contact_rel" , className: "centre get",
                        "visible": false },
                    { "data": "emergency_contact_number" , className: "centre get",
                        "visible": false },
                    { "data": "emergency_contact_mobile" , className: "centre get",
                        "visible": false },
                    { "defaultContent": "",
                        "visible": false },
                    { "data": "postcode" , className: "centre get" },
                    { "data": "land" , className: "centre" },
                    { "data": "d1" , className: "centre",
                        "visible": false },
                    { "data": "uk_driving_license" , className: "centre",
                        "visible": false }
//                    {
//                        "data": function (data) {
//                            return '<a href="/dashboard/sbf/' + data.id + '" class="btn btn-warning">SBF</a>';
//                        }
//                    }
                ],
                select: true
            } );
        } );




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