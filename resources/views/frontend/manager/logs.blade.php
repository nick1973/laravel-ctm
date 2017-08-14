@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12 col-lg-12">

            <div class="panel panel-default">

                <div class="panel-body">
                    <table class="table table-striped table-hover table-bordered dashboard-table">
                        <tr>
                            <th>payroll</th>
                            <th>Name</th>
                            <th>Accepted</th>
                            <th>Who Did It</th>
                            <th>{{ trans('labels.frontend.user.profile.created_at') }}</th>
                            {{--<th width="33%">{{ trans('labels.frontend.user.profile.last_updated') }}</th>--}}
                        </tr>
                        @foreach($staff as $user)
                            <tr>
                                @if( $user->markAsp45 == 1 )
                                    <td></td>
                                @else
                                    <td>{{ $user->staff_payroll }}</td>
                                @endif
                                <td><a href="/dashboard/manager/{{ $user->id }}">{{ $user->staff_name }}</a></td>
                                <td>{{ $user->accepted_application }}</td>
                                <td>{{ $user->who_was_it }}</td>
                                <td>{{ $user->created_at }}</td>
                                {{--<td>{{ $user->updated_at }} ({{ $user->updated_at->diffForHumans() }})</td>--}}
                            </tr>
                        @endforeach
                    </table>

                    {{--{{ $users->links() }}--}}
                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection