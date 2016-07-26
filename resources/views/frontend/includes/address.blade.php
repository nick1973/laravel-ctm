<div role="tabpanel" class="tab-pane" id="address">
    {{--{!! Form::model($user,[--}}
    {{--'method' => 'PATCH',--}}
    {{--//'files'=>true,--}}
    {{--'route' => ['dashboard.profile.update',$user->id],--}}
    {{--'class' => 'form-horizontal']) !!}--}}
    <table class="table table-striped table-hover table-bordered dashboard-table">
        <tr>
            <th>Number & Street</th>
            <td>{{ $user->address_line_1 }}</td>
        </tr>
        <tr>
            <th>Area / Region</th>
            <td>{{ $user->address_line_2 }}</td>
        </tr>
        <tr>
            <th>Town / City</th>
            <td>{{ $user->city }}</td>
        </tr>
        <tr>
            <th>County</th>
            <td>{{ $user->county }}</td>
        </tr>
        <tr>
            <th>Country</th>
            <td>{{ $user->country }}</td>
        </tr>
        <tr>
            <th>Postcode</th>
            <td>{{ $user->postcode }}</td>
        </tr>
        <tr>
            <th>{{ trans('labels.general.actions') }}</th>
            <td>
                {{--{{ Form::submit('Click Me!', ['class' => 'btn btn-primary btn-sm']) }}--}}
                {{ link_to_route('frontend.user.profile.edit_address', trans('labels.frontend.user.profile.edit_information'), [], ['class' => 'btn btn-primary btn-sm']) }}
            </td>
        </tr>

    </table>
    {{--{!! Form::close() !!}--}}
</div><!--tab panel address-->