@extends('frontend.layouts.master')

@section('content')

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            {{--Col 1--}}
            <div class="col-md-4">
                <div class="form-group">
                    <label for="title">Title</label>
                    <select name="title" class="form-control">
                        <option>Mr</option>
                        <option>Mrs</option>
                        <option>Ms</option>
                        <option>Miss</option>
                        <option>Dr</option>
                    </select>
                    {{--<input type="title" class="form-control" id="exampleInputEmail1" placeholder="title">--}}
                </div>

                <div class="form-group">
                    <label for="firstname">First Name(s)</label>
                    <input name="name" type="text" class="form-control" id="firstname" placeholder="First Name(s)">
                </div>

                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Last Name">
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input id="datepicker" name="dob" type="date" class="form-control" id="dob" placeholder="Date of Birth">
                </div>
            </div>
            {{--Col 2--}}
            <div class="col-md-4">
                <div class="form-group">
                    <label for="origin:">Ethnic Origin:</label>
                    <select id="origin" name="origin" class="form-control">
                        <option>White</option>
                        <option>Black</option>
                        <option>Asian</option>
                        <option>Afro Caribbean</option>
                        <option>Mixed Race</option>
                        <option>Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" class="form-control">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nationality">Nationality</label>
                    <input name="nationality" type="text" class="form-control" id="nationality" placeholder="Nationality">
                </div>

                <div class="form-group">
                    <label for="townofbirth">Town of Birth</label>
                    <input name="townofbirth" type="text" class="form-control" id="townofbirth" placeholder="Town of Birth">
                </div>
            </div>
            {{--Col 3--}}
            <div class="col-md-4">
                <div class="form-group">
                    <label for="countryofbirth">Country of Birth</label>
                    <input name="countryofbirth" type="text" class="form-control" id="countryofbirth" placeholder="Country of Birth">
                </div>
                

                <div class="form-group">
                    {{ Form::label('email', trans('validation.attributes.frontend.email'), ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.email')]) }}
                    </div><!--col-md-6-->
                </div><!--form-group-->

                <div class="form-group">
                    {{ Form::label('password', trans('validation.attributes.frontend.password'), ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.password')]) }}
                    </div><!--col-md-6-->
                </div><!--form-group-->

                <div class="form-group">
                    {{ Form::label('password_confirmation', trans('validation.attributes.frontend.password_confirmation'), ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        {{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.password_confirmation')]) }}
                    </div><!--col-md-6-->
                </div><!--form-group-->


                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
            </div>
        </div>



    <div class="row">

        {{--<div class="col-md-10 col-md-offset-1">--}}

            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">--}}
                    {{--<i class="fa fa-home"></i> {{ trans('navs.general.home') }}--}}
                {{--</div>--}}

                {{--<div class="panel-body">--}}
                    {{--{{ trans('strings.frontend.welcome_to', ['place' => app_name()]) }}--}}
                {{--</div>--}}
            {{--</div><!-- panel -->--}}

        {{--</div><!-- col-md-10 -->--}}

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

        {{--@if (access()->hasRole('Administrator') || access()->hasRole('User'))--}}
            {{--<div class="col-md-10 col-md-offset-1">--}}

                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.role_name') }}</div>--}}

                    {{--<div class="panel-body">--}}
                        {{--{{ trans('strings.frontend.test') . ' 2: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}--}}
                    {{--</div>--}}
                {{--</div><!-- panel -->--}}

            {{--</div><!-- col-md-10 -->--}}
        {{--@endif--}}

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