<div role="tabpanel" class="tab-pane" id="reference">
    <div>
        {{--{{ $user->reference_dirty }}--}}
    </div>
<h4>Please provide at least one reference.</h4>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <b>Employer Reference</b>
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <h4>Employer Reference</h4>
                    @foreach($reference as $ref)

                        <table class="table table-striped table-hover table-bordered dashboard-table">
                            <tr>
                                <th>Your Job Title</th>
                                @if(strpos($user->reference_dirty, 'ref_job_title'))
                                    <td class="bg-success reference">{{ $ref->ref_job_title }}</td>
                                @else
                                    <td class="reference">{{ $ref->ref_job_title }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Employment From Date</th>
                                @if(strpos($user->reference_dirty, 'ref_employed_from'))
                                    <td class="bg-success reference">{{ $ref->ref_employed_from }}</td>
                                @else
                                    <td class="reference">{{ $ref->ref_employed_from }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Employment To Date</th>
                                @if(strpos($user->reference_dirty, 'ref_employed_to'))
                                    <td class="bg-success reference">{{ $ref->ref_employed_to }}</td>
                                @else
                                    <td class="reference">{{ $ref->ref_employed_to }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Employer Company Name</th>
                                @if(strpos($user->reference_dirty, 'ref_company_name'))
                                    <td class="bg-success reference">{{ $ref->ref_company_name }}</td>
                                @else
                                    <td class="reference">{{ $ref->ref_company_name }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Employer Referee Contact</th>
                                @if(strpos($user->reference_dirty, 'ref_contact'))
                                    <td class="bg-success reference">{{ $ref->ref_contact }}</td>
                                @else
                                    <td class="reference">{{ $ref->ref_contact }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Employer Phone Number</th>
                                @if(strpos($user->reference_dirty, 'ref_phone_number'))
                                    <td class="bg-success reference">{{ $ref->ref_phone_number }}</td>
                                @else
                                    <td class="reference">{{ $ref->ref_phone_number }}</td>
                                @endif
                            </tr>

                            <tr>
                                <th>Number & Street</th>
                                @if(strpos($user->reference_dirty, 'ref_employer_address_line_1'))
                                    <td class="bg-success reference">{{ $ref->ref_employer_address_line_1 }}</td>
                                @else
                                    <td class="reference">{{ $ref->ref_employer_address_line_1 }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Area / Region</th>
                                @if(strpos($user->reference_dirty, 'ref_employer_address_line_2'))
                                    <td class="bg-success reference">{{ $ref->ref_employer_address_line_2 }}</td>
                                @else
                                    <td class="reference">{{ $ref->ref_employer_address_line_2 }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Town / City</th>
                                @if(strpos($user->reference_dirty, 'ref_employer_city'))
                                    <td class="bg-success reference">{{ $ref->ref_employer_city }}</td>
                                @else
                                    <td class="reference">{{ $ref->ref_employer_city }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>County</th>
                                @if(strpos($user->reference_dirty, 'ref_employer_county'))
                                    <td class="bg-success reference">{{ $ref->ref_employer_county }}</td>
                                @else
                                    <td class="reference">{{ $ref->ref_employer_county }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Country</th>
                                @if(strpos($user->reference_dirty, 'ref_employer_country'))
                                    <td class="bg-success reference">{{ $ref->ref_employer_country }}</td>
                                @else
                                    <td class="reference">{{ $ref->ref_employer_country }}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Postcode</th>
                                @if(strpos($user->reference_dirty, 'ref_employer_postcode'))
                                    <td class="bg-success reference">{{ $ref->ref_employer_postcode }}</td>
                                @else
                                    <td class="reference">{{ $ref->ref_employer_postcode }}</td>
                                @endif
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
                        <b>Character Reference</b>
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <h4>Character Reference</h4>
                    <table class="table table-striped table-hover table-bordered dashboard-table">
                        @foreach($reference as $ref)
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

    $("td.reference.bg-danger").each(function(){
        if ($(this).hasClass('bg-danger')) {
            $("#reference_tick").addClass('hidden');
        }

    });

    $("td.character_reference.bg-danger").each(function(){
        if ($(this).hasClass('bg-danger')) {
            $("#character_reference_tick").addClass('hidden');
        }
    });

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