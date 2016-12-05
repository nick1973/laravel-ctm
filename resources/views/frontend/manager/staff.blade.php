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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Land Line</th>
                        <th>DOB</th>
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
                dom: '<"top"Blf>rT<"bottom"p><"clear">',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        text: 'Copy Staff',
                        //className: 'btn-primary',
                        header: false,
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    },
                ],


                "columns": [
                    { "data": "name" , className: "centre get" },
                    { "data": "lastname" , className: "centre get" },
                    { "data": "email" , className: "centre get" },
                    { "data": "mobile" , className: "centre get" },
                    { "data": "land" , className: "centre" },
                    { "data": "dob" , className: "centre" },
                    { "data": "uk_driving_license" , className: "centre" }
//                    {
//                        "data": function (data) {
//                            return '<a href="/dashboard/sbf/' + data.id + '" class="btn btn-warning">SBF</a>';
//                        }
//                    }
                ]
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