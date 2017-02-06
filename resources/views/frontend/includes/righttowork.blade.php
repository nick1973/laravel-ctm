<div role="tabpanel" class="tab-pane" id="righttowork">


    <script>
        function visible(button, id) {
            if ($("#" + button).prop('checked') == true) {
                $("#" + button).attr({
                    "data-toggle": 'collapse',
                    "data-target": '#' + id,
                    "data-target": '#' + id,
                    "aria-expanded": 'false',
                    "aria-controls": '#' + id
                });
                $("#" + id).removeClass('fadeOut').addClass('fadeIn').delay("slow");
            }
            else if ($("#" + button).prop('checked') == false) {
                $("#" + id).removeClass('fadeIn').addClass('fadeOut').delay("slow");
            }
        }
    </script>
    @foreach($rt_work as $ref)
    <div class="col-md-6">
        @if($ref->work_status=='UK Citizen')
            <script>
                $("#righttowork_tick").removeClass('hidden');
                console.log("has Class");
            </script>
            <br/>
            <div id="collapseExample">
                <div class="well">
                    <h4>UK Citizen</h4>
                    <p>As you are a UK Citizen you automatically have the right to work in the UK, but you must supply one of the following:</p>
                    <ul>
                        <li>(a)	The photo page of your Passport.; or</li>
                        <li>(b)	Your birth certificate along with proof of your National Insurance number. You can find this on any document/correspondence from the HMRC or the DWP, your NI Card or a previous payslip.</li>
                    </ul>
                    <p>You will be required to upload these documents at the end of the application process.</p>
                </div>
            </div>
        @elseif($ref->work_status=='European National')
                <script>
                    $("#righttowork_tick").removeClass('hidden');
                    console.log("has Class");
                </script>
            <br/>
            <div id="collapseExample2">
                <div class="well">
                    <h4>European National</h4>

                    <p>As you are a European National, you automatically have the right to work in the UK, but you must supply one of the following:</p>
                        <li>(a)	The photo page of your valid Passport;</li>
                        <li>(b)	Your valid ID card or equivalent.</li>
                    <br/>
                    <p>You will be required to upload these documents at the end of the application process.</p>
                </div>
            </div>
        @elseif($ref->work_status=='Non European National')
                <script>
                    $("#righttowork_tick").removeClass('hidden');
                    console.log("has Class");
                </script>
            <br/>
            <div id="collapseExample3">
                <div class="well">
                    <h4>Non European National</h4>

                    <p>As you are a Non-European National, you will be required to prove that you have the right to work in the UK. To prove this you can use either option (a) or (b) below: -</p>
                        <li>(a)	The photo page of your valid Passport along with a valid Visa.</li>
                        <li>(b)	Valid Work Permit or Residency Document.</li>
                    <br/>
                    <p>Please note, if you currently hold a Student Visa and wish to use this as proof of your right to work in the UK, then you will also need to send us a letter from your University confirming your course dates.</p>
                </div>
            </div>
            @else
            <h4>Do you have the right to work in the UK?</h4>
        @endif
        <br/>
        {{ link_to_route('frontend.user.profile.edit_righttowork', trans('labels.frontend.user.profile.edit_information'), [], ['class' => 'btn btn-primary btn-sm']) }}
    </div>
{{--COL TWO--}}
    <div class="col-md-6 form-group">
        <br/>
        @if($ref->student == 'Yes')
            <label for="inputEmail3" class="col-sm-4 col-lg-4 col-md-4 control-label">
                You have declared you are a student
            </label>
        @endif
        <br/>
        <br/>

        <div id="ru_student" class="col-lg-12 <?php if($ref->student!='Yes') echo 'collapse' ?> animated fadeIn">
            <table class="table table-striped table-hover table-bordered dashboard-table">

                    <tr>
                        <th>Teaching Establishment Name</th>
                        <td class="rightToWork">{{ $ref->teaching_establishment }}</td>
                    </tr>
                    <tr>
                        <th>Autumn Term Starts</th>
                        <td class="rightToWork">{{ $ref->autumn_term_starts }}</td>
                    </tr>
                    <tr>
                        <th>Autumn Term Ends</th>
                        <td class="rightToWork">{{ $ref->autumn_term_ends }}</td>
                    </tr>
                    <tr>
                        <th>Spring Term Starts</th>
                        <td class="rightToWork">{{ $ref->spring_term_starts }}</td>
                    </tr>

                    <tr>
                        <th>Spring Term Ends</th>
                        <td class="rightToWork">{{ $ref->spring_term_ends }}</td>
                    </tr>
                    <tr>
                        <th>Summer Term Starts</th>
                        <td class="rightToWork">{{ $ref->summer_term_starts }}</td>
                    </tr>
                    <tr>
                        <th>Summer Term Ends</th>
                        <td class="rightToWork">{{ $ref->summer_term_ends }}</td>
                    </tr>

                    <tr>
                        <th>{{ trans('labels.general.actions') }}</th>
                        <td>
                            {{ link_to_route('frontend.user.profile.edit_righttowork', trans('labels.frontend.user.profile.edit_information'), [], ['class' => 'btn btn-primary btn-sm']) }}
                        </td>
                    </tr>
            </table>
        </div>
    </div>
</div><!--tab panel address-->
@endforeach
<script>

    $( "td.rightToWork:empty" )
            .text( "Information Required!" )
            //.css( "background", "rgb(238,94,72)"
            .addClass('bg-danger');

        var stu = $("#student").html()
    //console.log("student " +stu);
        if(stu=="Yes"){
            $("td.rightToWork.bg-danger").each(function(){
                if ($(this).hasClass('bg-danger')) {
                    $("#righttowork_tick").addClass('hidden');
                    //console.log("has Class");
                }
            });
        }


</script>