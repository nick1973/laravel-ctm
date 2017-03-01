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
                        <th></th>
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
                "createdRow": function ( row, data, index ) {
                    if ( data.app_status==8 ) {
                        $('td', row).addClass('red');
                    }
                },
                "ajax": "/dashboard/manager/staff/search/all",
                //dom: '<"top"Blf>rTi<"bottom"p><"clear">',
                dom: 'Bfrtip',
                buttons: [
                    'csv',
                    {
                        extend: 'copyHtml5',
                        text: 'Copy Staff',
                        //className: 'btn-primary',
                        header: false,
                        exportOptions: {
                            columns: [ 0,1,2,3,4,5,6,7,8,9,10,13 ],
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
                    { "data": function(data){
                        if(data.driver_paper_work==1){
                            return 'Yes'
                            }
                            return 'No'
                        }
                    },
                    { "data": "mobile" , className: "centre get" },
                    { "data": "email" , className: "centre get" },
                    { "data": function (data) {
                        if(data.rtw_docs==1){
                            return 'Yes'
                        }
                            return 'No'
                    } , className: "centre get" },
                    { "data": "medical_conditions" , className: "centre get",
                        "visible": false },
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
                    { "data": "notes",
                        "visible": false },
                    { "data": "postcode" , className: "centre get" },
                    { "data": "land" , className: "centre" },
                    { "data": "d1" , className: "centre",
                        "visible": false },
                    { "data": "uk_driving_license" , className: "centre",
                        "visible": false },
                    {
                        "data": function (data) {
                            if(data.notes == ''){
                                return '<button type="button" class="btn btn-primary" ' +
                                        'data-toggle="modal" data-target="#exampleModal" ' +
                                        'data-notes="'+data.notes+'" data-id="'+data.id+'"' +
                                        'data-name="'+data.name+ ' ' +data.lastname+'">Notes</button>';
                            }
                            return '<button type="button" class="btn btn-success" ' +
                                    'data-toggle="modal" data-target="#exampleModal" ' +
                                    'data-notes="'+data.notes+'" data-id="'+data.id+'"' +
                                    'data-name="'+data.name+ ' ' +data.lastname+'">Notes</button>';
                        }
                    }
                ],
                select: true
            });
//            $('#staff_table tbody').on('click', 'td:not(:last-child)', function () {
//                $(this).closest('tr').toggleClass('selected')
//            })

            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                //var notes //= button.data('notes') // Extract info from data-* attributes
                var name = button.data('name') // Extract info from data-* attributes
                var id = button.data('id') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                $.get("/dashboard/manager/notes/"+id, function(data, status){
                    var notes = data.notes
                    modal.find('.modal-body textarea').val(notes)
                    console.log(data.app_status)
                    if(data.app_status == 3){
                        modal.find('#not_suspended').prop('checked', true);
                    } else{
                        modal.find('#suspended').prop('checked', true);
                        //table.find('.selected').addClass('red');
                        //$('#staff_table .selected').addClass('red')
                    }
                });
                var modal = $(this)
                modal.find('.modal-title').text('Notes for ' + name)
                modal.find('#user_id').val(id)
            })
        });

        function saveNotes(){
            var formData = $('#notes').serializeArray();
            console.log(formData[2]['value'])
            var url = '/dashboard/manager/notes'
            $.post(url, formData).done(function (results) {
                $('#exampleModal').modal('hide')
            });
            if(formData[2]['value']==8){
                $('#staff_table .selected').addClass('red')
            } else{
                $('#staff_table .selected').removeClass('red')
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
         .red{
             color: red;
         }
    </style>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                </div>
                <div class="modal-body">
                    <form id="notes">
                        <div class="form-group">
                            <input id="user_id" name="id" hidden>
                            <label for="message-text" class="control-label">Notes:</label>
                            <textarea name="notes" class="form-control" id="message-text"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Suspended:</label>
                            <label class="radio-inline">
                                <input type="radio" name="app_status" id="not_suspended" value="3"> No
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="app_status" id="suspended" value="8"> Yes
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="return saveNotes()">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection