<div role="tabpanel" class="tab-pane" id="documents">
    @foreach($reference as $ref)
    @foreach($rt_work as $rtw)
    <table class="table table-striped table-hover table-bordered dashboard-table">
        
        @if($user->d1=="Yes")
            <tr>
                <th>D1 Driving License Photo Uploaded</th>
                @if($ref->d1_photo)
                    <td class="gp1"><img src="/img/green-tick.png" height="18px"></td>
                    <td class="gp1"><a target="_blank" href="/volume-1/{{ $ref->d1_photo }}">Preview</a></td>
                    @else
                    <td class="gp1 bg-danger"><img src="/img/red_cross.png" height="18px"></td>
                @endif
            </tr>
        @endif
        <tr>
            <th>Passport Photo Uploaded</th>
            @if($ref->passport_photo)
                <?php $photo =  substr($ref->passport_photo,14); ?>
                <td class="gp1"><img src="/img/green-tick.png" height="18px"></td>
                <td class="gp1"><a target="_blank" href="/volume-1/{{ $photo }}">Preview</a></td>
                @else
                <td class="gp1 bg-danger"><img src="/img/red_cross.png" height="18px"></td>
            @endif
        </tr>
        <tr>
            <th>Photo Page of Passport Uploaded</th>
            @if($ref->passport_photo_page)
                <td class="gp1"><img src="/img/green-tick.png" height="18px"></td>
                <td class="gp1"><a target="_blank" href="/volume-1/{{ $ref->passport_photo_page }}">Preview</a></td>
            @else
                <td class="gp1 bg-danger"><img src="/img/red_cross.png" height="18px"></td>
            @endif
        </tr>
        @if($rtw->work_status=='UK Citizen')
        <tr>
            <th>Birth Certificate</th>
            @if($ref->birth_cert)
                <td class="gp2"><img src="/img/green-tick.png" height="18px"></td>
                <td class="gp2"><a target="_blank" href="/volume-1/{{ $ref->birth_cert }}">Preview</a></td>
            @else
                <td class="gp2 bg-danger"><img src="/img/red_cross.png" height="18px"></td>
            @endif
        </tr>
        @endif
        <tr>
            @if($rtw->work_status=='Non European National')
                <th>Work Permit</th>
            @elseif($rtw->work_status=='UK Citizen')
                <th>National Insurance Document / Card</th>
            @elseif($rtw->work_status=='European National')
                <th>ID Card</th>
            @endif
                @if($ref->ni_card)
                    <td class="gp2"><img src="/img/green-tick.png" height="18px"></td>
                    <td class="gp2"><a target="_blank" href="/volume-1/{{ $ref->ni_card }}">Preview</a></td>
                @else
                    <td class="gp2 bg-danger"><img src="/img/red_cross.png" height="18px"></td>
                @endif
        </tr>
    </table>
        @endforeach
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