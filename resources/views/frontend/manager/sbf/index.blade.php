@extends('frontend.layouts.master')

@section('content')

<p>add staff</p>

<div class="row">

    <div class="col-md-12 col-lg-12">
        {{--<h4>Add New Event <span style="vertical-align: middle"><i style="color: green" class="fa fa-plus-square fa-2x" aria-hidden="true"></i></span></h4>--}}
        <div class="table-responsive">
            <table id="events" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>Event</th>
                    <th>Contract Manager</th>
                    <th>Operation Manager</th>
                    <th>CTM Start Date</th>
                    <th>CTM End Date</th>
                    <th>Event Start Date</th>
                    <th>Event End Date</th>

                    {{--<th>Edit</th>--}}
                    <th>SBF</th>
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
                </tr>
                </tbody>
            </table>
        </div>
    </div>


</div><!-- col-md-10 -->

</div><!-- row -->

<script>

    $(document).ready( function () {
        var table = $('#events').DataTable( {

            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                );
                                column
                                        .search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                            });
                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            },

            "ajax": "/events",
            //"paging": false,
            //dom: 'Bfrip',
            dom: '<"top"Blf>rT<"bottom"p><"clear">',
            buttons: [
                'copy', 'csv', 'excel', 'pdf'
            ],
            "columns": [
                { "data": "event_name" , className: "centre" },
                { "data": "contract_manager" , className: "centre" },
                { "data": "operation_manager" , className: "centre" },
                { "data": "ctm_start_date" , className: "centre" },
                { "data": "ctm_end_date" , className: "centre" },
                { "data": "event_start_date" , className: "centre" },
                { "data": "event_end_date" , className: "centre" },
                {
                    "data": function (data) {
                        return '<a href="/dashboard/sbf/' + data.id + '" class="btn btn-warning">SBF</a>';
                    }
                }

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