@extends('frontend.layouts.master')

@section('content')

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h2>Heading</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Heading</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Heading</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div>
        </div>



    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-home"></i> {{ trans('navs.general.home') }}
                </div>

                <div class="panel-body">
                    {{ trans('strings.frontend.welcome_to', ['place' => app_name()]) }}
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

        {{--@role('Administrator')--}}
            {{-- You can also send through the Role ID --}}

            {{--<div class="col-md-10 col-md-offset-1">--}}

                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_blade_extensions') }}</div>--}}

                    {{--<div class="panel-body">--}}
                        {{--{{ trans('strings.frontend.test') . ' 1: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}--}}
                    {{--</div>--}}
                {{--</div><!-- panel -->--}}

            {{--</div><!-- col-md-10 -->--}}
        {{--@endauth--}}

        @if (access()->hasRole('Administrator') || access()->hasRole('User'))
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.role_name') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 2: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        {{-- The second parameter says the user must have all the roles specified. Administrator does not have the role with an id of 2, so this will not show. --}}
        {{--@if (access()->hasRoles(['Administrator', 2], true))--}}
            {{--<div class="col-md-10 col-md-offset-1">--}}

                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.array_roles') }}</div>--}}

                    {{--<div class="panel-body">--}}
                        {{--{{ trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}--}}
                    {{--</div>--}}
                {{--</div><!-- panel -->--}}

            {{--</div><!-- col-md-10 -->--}}
        {{--@endif--}}

        {{--@permission('view-backend')--}}
            {{--<div class="col-md-10 col-md-offset-1">--}}

                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.permission') . trans('strings.frontend.tests.using_access_helper.permission_name') }}</div>--}}

                    {{--<div class="panel-body">--}}
                        {{--{{ trans('strings.frontend.test') . ' 5: ' . trans('strings.frontend.tests.you_can_see_because_permission', ['permission' => 'view-backend']) }}--}}
                    {{--</div>--}}
                {{--</div><!-- panel -->--}}

            {{--</div><!-- col-md-10 -->--}}
        {{--@endauth--}}



        {{--<div class="col-md-10 col-md-offset-1">--}}

            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.js_injected_from_controller') }}</div>--}}

                {{--<div class="panel-body">--}}
                    {{--{{ trans('strings.frontend.test') . ' 8: ' . trans('strings.frontend.tests.view_console_it_works') }}--}}
                {{--</div>--}}
            {{--</div><!-- panel -->--}}

        {{--</div><!-- col-md-10 -->--}}



    </div><!--row-->
@endsection

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(test);
    </script>
@stop