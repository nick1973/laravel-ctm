<div role="tabpanel" class="tab-pane" id="address">
    <table class="table table-striped table-hover table-bordered dashboard-table">
        <tr>
            <th>Number & Street</th>
            <td class="address">{{ $user->address_line_1 }}</td>
        </tr>
        <tr>
            <th>Area / Region</th>
            <td class="address">{{ $user->address_line_2 }}</td>
        </tr>
        <tr>
            <th>Town / City</th>
            <td class="address">{{ $user->city }}</td>
        </tr>
        <tr>
            <th>County</th>
            <td class="address">{{ $user->county }}</td>
        </tr>
        <tr>
            <th>Country</th>
            <td class="address">{{ $user->country }}</td>
        </tr>
        <tr>
            <th>Postcode</th>
            <td class="address">{{ $user->postcode }}</td>
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