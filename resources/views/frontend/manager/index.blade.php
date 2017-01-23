@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12 col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{ $users->total() }} newly created profiles below:</h4>
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover table-bordered dashboard-table">
                        <tr>
                            <th>payroll</th>
                            <th width="33%">Name</th>
                            <th width="33%">{{ trans('labels.frontend.user.profile.created_at') }}</th>
                            <th width="33%">{{ trans('labels.frontend.user.profile.last_updated') }}</th>
                        </tr>
                        @foreach($users as $user)
                        <tr>
                            @if($user->profile_confirmed=="Yes" || $user->profile_confirmed=="no")
                                <td>{{ $user->payroll }}</td>
                                @else
                                <td></td>
                            @endif
                            <td><a href="/dashboard/manager/{{ $user->id }}">{{ $user->name }} {{ $user->lastname }}</a></td>
                            <td>{{ $user->created_at }} ({{ $user->created_at->diffForHumans() }})</td>
                            <td>{{ $user->updated_at }} ({{ $user->updated_at->diffForHumans() }})</td>
                        </tr>
                        @endforeach
                    </table>

                        {{ $users->links() }}
                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

        <div class="col-lg-12">
            <h3>Use the 'Export' button below to download the payroll file:</h3>
            <h4>There are {{ $staff }} to be exported.</h4>
            <form action="/dashboard/manager/staff/export" method="get">
                <button type="submit" id="export" class="btn btn-success">Export</button>
            </form>
        </div>

        <div id="results" class="col-lg-12"></div>


    </div><!-- row -->
@endsection