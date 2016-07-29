<div role="tabpanel" class="tab-pane" id="documents">
    <table class="table table-striped table-hover table-bordered dashboard-table">
        <tr>
            <th>{{ trans('labels.general.actions') }}</th>
            <td>
                {{ link_to_route('frontend.user.profile.edit_documents', trans('labels.frontend.user.profile.edit_information'), [], ['class' => 'btn btn-primary btn-sm']) }}
            </td>
        </tr>
        <tr>
            <th>Passport Photo Uploaded</th>
            @if($user->passport_photo)
                <td class="docs"><img src="/img/green-tick.png" height="18px"></td>
                @else
                <td class="docs"><img src="/img/red_cross.png" height="18px"></td>
            @endif
        </tr>
        <tr>
            <th>Photo Page of Passport Uploaded</th>
            @if($user->passport_photo_page)
                <td class="docs"><img src="/img/green-tick.png" height="18px"></td>
            @else
                <td class="docs"><img src="/img/red_cross.png" height="18px"></td>
            @endif
        </tr>
        <tr>
            <th>Birth Certificate</th>
            @if($user->birth_cert)
                <td class="docs"><img src="/img/green-tick.png" height="18px"></td>
            @else
                <td class="docs"><img src="/img/red_cross.png" height="18px"></td>
            @endif
        </tr>
        <tr>
            <th>National Insurance Document / Card</th>
            @if($user->ni_card)
                <td class="docs"><img src="/img/green-tick.png" height="18px"></td>
            @else
                <td class="docs"><img src="/img/red_cross.png" height="18px"></td>
            @endif
        </tr>
    </table>
</div><!--tab panel address-->
<script>

    $( "td.address:empty" )
            .text( "Information Required!" )
            //.css( "background", "rgb(238,94,72)"
            .addClass('bg-danger');

    $("td.address.bg-danger").each(function(){
        if ($(this).hasClass('bg-danger')) {
            $("#address_tick").addClass('hidden');
            console.log("has Class");
        }
    });

</script>