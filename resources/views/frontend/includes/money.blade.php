<div role="tabpanel" class="tab-pane" id="money">
    <table class="table table-striped table-hover table-bordered dashboard-table">
        <tr>
            <th>Account Holder's Name</th>
            <td class="address">{{ $user->address_line_1 }}</td>
        </tr>
        <tr>
            <th>Account Number</th>
            <td class="address">{{ $user->address_line_2 }}</td>
        </tr>
        <tr>
            <th>Sort Code</th>
            <td class="address">{{ $user->city }}</td>
        </tr>
        <tr>
            <th>National Insurance Number</th>
            <td class="address">{{ $user->county }}</td>
        </tr>
        <tr>
            <th>{{ trans('labels.general.actions') }}</th>
            <td>
                {{ link_to_route('frontend.user.profile.edit_money', trans('labels.frontend.user.profile.edit_information'), [], ['class' => 'btn btn-primary btn-sm']) }}
            </td>
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