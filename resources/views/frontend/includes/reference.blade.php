<div role="tabpanel" class="tab-pane" id="reference">

<h4>Please provide at least one reference.</h4>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <b>Employer Reference <span class="caret"></span></b>
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <h4>Employer Reference</h4>
                    @foreach($reference as $ref)
                        <table class="table table-striped table-hover table-bordered dashboard-table">
                                <tr>
                                    <th>{{ trans('labels.general.actions') }}</th>
                                    <td>
                                        {{ link_to_route('frontend.user.profile.edit_employer_reference', trans('labels.frontend.user.profile.edit_information'), [], ['class' => 'btn btn-primary btn-sm']) }}
                                    </td>
                                </tr>
                            <tr>
                                <th>Your Job Title</th>
                                <td class="reference">{{ $ref->ref_job_title }}</td>
                            </tr>
                            <tr>
                                <th>Employment From Date</th>
                                <?php  $year = substr($ref->ref_employed_from,0,4); $day = substr($user->dob,8,2); $month = substr($user->dob,5,2); ?>
                                <td class="required">{{ $day . '-' . $month . '-' . $year }}</td>
                            </tr>
                            <tr>
                                <th>Employment To Date</th>
                                <?php  $year = substr($ref->ref_employed_to,0,4); $day = substr($user->dob,8,2); $month = substr($user->dob,5,2); ?>
                                <td class="required">{{ $day . '-' . $month . '-' . $year }}</td>
                            </tr>
                            <tr>
                                <th>Employer Company Name</th>
                                <td class="reference">{{ $ref->ref_company_name }}</td>
                            </tr>
                            <tr>
                                <th>Employer Referee Contact</th>
                                <td class="reference">{{ $ref->ref_contact }}</td>
                            </tr>
                            <tr>
                                <th>Employer Phone Number</th>
                                <td class="reference">{{ $ref->ref_phone_number }}</td>
                            </tr>

                            <tr>
                                <th>Number & Street</th>
                                <td class="reference">{{ $ref->ref_employer_address_line_1 }}</td>
                            </tr>
                            <tr>
                                <th>Area / Region</th>
                                <td class="reference">{{ $ref->ref_employer_address_line_2 }}</td>
                            </tr>
                            <tr>
                                <th>Town / City</th>
                                <td class="reference">{{ $ref->ref_employer_city }}</td>
                            </tr>
                            <tr>
                                <th>County</th>
                                <td class="reference">{{ $ref->ref_employer_county }}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td class="reference">{{ $ref->ref_employer_country }}</td>
                            </tr>
                            <tr>
                                <th>Postcode</th>
                                <td class="reference">{{ $ref->ref_employer_county }}</td>
                            </tr>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <b>Character Reference <span class="caret"></span></b>
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <h4>Character Reference</h4>
                    <table class="table table-striped table-hover table-bordered dashboard-table">
                        @foreach($reference as $ref)
                            <tr>
                                <th>{{ trans('labels.general.actions') }}</th>
                                <td>
                                    {{ link_to_route('frontend.user.profile.edit_character_reference', trans('labels.frontend.user.profile.edit_information'), [], ['class' => 'btn btn-primary btn-sm']) }}
                                </td>
                            </tr>
                            <tr>
                                <th>Character Referee Name</th>
                                <td class="character_reference">{{ $ref->ref_char_name }}</td>
                            </tr>
                            <tr>
                                <th>How do you know your Character Referee?</th>
                                <td class="character_reference">{{ $ref->ref_char_how_know }}</td>
                            </tr>
                            <tr>
                                <th>Character Referee Company</th>
                                <td class="character_reference">{{ $ref->ref_char_company }}</td>
                            </tr>
                            <tr>
                                <th>Character Referee Phone Number</th>
                                <td class="character_reference">{{ $ref->ref_char_phone_number }}</td>
                            </tr>

                            <tr>
                                <th>Number & Street</th>
                                <td class="character_reference">{{ $ref->ref_character_address_line_1 }}</td>
                            </tr>
                            <tr>
                                <th>Area / Region</th>
                                <td class="character_reference">{{ $ref->ref_character_address_line_2 }}</td>
                            </tr>
                            <tr>
                                <th>Town / City</th>
                                <td class="character_reference">{{ $ref->ref_character_city }}</td>
                            </tr>
                            <tr>
                                <th>County</th>
                                <td class="character_reference">{{ $ref->ref_character_county }}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td class="character_reference">{{ $ref->ref_character_country }}</td>
                            </tr>
                            <tr>
                                <th>Postcode</th>
                                <td class="character_reference">{{ $ref->ref_character_postcode }}</td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!--tab panel address-->
<script>

    $( "td.reference:empty" )
            .text( "Information Required!" )
            //.css( "background", "rgb(238,94,72)"
            .addClass('bg-danger');

    $( "td.character_reference:empty" )
            .text( "Information Required!" )
            //.css( "background", "rgb(238,94,72)"
            .addClass('bg-danger');

    console.log($( "td.character_reference" ).hasClass('bg-danger'))

    if($( "td.character_reference" ).hasClass('bg-danger')){
        $("td.reference.bg-danger").each(function(){
            if ($(this).hasClass('bg-danger')) {
                $("#reference_tick").addClass('hidden');
            }
        });
    } else {
        $("td.character_reference.bg-danger").each(function(){
            if ($(this).hasClass('bg-danger')) {
                $("#reference_tick").addClass('hidden');
            }
        });
    }




        $('#collapseTwo').each(function () {
            if (!$("td.character_reference.bg-danger").hasClass('bg-danger')) {
                $("#collapseTwo").collapse('show');
            }
        });

        $('#collapseOne').each(function () {
            if (!$("td.reference.bg-danger").hasClass('bg-danger')) {
                $("#collapseOne").collapse('show');
                console.log($(this));
            }
        })

</script>