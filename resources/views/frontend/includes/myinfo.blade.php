<div role="tabpanel" class="tab-pane active" id="profile">
    <table class="table table-striped table-hover table-bordered dashboard-table">
        {{--@role(!'Executive')--}}
            <tr>
                <th>{{ trans('labels.general.actions') }}</th>
                <td>
                    {{ link_to_route('frontend.user.profile.edit', trans('labels.frontend.user.profile.edit_information'), [], ['class' => 'btn btn-primary btn-sm']) }}

                    @if ($user->canChangePassword())
                        {{ link_to_route('auth.password.change', trans('navs.frontend.user.change_password'), [], ['class' => 'btn btn-warning btn-sm']) }}
                    @endif
                </td>
            </tr>
        {{--@endauth--}}
        <tr>
            <th>Title</th>
            @if(isset($user->title))
                <td class="required">{{ $user->title }}</td>
                @else
                <td></td>
            @endif
        </tr>
        <tr>
            <th>First Name</th>
            <td class="required">{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td class="required">{{ $user->lastname }}</td>
        </tr>
        <tr>
            <th>Mobile No</th>
            <td>{{ $user->mobile }}</td>
        </tr>
        <tr>
            <th>Land/Alternative Number</th>
            <td>{{ $user->land }}</td>
        </tr>
        <tr>
            <th>Date of Birth</th>
                <?php
                    list($dd,$mm,$yyyy) = explode('/',$user->dob);
                    if (!checkdate($mm,$dd,$yyyy)) { ?>
            <td class="required">{{ gmdate($user->dob) }}</td>
            <?php   } else{ ?>
            <td class="required">{{ $user->dob }}</td>

            <?php        }
                ?>



        </tr>
        <tr>
            <th>Gender</th>
            <td class="required">{{ $user->gender }}</td>
        </tr>
        <tr>
            <th>Ethnic Origin</th>
            <td class="required">{{ $user->origin }}</td>
        </tr>
        <tr>
            <th>Nationality</th>
            <td class="required">{{ $user->nationality }}</td>
        </tr>
        <tr>
            <th>{{ trans('labels.frontend.user.profile.email') }}</th>
            <td class="required">{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Emergency Contact Name</th>
            <td class="required">{{ $user->emergency_contact_name }}</td>
        </tr>
        <tr>
            <th>Emergency Contact Relationship</th>
            <td class="required">{{ $user->emergency_contact_rel }}</td>
        </tr>
        <tr>
            <th>Emergency Contact Number</th>
            <td class="required">{{ $user->emergency_contact_number }}</td>
        </tr>
        <tr>
            <th>Emergency Contact Mobile</th>
            <td>{{ $user->emergency_contact_mobile }}</td>
        </tr>
        <tr>
            <th>Do you speak other languages?</th>
            <td class="required">{{ $user->other_lang }}</td>
        </tr>
        <tr>
            <th>Do you have a full UK driving Licence?</th>
            <td class="required">{{ $user->uk_driving_license }}</td>
        </tr>
        <tr>
            <th>Do you have licence to drive D1 vehicles (Minibus)?</th>
            <td class="required">{{ $user->d1 }}</td>
        </tr>
        <tr>
            <th>Do you have qualifications under the NRSWA 1991?</th>
            <td class="required">{{ $user->nrswa }}</td>
        </tr>
        <tr>
            <th>Do you have any unspent criminal convictions?</th>
            <td class="required">{{ $user->convictions }}</td>
        </tr>
        <tr>
            <th>Do you have any medical conditions we should be aware of?</th>
            <td class="required">{{ $user->medical_conditions }}</td>
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

    $( "td.required:empty" )
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
