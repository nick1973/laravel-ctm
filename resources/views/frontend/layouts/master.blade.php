<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />

        {{--DROPZONE--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">


        {{--DROPZONE-END--}}

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'CTM')">
        <meta name="author" content="@yield('meta_author', 'Nick Ashford')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles-end')

        {{--{{ Html::style(elixir('css/frontend.css')) }}--}}
    <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        @langRTL
            {!! Html::style(elixir('css/rtl.css')) !!}
        @endif

        @yield('after-styles-end')

        <!-- Fonts -->
        {{ Html::style('https://fonts.googleapis.com/css?family=Lato:100,300,400,700') }}

        <style>
            .onoffswitch {
                position: relative; width: 90px;
                -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
            }
            .onoffswitch-checkbox {
                display: none;
            }
            .onoffswitch-label {
                display: block; overflow: hidden; cursor: pointer;
                border: 2px solid #999999; border-radius: 20px;
            }
            .onoffswitch-inner {
                display: block; width: 200%; margin-left: -100%;
                transition: margin 0.3s ease-in 0s;
            }
            .onoffswitch-inner:before, .onoffswitch-inner:after {
                display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
                font-size: 16px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
                box-sizing: border-box;
            }
            .onoffswitch-inner:before {
                content: "Yes";
                padding-left: 20px;
                background-color: #34A7C1; color: #FFFFFF;
            }
            .onoffswitch-inner:after {
                content: "No";
                padding-right: 20px;
                background-color: #EEEEEE; color: #999999;
                text-align: right;
            }
            .onoffswitch-switch {
                display: block; width: 18px; margin: 6px;
                background: #FFFFFF;
                position: absolute; top: 0; bottom: 0;
                right: 56px;
                border: 2px solid #999999; border-radius: 20px;
                transition: all 0.3s ease-in 0s;
            }
            .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
                margin-left: 0;
            }
            .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
                right: 0px;
            }
        </style>
    </head>
    <body id="app-layout">
        @include('includes.partials.logged-in-as')
        @include('frontend.includes.nav')
        @if (access()->hasRole('Administrator') || access()->hasRole('User'))
                <div class="jumbotron">
                    <div class="container">
                        <div class="col-md-6">
                            <h1>Welcome back to your profile {{ access()->user()->name }}.</h1>
                            <p>You can view and edit your profile below.</p>
                            {{--<p><a class="btn btn-primary btn-lg" href="http://www.ctm.uk.com/join-us/" role="button">New to CTM? Learn more &raquo;</a></p>--}}
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                New to CTM? Learn more &raquo;
                            </button>
                        </div>
                        <div class="col-md-6">
                            <br/>
                            @if(access()->user()->photo)
                            <img src="/{{ access()->user()->photo }}" alt="{{ access()->user()->name }}" title="{{ access()->user()->name }}" height="100px" class="img-rounded">
                                @else
                                <img src="{{ access()->user()->picture }}" title="{{ access()->user()->name }}" class="user-profile-image img-rounded" />
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="jumbotron">
                    <div class="container">
                        <h1>Create Your New CTM Account.</h1>
                        <p>Please complete the information below to create your CTM account, or login above if you have already created one.</p>
                        <p><a class="btn btn-primary btn-lg" href="http://www.ctm.uk.com/join-us/" role="button">New to CTM? Learn more &raquo;</a></p>
                    </div>
                </div>
        @endif
            <div class="container">
                @include('includes.partials.messages')
                @yield('content')
            </div><!-- container -->

        <!-- Scripts -->

        {{--{{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js') }}--}}
        {{--<script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery/jquery-2.1.4.min.js')}}"><\/script>')</script>--}}
        {{--{!! Html::script('js/vendor/bootstrap/bootstrap.min.js') !!}--}}

        @yield('before-scripts-end')
        {!! Html::script(elixir('js/frontend.js')) !!}
        @yield('after-scripts-end')

        @include('includes.partials.ga')
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">About CTM</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Emma's Ideas.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>