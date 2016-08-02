<div role="tabpanel" class="tab-pane" id="documents">
    @foreach($reference as $ref)
    <table class="table table-striped table-hover table-bordered dashboard-table">
        <tr>
            <th>{{ trans('labels.general.actions') }}</th>
            <td>
                {{ link_to_route('frontend.user.profile.edit_documents', trans('labels.frontend.user.profile.edit_information'), [], ['class' => 'btn btn-primary btn-sm']) }}
            </td>
            <td>Preview</td>
        </tr>
        <tr>

            <th>Passport Photo Uploaded</th>
            @if($ref->passport_photo)
                <td class="docs"><img src="/img/green-tick.png" height="18px"></td>
                <td class="docs"><a target="_blank" href="/{{ $ref->passport_photo }}">Preview</a></td>
                @else
                <td class="docs bg-danger"><img src="/img/red_cross.png" height="18px"></td>
            @endif
        </tr>
        <tr>
            <th>Photo Page of Passport Uploaded</th>
            @if($ref->passport_photo_page)
                <td class="docs"><img src="/img/green-tick.png" height="18px"></td>
                <td class="docs"><a target="_blank" href="/{{ $ref->passport_photo_page }}">Preview</a></td>
            @else
                <td class="docs bg-danger"><img src="/img/red_cross.png" height="18px"></td>
            @endif
        </tr>
        <tr>
            <th>Birth Certificate</th>
            @if($ref->birth_cert)
                <td class="docs"><img src="/img/green-tick.png" height="18px"></td>
                <td class="docs"><a target="_blank" href="/{{ $ref->birth_cert }}">Preview</a></td>
            @else
                <td class="docs bg-danger"><img src="/img/red_cross.png" height="18px"></td>
            @endif
        </tr>
        <tr>
            <th>National Insurance Document / Card</th>
            @if($ref->ni_card)
                <td class="docs"><img src="/img/green-tick.png" height="18px"></td>
                <td class="docs"><a target="_blank" href="/{{ $ref->ni_card }}">Preview</a></td>
            @else
                <td class="docs bg-danger"><img src="/img/red_cross.png" height="18px"></td>
            @endif
        </tr>
    </table>
        @endforeach
</div><!--tab panel address-->
<script>

    $( "td.docs:empty" )
            .text( "Information Required!" )
            //.css( "background", "rgb(238,94,72)"
            .addClass('bg-danger');

    $("td.docs.bg-danger").each(function(){
        if ($(this).hasClass('bg-danger')) {
            $("#documents_tick").addClass('hidden');
            console.log("has Class");
        }
    });

</script>