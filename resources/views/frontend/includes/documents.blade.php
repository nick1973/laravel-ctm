<div role="tabpanel" class="tab-pane" id="documents">
    @foreach($reference as $ref)
        @foreach($rt_work as $rtw)
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
                            <td class=""><img src="/img/green-tick.png" height="18px"></td>
                            <td class=""><a target="_blank" href="/volume-1/{{ $ref->d1_photo }}">Preview</a></td>
                        @else
                            {{--<td class="gp1 bg-danger"><img src="/img/red_cross.png" height="18px"></td>--}}
                            <td class="gp1 bg-danger">Awaiting Upload</td>
                        @endif
                    </tr>
                @endif

                @if($rtw->work_status=='UK Citizen')
                <tr>
                    <th>Passport Photo Uploaded</th>
                    @if($ref->passport_photo)
                        <?php $photo =  substr($ref->passport_photo,14); ?>
                        <td class=""><img src="/img/green-tick.png" height="18px"></td>
                        <td class=""><a target="_blank" href="/volume-1/{{ $photo }}">Preview</a></td>
                    @else
                        {{--<td class="gp1 bg-danger"><img src="/img/red_cross.png" height="18px"></td>--}}
                        <td class="gp1 bg-danger">Awaiting Upload</td>
                    @endif
                </tr>
                    <tr>
                        <th>Photo Page of Passport Uploaded</th>
                        @if($ref->passport_photo_page)
                            <td class="gp1"><img src="/img/green-tick.png" height="18px"></td>
                            <td class="gp1"><a target="_blank" href="/volume-1/{{ $ref->passport_photo_page }}">Preview</a></td>
                        @else
                            {{--<td class="gp1 bg-danger"><img src="/img/red_cross.png" height="18px"></td>--}}
                            <td class="gp1 bg-danger">Awaiting Upload</td>
                        @endif
                    </tr>

                        <tr>
                            <th>Birth Certificate</th>
                            @if($ref->birth_cert)
                                <td class="gp2"><img src="/img/green-tick.png" height="18px"></td>
                                <td class="gp2"><a target="_blank" href="/volume-1/{{ $ref->birth_cert }}">Preview</a></td>
                            @else
                                <td class="gp2 bg-danger">Awaiting Upload</td>
                            @endif
                        </tr>

                    <tr>
                        <th>NI Card</th>
                        @if($ref->ni_card)
                            <td class=""><img src="/img/green-tick.png" height="18px"></td>
                            <td class=""><a target="_blank" href="/volume-1/{{ $ref->ni_card }}">Preview</a></td>
                        @else
                            <td class="gp2 bg-danger">Awaiting Upload</td>
                        @endif
                    </tr>
                @endif

                @if($rtw->work_status=='European National')
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
                    <tr>
                        <th>Photo Page of Passport Uploaded</th>
                        @if($ref->passport_photo_page)
                            <td class="gp1"><img src="/img/green-tick.png" height="18px"></td>
                            <td class="gp1"><a target="_blank" href="/volume-1/{{ $ref->passport_photo_page }}">Preview</a></td>
                        @else
                            {{--<td class="gp1 bg-danger"><img src="/img/red_cross.png" height="18px"></td>--}}
                            <td class="gp1 bg-danger">Awaiting Upload</td>
                        @endif
                    </tr>

                    <tr>
                        <th>Valid ID card or equivalent</th>
                        @if($ref->ni_card)
                            <td class=""><img src="/img/green-tick.png" height="18px"></td>
                            <td class=""><a target="_blank" href="/volume-1/{{ $ref->ni_card }}">Preview</a></td>
                        @else
                            <td class="gp1 bg-danger">Awaiting Upload</td>
                        @endif
                    </tr>
                @endif

                @if($rtw->work_status=='Non European National')
                    <tr>
                        <th>Passport Photo Uploaded</th>
                        @if($ref->passport_photo)
                            <?php $photo =  substr($ref->passport_photo,14); ?>
                            <td class=""><img src="/img/green-tick.png" height="18px"></td>
                            <td class=""><a target="_blank" href="/volume-1/{{ $photo }}">Preview</a></td>
                        @else
                            {{--<td class="gp1 bg-danger"><img src="/img/red_cross.png" height="18px"></td>--}}
                            <td class="gp1 bg-danger">Awaiting Upload</td>
                        @endif
                    </tr>
                    <tr>
                        <th>Photo Page of Passport $ Valid Visa Uploaded</th>
                        @if($ref->passport_photo_page)
                            <td class="gp1"><img src="/img/green-tick.png" height="18px"></td>
                            <td class="gp1"><a target="_blank" href="/volume-1/{{ $ref->passport_photo_page }}">Preview</a></td>
                        @else
                            {{--<td class="gp1 bg-danger"><img src="/img/red_cross.png" height="18px"></td>--}}
                            <td class="gp1 bg-danger">Awaiting Upload</td>
                        @endif
                    </tr>
                    <tr>
                        <th>Valid Work Permit or Residency Document</th>
                        @if($ref->ni_card)
                            <td class="gp1"><img src="/img/green-tick.png" height="18px"></td>
                            <td class="gp1"><a target="_blank" href="/volume-1/{{ $ref->ni_card }}">Preview</a></td>
                        @else
                            <td class="gp1 bg-danger">Awaiting Upload</td>
                        @endif
                    </tr>
                @endif
            </table>
        @endforeach
    @endforeach
</div><!--tab panel address-->

<script>
    if ($("td.gp1").hasClass('bg-danger')) {
        console.log($("td.gp2").hasClass('bg-danger'));
        if($("td").hasClass('gp2')){
            if ($("td.gp2").hasClass('bg-danger')) {
                console.log("gp2 has bg-danger");
            } else {
                $("#gp1_tick").show();
                $(".gp1").removeClass('bg-danger').text('');
            }
        }
    } else {
        $("#gp1_tick").show();
        $(".gp2.bg-danger").removeClass('bg-danger').text('');
    }
</script>