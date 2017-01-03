<div role="tabpanel" class="tab-pane" id="documents">
    @foreach($reference as $ref)
    <table class="table table-striped table-hover table-bordered dashboard-table">
        <tr>
            <th>{{ trans('labels.general.actions') }}</th>
            <td>
                {{ link_to_route('frontend.user.profile.edit_documents', 'Upload Documents', [], ['class' => 'btn btn-primary btn-sm']) }}
            </td>
            <td>Preview</td>
        </tr>
        @if($user->d1=="Yes")
            <tr>
                <th>D1 Driving License Photo Uploaded</th>
                @if($ref->d1_photo)
                    <td class="gp1"><img src="/img/green-tick.png" height="18px"></td>
                    <td class="gp1"><a target="_blank" href="{{ $ref->d1_photo }}">Preview</a></td>
                    @else
                    <td class="gp1 bg-danger"><img src="/img/red_cross.png" height="18px"></td>
                @endif
            </tr>
        @endif
        <tr>
            <th>Passport Photo Uploaded</th>
            @if($ref->passport_photo)
                <td class="gp1"><img src="/img/green-tick.png" height="18px"></td>
                <td class="gp1"><a target="_blank" href="{{ $ref->passport_photo }}">Preview</a></td>
                @else
                <td class="gp1 bg-danger"><img src="/img/red_cross.png" height="18px"></td>
            @endif
        </tr>
        <tr>
            <th>Photo Page of Passport Uploaded</th>
            @if($ref->passport_photo_page)
                <td class="gp1"><img src="/img/green-tick.png" height="18px"></td>
                <td class="gp1"><a target="_blank" href="{{ $ref->passport_photo_page }}">Preview</a></td>
            @else
                <td class="gp1 bg-danger"><img src="/img/red_cross.png" height="18px"></td>
            @endif
        </tr>
        <tr>
            <th>Birth Certificate</th>
            @if($ref->birth_cert)
                <td class="gp2"><img src="/img/green-tick.png" height="18px"></td>
                <td class="gp2"><a target="_blank" href="{{ $ref->birth_cert }}">Preview</a></td>
            @else
                <td class="gp2 bg-danger"><img src="/img/red_cross.png" height="18px"></td>
            @endif
        </tr>
        <tr>
            <th>National Insurance Document / Card</th>
            @if($ref->ni_card)
                <td class="gp2"><img src="/img/green-tick.png" height="18px"></td>
                <td class="gp2"><a target="_blank" href="{{ $ref->ni_card }}">Preview</a></td>
            @else
                <td class="gp2 bg-danger"><img src="/img/red_cross.png" height="18px"></td>
            @endif
        </tr>
    </table>
        @endforeach
</div><!--tab panel address-->
<script>

    $( "td.gp1:empty" )
            .text( "Information Required!" )
            .addClass('bg-danger');

    $("td.gp1.bg-danger").each(function(){
        if ($(this).hasClass('bg-danger')) {
            $("#gp1_tick").addClass('hidden');
            console.log("has Class");
        }
    });

    $( "td.gp2:empty" )
            .text( "Information Required!" )
            .addClass('bg-danger');

    $("td.gp2.bg-danger").each(function(){
        if ($(this).hasClass('bg-danger')) {
            $("#gp1_tick").addClass('hidden');
            console.log("has Class");
        }
    });

</script>