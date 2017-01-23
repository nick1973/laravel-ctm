<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#frontend-navbar-collapse">
                <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{--{{ link_to_route('frontend.index', app_name(), [], ['class' => 'navbar-brand']) }}--}}
        </div><!--navbar-header-->

        <div class="collapse navbar-collapse" id="frontend-navbar-collapse">
            @if(access()->guest())
                <ul class="nav navbar-nav">
                    <li class="active">{{ link_to_route('frontend.index', 'Register') }}</li>
                    {{--<li>{{ link_to_route('frontend.macros', trans('navs.frontend.macros')) }}</li>--}}
                </ul>
            @endif
                @if(access()->hasRole('User'))
                    <ul class="nav navbar-nav">
                        <li>{{ link_to_route('frontend.user.dashboard', 'Profile Dashboard') }}</li>
                    </ul>
                @endif
                @if(access()->hasRole('OpsManager'))
                    <ul class="nav navbar-nav">
                        <li>{{ link_to_route('dashboard.ops.index', 'Ops Dashboard') }}</li>
                    </ul>
                @endif
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                <ul class="nav navbar-nav">
                    <li class=""><a href="/password/change">Change Password<span class="sr-only">(current)</span></a></li>
                </ul>
                @endif
                {{--@if (config('locale.status') && count(config('locale.languages')) > 1)--}}
                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                            {{--{{ trans('menus.language-picker.language') }}--}}
                            {{--<span class="caret"></span>--}}
                        {{--</a>--}}

                        {{--@include('includes.partials.lang')--}}
                    {{--</li>--}}
                {{--@endif--}}

                @if (access()->guest())
                    {{--<li>{{ link_to('login', trans('navs.frontend.login')) }}</li>--}}
{{--                    <li>{{ link_to('register', trans('navs.frontend.register')) }}</li>--}}
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ access()->user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @if(access()->hasRole('OpsManager'))
                                    <li>{{ link_to_route('dashboard.ops.index', 'Ops Dashboard') }}</li>
                                @else
                                <li>{{ link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard')) }}</li>
                            @endif


                            @if (access()->user()->canChangePassword())
                                <li>{{ link_to_route('auth.password.change', trans('navs.frontend.user.change_password')) }}</li>
                            @endif

                            @permission('view-backend')
                            <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                            @endauth

                            @role('Manager')
                                <li>{{ link_to_route('admin.dashboard', 'Managers') }}</li>
                            @endauth

                            <li>{{ link_to_route('auth.logout', trans('navs.general.logout')) }}</li>
                        </ul>
                    </li>
                @endif
            </ul>
            @if(access()->guest())
                <div id="navbar" class="">
                        {{ Form::open(['route' => 'auth.login', 'class' => 'navbar-form navbar-right']) }}
                        <div class="form-group">
                            <input name="email" type="text" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" placeholder="Password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Sign in</button>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                {{ link_to('password/reset', trans('labels.frontend.passwords.forgot_password')) }}
                            </div><!--col-md-6-->
                        </div><!--form-group-->
                    </form>
                </div><!--/.navbar-collapse -->
            @endif
        </div><!--navbar-collapse-->
    </div><!--container-->
</nav>