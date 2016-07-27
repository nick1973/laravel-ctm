<div role="tabpanel" class="tab-pane" id="righttowork">


    <script>
        $( document ).ready(function() {
            $('#collapseExample').collapse({toggle: false});
            $('#collapseExample2').collapse({toggle: false});
            $('#collapseExample3').collapse({toggle: false});

            $('#collapseExample').on('show.bs.collapse', function () {
                $('#collapseExample2').collapse('hide');
                $('#collapseExample3').collapse('hide');
            });
            $('#collapseExample2').on('show.bs.collapse', function () {
                $('#collapseExample1').collapse('hide');
                $('#collapseExample').collapse('hide');
            });
            $('#collapseExample3').on('show.bs.collapse', function () {
                $('#collapseExample2').collapse('hide');
                $('#collapseExample').collapse('hide');
            })
        });
    </script>

    <div class="radio">
        <label>
            <input name="foo" type="radio" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            UK Citizen
        </label>
    </div>
    <div class="radio">
        <label>
            <input name="foo" type="radio" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
            European National
        </label>
    </div>
    <div class="radio">
        <label>
            <input name="foo" type="radio" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
            Non European National
        </label>
    </div>


    <div class="collapse" id="collapseExample">
        <div class="well">
            ...
        </div>
    </div>

    <div class="collapse" id="collapseExample2">
        <div class="well">
            222
        </div>
    </div>

    <div class="collapse" id="collapseExample3">
        <div class="well">
            33333
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>

    <table class="table table-striped table-hover table-bordered dashboard-table">
        @foreach($reference as $ref)
            <tr>
                <th>Character Referee Name</th>
                <td class="rightToWork">{{ $ref->ref_char_name }}</td>
            </tr>
            <tr>
                <th>How do you know your Character Referee?</th>
                <td class="rightToWork">{{ $ref->ref_char_how_know }}</td>
            </tr>
            <tr>
                <th>Character Referee Company</th>
                <td class="rightToWork">{{ $ref->ref_char_company }}</td>
            </tr>
            <tr>
                <th>Character Referee Phone Number</th>
                <td class="rightToWork">{{ $ref->ref_char_phone_number }}</td>
            </tr>

            <tr>
                <th>Number & Street</th>
                <td class="rightToWork">{{ $ref->ref_character_address_line_1 }}</td>
            </tr>
            <tr>
                <th>Area / Region</th>
                <td class="rightToWork">{{ $ref->ref_character_address_line_2 }}</td>
            </tr>
            <tr>
                <th>Town / City</th>
                <td class="rightToWork">{{ $ref->ref_character_city }}</td>
            </tr>
            <tr>
                <th>County</th>
                <td class="rightToWork">{{ $ref->ref_character_county }}</td>
            </tr>
            <tr>
                <th>Country</th>
                <td class="rightToWork">{{ $ref->ref_character_country }}</td>
            </tr>
            <tr>
                <th>Postcode</th>
                <td class="rightToWork">{{ $ref->ref_character_postcode }}</td>
            </tr>

            <tr>
                <th>{{ trans('labels.general.actions') }}</th>
                <td>
                    {{ link_to_route('frontend.user.profile.edit_character_reference', trans('labels.frontend.user.profile.edit_information'), [], ['class' => 'btn btn-primary btn-sm']) }}
                </td>
            </tr>
        @endforeach

    </table>


</div><!--tab panel address-->
<script>

    $( "td.rightToWork:empty" )
            .text( "Information Required!" )
            //.css( "background", "rgb(238,94,72)"
            .addClass('bg-danger');

    $("td.rightToWork.bg-danger").each(function(){
        if ($(this).hasClass('bg-danger')) {
            $("#righttowork_tick").addClass('hidden');
            console.log("has Class");
        }
    });

</script>