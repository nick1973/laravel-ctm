<div role="tabpanel" class="tab-pane" id="documents">
    @foreach($reference as $ref)
        @foreach($rt_work as $rtw)
            <table class="table table-striped table-hover table-bordered dashboard-table">
                <tr>
                    <th>{{ trans('labels.general.actions') }}</th>
                    <td>
                        {{ link_to_route('frontend.user.profile.edit_documents', 'Upload All Documents', [], ['class' => 'btn btn-primary btn-sm']) }}
                    </td>
                    <td>Preview</td>
                </tr>
                @if($user->d1=="Yes")
                    <tr>
                        <th>D1 Driving License Photo Uploaded</th>
                        @if($ref->d1_photo)
                            <td class="gp1"><img src="/img/green-tick.png" height="18px"></td>
                            <td class="gp1"><a target="_blank" href="/volume-1/{{ $ref->d1_photo }}">Preview</a></td>
                        @else
                            {{--<td class="gp1 bg-danger"><img src="/img/red_cross.png" height="18px"></td>--}}
                            <td class="gp1 bg-danger">Awaiting Upload</td>
                        @endif
                    </tr>
                @endif
                @if($rtw->work_status=='UK Citizen')
                    <tr class="gp4 gp3">
                        <th colspan="3" style="text-align: center; font-size: 16px"><b>Please provide Passport Photo and documents from either group A or B.</b></th>
                    </tr>
                @endif
                <tr>
                    <th>Passport Photo Uploaded</th>
                    @if($ref->passport_photo)
                        <?php $photo =  substr($ref->passport_photo,14); ?>
                        <td class="gp1"><img src="/img/green-tick.png" height="18px"></td>
                        <td class="gp1"><a target="_blank" href="/volume-1/{{ $photo }}">Preview</a></td>
                    @else
                        {{--<td class="gp1 bg-danger"><img src="/img/red_cross.png" height="18px"></td>--}}
                        <td class="gp1 bg-danger">Awaiting Upload</td>
                    @endif
                </tr>
                @if($rtw->work_status=='UK Citizen')
                    <tr class="gp4 gp3">
                        <th colspan="3" style="text-align: center; font-size: 16px"><b>Group A</b></th>
                    </tr>
                @endif
                @if($rtw->work_status=='UK Citizen')
                    <tr class="gp3">
                @else
                    <tr>
                        @endif
                        <th>Photo Page of Passport Uploaded</th>
                        @if($ref->passport_photo_page)
                            <td class="gp1 passport_page"><img src="/img/green-tick.png" height="18px"></td>
                            <td class="gp1 passport_page"><a target="_blank" href="/volume-1/{{ $ref->passport_photo_page }}">Preview</a></td>
                        @else
                            {{--<td class="gp1 bg-danger"><img src="/img/red_cross.png" height="18px"></td>--}}
                            <td class="gp1 bg-danger">Awaiting Upload</td>
                        @endif
                    </tr>
                    @if($rtw->work_status=='UK Citizen')
                        <tr class="gp4 gp3">
                            <th colspan="3" style="text-align: center; font-size: 16px"><b>Group B</b></th>
                        </tr>
                        <tr class="gp4">
                            <th>Birth Certificate</th>
                            @if($ref->birth_cert)
                                <td class="gp2 birth_ni_page"><img src="/img/green-tick.png" height="18px"></td>
                                <td class="gp2 birth_ni_page"><a target="_blank" href="/volume-1/{{ $ref->birth_cert }}">Preview</a></td>
                            @else
                                {{--<td class="gp2 bg-danger"><img src="/img/red_cross.png" height="18px"></td>--}}
                                <td class="gp2 bg-danger">Awaiting Upload</td>
                            @endif
                        </tr>
                    @endif
                    <tr>
                        @if($rtw->work_status=='Non European National')
                            <th>Work Permit</th>
                        @elseif($rtw->work_status=='UK Citizen')
                            <th class="gp4">National Insurance Document / Card</th>
                        @elseif($rtw->work_status=='European National')
                            <th>ID Card</th>
                        @endif
                        @if($ref->ni_card)
                            <td class="gp2 birth_ni_page"><img src="/img/green-tick.png" height="18px"></td>
                            <td class="gp2 birth_ni_page"><a target="_blank" href="/volume-1/{{ $ref->ni_card }}">Preview</a></td>
                        @else
                            {{--<td class="gp2 bg-danger"><img src="/img/red_cross.png" height="18px"></td>--}}
                            @if($rtw->work_status!=='UK Citizen')
                                <td class="gp2 bg-danger">Awaiting Upload</td>
                            @else
                                <td class="gp2 gp99 bg-danger">Awaiting Upload</td>
                            @endif
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
            $("#gp2_tick").addClass('hidden');
            console.log("has Class");
        }
    });

    $("td.gp1").each(function(){
        if ($(this).hasClass('passport_page')) {
            //$(".gp4").remove();
            //$(".gp99").remove();
            $("#gp2_tick").addClass('hidden');
            console.log("passport_page");
        }
    });
    $("td.gp2").each(function(){
        if ($(this).hasClass('birth_ni_page')) {
            //$(".gp3").remove();
            console.log("passport_page");
        }
    });

</script>