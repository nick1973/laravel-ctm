<div role="tabpanel" class="tab-pane active" id="profile">
    <table class="table table-striped table-hover table-bordered dashboard-table">
        {{--@role(!'Executive')--}}
            {{--<tr>--}}
                {{--<th>{{ trans('labels.general.actions') }}</th>--}}
                {{--<td>--}}
                    {{--{{ link_to_route('frontend.user.profile.edit', trans('labels.frontend.user.profile.edit_information'), [], ['class' => 'btn btn-primary btn-sm']) }}--}}

                    {{--@if ($user->canChangePassword())--}}
                        {{--{{ link_to_route('auth.password.change', trans('navs.frontend.user.change_password'), [], ['class' => 'btn btn-warning btn-sm']) }}--}}
                    {{--@endif--}}
                {{--</td>--}}
            {{--</tr>--}}
        {{--@endauth--}}
        <tr>
            <th>Title</th>
            @if(strpos($user->dirty, 'title'))
                <td class="bg-success">{{ $user->title }}</td>
            @else
                <td class="manage">{{ $user->title }}</td>
            @endif
        </tr>
        <tr>
            <th>First Name</th>
            @if(strpos($user->dirty, 'name'))
                <td class="bg-success">{{ $user->name }}</td>
            @else
                <td class="manage">{{ $user->name }}</td>
            @endif
        </tr>
        <tr>
            <th>Last Name</th>
            @if(strpos($user->dirty, 'lastname'))
                <td class="bg-success">{{ $user->lastname }}</td>
            @else
                <td class="manage">{{ $user->lastname }}</td>
            @endif
        </tr>
        <tr>
            <th>Mobile No</th>
            @if(strpos($user->dirty, 'mobile'))
                <td class="bg-success">{{ $user->mobile }}</td>
            @else
                <td class="manage">{{ $user->mobile }}</td>
            @endif
        </tr>
        <tr>
            <th>Land Line</th>
            @if(strpos($user->dirty, 'land'))
                <td class="bg-success">{{ $user->land }}</td>
            @else
                <td class="">{{ $user->land }}</td>
            @endif
        </tr>
        <tr>
        <?php  $year = substr($user->dob,0,4); $day = substr($user->dob,8,2); $month = substr($user->dob,5,2); ?>
            <th>Date of Birth</th>
            @if(strpos($user->dirty, 'dob'))
                <td class="bg-success">{{ $day . '-' . $month . '-' . $year }}</td>
            @else
                <td class="manage">{{ $day . '-' . $month . '-' . $year }}</td>
            @endif
        </tr>
        <tr>
            <th>Town of Birth</th>
            @if(strpos($user->dirty, 'townofbirth'))
                <td class="bg-success">{{ $user->townofbirth }}</td>
            @else
                <td class="manage">{{ $user->townofbirth }}</td>
            @endif
        </tr>
        <tr>
            <th>Gender</th>
            @if(strpos($user->dirty, 'gender'))
                <td class="bg-success">{{ $user->gender }}</td>
            @else
                <td class="manage">{{ $user->gender }}</td>
            @endif
        </tr>
        <tr>
            <th>Ethnic Origin</th>
            @if(strpos($user->dirty, 'origin'))
                <td class="bg-success">{{ $user->origin }}</td>
            @else
                <td class="manage">{{ $user->origin }}</td>
            @endif
        </tr>
        <tr>
            <th>Nationality</th>
            @if(strpos($user->dirty, 'nationality'))
                <td class="bg-success">{{ $user->nationality }}</td>
            @else
                <td class="manage">{{ $user->nationality }}</td>
            @endif
        </tr>
        <tr>
            <th>{{ trans('labels.frontend.user.profile.email') }}</th>
            @if(strpos($user->dirty, 'email'))
                <td class="bg-success">{{ $user->email }}</td>
            @else
                <td class="manage">{{ $user->email }}</td>
            @endif
        </tr>
        <tr>
            <th>Emergency Contact Name</th>
            @if(strpos($user->dirty, 'emergency_contact_name'))
                <td class="bg-success">{{ $user->emergency_contact_name }}</td>
                @else
                <td class="manage">{{ $user->emergency_contact_name }}</td>
            @endif
        </tr>
        <tr>
            <th>Emergency Contact Relationship</th>
            @if(strpos($user->dirty, 'emergency_contact_rel'))
                <td class="bg-success">{{ $user->emergency_contact_rel }}</td>
            @else
                <td class="manage">{{ $user->emergency_contact_rel }}</td>
            @endif
        </tr>
        <tr>
            <th>Emergency Contact Number</th>
            @if(strpos($user->dirty, 'emergency_contact_rel'))
                <td class="bg-success">{{ $user->emergency_contact_number }}</td>
            @else
                <td class="manage">{{ $user->emergency_contact_number }}</td>
            @endif
        </tr>
        <tr>
            <th>Emergency Contact Mobile</th>
            @if(strpos($user->dirty, 'emergency_contact_mobile'))
                <td class="bg-success">{{ $user->emergency_contact_mobile }}</td>
            @else
                <td class="manage">{{ $user->emergency_contact_mobile }}</td>
            @endif
        </tr>
        <tr>
            <th>Do you speak other languages?</th>
            @if(strpos($user->dirty, 'other_lang'))
                <td class="bg-success">{{ $user->other_lang }}</td>
            @else
                <td class="manage">{{ $user->other_lang }}</td>
            @endif
        </tr>
        <tr>
            <th>Do you have a full UK driving Licence?</th>
            @if(strpos($user->dirty, 'uk_driving_license'))
                <td class="bg-success">{{ $user->uk_driving_license }}</td>
            @else
                <td class="manage">{{ $user->uk_driving_license }}</td>
            @endif
        </tr>
        <tr>
            <th>Do you have qualifications under the NRSWA 1991?</th>
            @if(strpos($user->dirty, 'nrswa'))
                <td class="bg-success">{{ $user->nrswa }}</td>
            @else
                <td class="manage">{{ $user->nrswa }}</td>
            @endif
        </tr>
        <tr>
            <th>Do you have any unspent criminal convictions?</th>
            @if(strpos($user->dirty, 'convictions'))
                <td class="bg-success">{{ $user->convictions }}</td>
            @else
                <td class="manage">{{ $user->convictions }}</td>
            @endif
        </tr>
        <tr>
            <th>Do you have any medical conditions we should be aware of?</th>
            @if(strpos($user->dirty, 'medical_conditions'))
                <td class="bg-success">{{ $user->medical_conditions }}</td>
            @else
                <td class="manage">{{ $user->medical_conditions }}</td>
            @endif
        </tr>
        <tr>
            <th>{{ trans('labels.frontend.user.profile.created_at') }}</th>
            <td>{{ $user->created_at }} ({{ $user->created_at->diffForHumans() }})</td>
        </tr>
        <tr>
            <th>{{ trans('labels.frontend.user.profile.last_updated') }}</th>
            <td>{{ $user->updated_at }} ({{ $user->updated_at->diffForHumans() }})</td>
        </tr>
    </table>

</div><!--tab panel profile-->

<script>

    $( "td.manage:empty" )
            .text( "Information Required!" )
            //.css( "background", "rgb(238,94,72)"
            .addClass('bg-danger');

    $("td.bg-danger").each(function(){
        if ($(this).hasClass('bg-danger')) {
            $("#myInfo").addClass('hidden');
            console.log("has Class");
        }
    });

</script>
