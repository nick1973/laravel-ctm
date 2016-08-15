<div role="tabpanel" class="tab-pane" id="address">
    <table class="table table-striped table-hover table-bordered dashboard-table">
        <tr>
            <th>Number & Street</th>
            @if(strpos($user->address_dirty, 'address_line_1'))
                <td class="bg-success address">{{ $user->address_line_1 }}</td>
            @else
                <td class="address">{{ $user->address_line_1 }}</td>
            @endif
        </tr>
        <tr>
            <th>Area / Region</th>
            @if(strpos($user->address_dirty, 'address_line_2'))
                <td class="bg-success address">{{ $user->address_line_2 }}</td>
            @else
                <td class="address">{{ $user->address_line_2 }}</td>
            @endif
        </tr>
        <tr>
            <th>Town / City</th>
            @if(strpos($user->address_dirty, 'address_line_2'))
                <td class="bg-success address">{{ $user->city }}</td>
            @else
                <td class="address">{{ $user->city }}</td>
            @endif
        </tr>
        <tr>
            <th>County</th>
            @if(strpos($user->address_dirty, 'county'))
                <td class="bg-success address">{{ $user->county }}</td>
            @else
                <td class="address">{{ $user->county }}</td>
            @endif
        </tr>
        <tr>
            <th>Country</th>
            @if(strpos($user->address_dirty, 'country'))
                <td class="bg-success address">{{ $user->country }}</td>
            @else
                <td class="address">{{ $user->country }}</td>
            @endif
        </tr>
        <tr>
            <th>Postcode</th>
            @if(strpos($user->address_dirty, 'postcode'))
                <td class="bg-success address">{{ $user->postcode }}</td>
            @else
                <td class="address">{{ $user->postcode }}</td>
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