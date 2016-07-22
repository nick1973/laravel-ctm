@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12 col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('navs.frontend.dashboard') }}</div>

                <div class="panel-body">
                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{ trans('navs.frontend.user.my_information') }}</a>
                            </li>
                            <li role="presentation">
                                <a href="#address" aria-controls="address" role="tab" data-toggle="tab">Address</a>
                            </li>
                            <li role="presentation">
                                <a href="#reference" aria-controls="reference" role="tab" data-toggle="tab">Reference Details</a>
                            </li>
                            <li role="presentation">
                                <a href="#righttowork" aria-controls="righttowork" role="tab" data-toggle="tab">Right To Work</a>
                            </li>
                            <li role="presentation">
                                <a href="#money" aria-controls="money" role="tab" data-toggle="tab">The Money Bit</a>
                            </li>
                            <li role="presentation">
                                <a href="#documents" aria-controls="documents" role="tab" data-toggle="tab">Upload Your Documents</a>
                            </li>
                            <li role="presentation">
                                <a href="#documents" aria-controls="documents" role="tab" data-toggle="tab">Upload Your Documents</a>
                            </li>
                            <li role="presentation">
                                <a href="#eventslist" aria-controls="eventslist" role="tab" data-toggle="tab">Events List</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="profile">
                                <table class="table table-striped table-hover table-bordered dashboard-table">
                                    <tr>
                                        <th>{{ trans('labels.frontend.user.profile.avatar') }}</th>
                                        <td><img src="{{ $user->picture }}" class="user-profile-image" /></td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('labels.frontend.user.profile.name') }}</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('labels.frontend.user.profile.email') }}</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('labels.frontend.user.profile.created_at') }}</th>
                                        <td>{{ $user->created_at }} ({{ $user->created_at->diffForHumans() }})</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('labels.frontend.user.profile.last_updated') }}</th>
                                        <td>{{ $user->updated_at }} ({{ $user->updated_at->diffForHumans() }})</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('labels.general.actions') }}</th>
                                        <td>
                                            {{ link_to_route('frontend.user.profile.edit', trans('labels.frontend.user.profile.edit_information'), [], ['class' => 'btn btn-primary btn-xs']) }}

                                            @if ($user->canChangePassword())
                                                {{ link_to_route('auth.password.change', trans('navs.frontend.user.change_password'), [], ['class' => 'btn btn-warning btn-xs']) }}
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div><!--tab panel profile-->

                            <div role="tabpanel" class="tab-pane" id="address">
                                <table class="table table-striped table-hover table-bordered dashboard-table">
                                    <tr>
                                        <th>{{ trans('labels.frontend.user.profile.avatar') }}</th>
                                        <td><img src="{{ $user->picture }}" class="user-profile-image" /></td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('labels.frontend.user.profile.name') }}</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('labels.frontend.user.profile.email') }}</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('labels.frontend.user.profile.created_at') }}</th>
                                        <td>{{ $user->created_at }} ({{ $user->created_at->diffForHumans() }})</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('labels.frontend.user.profile.last_updated') }}</th>
                                        <td>{{ $user->updated_at }} ({{ $user->updated_at->diffForHumans() }})</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('labels.general.actions') }}</th>
                                        <td>
                                            {{ link_to_route('frontend.user.profile.edit', trans('labels.frontend.user.profile.edit_information'), [], ['class' => 'btn btn-primary btn-xs']) }}

                                            @if ($user->canChangePassword())
                                                {{ link_to_route('auth.password.change', trans('navs.frontend.user.change_password'), [], ['class' => 'btn btn-warning btn-xs']) }}
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div><!--tab panel address-->

                            <div role="tabpanel" class="tab-pane" id="reference">


                            </div><!--tab panel reference-->

                        </div><!--tab content-->

                    </div><!--tab panel-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection