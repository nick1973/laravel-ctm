<div role="tabpanel" class="tab-pane active" id="profile">
    <table class="table table-striped table-hover table-bordered dashboard-table">
        <tr>
            <th>{{ trans('labels.general.actions') }}</th>
            <td>
                {{ link_to_route('frontend.user.profile.edit', trans('labels.frontend.user.profile.edit_information'), [], ['class' => 'btn btn-primary btn-sm']) }}

                @if ($user->canChangePassword())
                    {{ link_to_route('auth.password.change', trans('navs.frontend.user.change_password'), [], ['class' => 'btn btn-warning btn-sm']) }}
                @endif
            </td>
        </tr>
        {{--<tr>--}}
            {{--<th>Photo</th>--}}
            {{--<td><img src="{{ $user->picture }}" class="user-profile-image" /></td>--}}
            {{--<td><img width="100px" alt="No Image" src="/{{ $user->photo }}"></td>--}}
        {{--</tr>--}}
        <tr>
            <th>Title</th>
            @if(isset($user->title))
                <td>{{ $user->title }}</td>
                @else
                <td></td>
            @endif
        </tr>
        <tr>
            <th>First Name</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td>{{ $user->lastname }}</td>
        </tr>
        <tr>
            <th>Mobile No</th>
            <td>{{ $user->mobile }}</td>
        </tr>
        <tr>
            <th>Land Line</th>
            <td>{{ $user->land }}</td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td>{{ $user->dob }}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{{ $user->gender }}</td>
        </tr>
        <tr>
            <th>Ethnic Origin</th>
            <td>{{ $user->origin }}</td>
        </tr>
        <tr>
            <th>Nationality</th>
            <td>{{ $user->nationality }}</td>
        </tr>
        <tr>
            <th>{{ trans('labels.frontend.user.profile.email') }}</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Emergency Contact Name</th>
            <td>{{ $user->emergency_contact_name }}</td>
        </tr>
        <tr>
            <th>Emergency Contact Relationship</th>
            <td>{{ $user->emergency_contact_rel }}</td>
        </tr>
        <tr>
            <th>Emergency Contact Number</th>
            <td>{{ $user->emergency_contact_number }}</td>
        </tr>
        <tr>
            <th>Emergency Contact Mobile</th>
            <td>{{ $user->emergency_contact_mobile }}</td>
        </tr>
        <tr>
            <th>Do you speak other languages?</th>
            <td>{{ $user->other_lang }}</td>
        </tr>
        <tr>
            <th>Do you have a full UK driving Licence?</th>
            <td>{{ $user->uk_driving_license }}</td>
        </tr>
        <tr>
            <th>Do you have qualifications under the NRSWA 1991?</th>
            <td>{{ $user->nrswa }}</td>
        </tr>
        <tr>
            <th>Do you have any unspent criminal convictions?</th>
            <td>{{ $user->convictions }}</td>
        </tr>
        <tr>
            <th>Do you have any medical conditions we should be aware of?</th>
            <td>{{ $user->medical_conditions }}</td>
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

    $( "td:empty" )
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
