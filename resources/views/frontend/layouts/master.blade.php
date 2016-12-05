<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

        <script src="//code.jquery.com/jquery-1.12.3.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootpag/1.0.7/jquery.bootpag.js"></script>

        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
        {{--<script src="/js/dataTables.tableTools.js"></script>--}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.13/clipboard.min.js"></script>


        <script src="https://cdn.jsdelivr.net/vue/1.0.26/vue.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">





        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        {{--DROPZONE--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
        {{--DROPZONE-END--}}



        <script src="/js/val.js"></script>

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
            /* Hidden placeholder */
            select option[disabled]:first-child {
                display: none;
            }

        </style>
        <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>
    <body id="app-layout">
        @include('includes.partials.logged-in-as')
        @include('frontend.includes.nav')
        @if (access()->hasRole('Administrator') || access()->hasRole('User'))
                <div class="jumbotron">
                    <div class="container">
                        <div class="col-md-6">
                            <h1>Welcome back to your profile {{ access()->user()->name }}.</h1>
                        </div>
                        <div class="col-md-12">
                            <h3>Please fill out the form below to complete your application</h3>
                        </div>
                        <div class="col-md-6">
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
                                {{--<img src="{{ access()->user()->picture }}" title="{{ access()->user()->name }}" class="user-profile-image img-rounded" />--}}
                            @endif
                        </div>
                    </div>
                </div>
            @elseif(access()->hasRole('Executive'))
                <div class="jumbotron">
                    <div class="container">
                        <div class="col-md-12 col-ld-12">
                            {{--<h1>Welcome to {{ access()->user()->name }}'s profile.</h1>--}}
                            {{--<p>You can view {{ access()->user()->name }}'s profile below.</p>--}}
                            <h2>Managers Dashboard</h2>
                            <a href="/dashboard/manager" class="btn btn-warning">New Applicants</a>
                            <a href="/dashboard/sbf" class="btn btn-info">Staff Booking Form</a>
                            <a href="/dashboard/manager/staff/search" class="btn btn-primary">User Search</a>
                            <a href="/dashboard/register/dropdowns" class="btn btn-danger">Registration Dropdowns</a>
                        </div>
                        <div class="col-md-6">

                            {{--@if(access()->user()->photo)--}}
                                {{--<img src="/{{ access()->user()->photo }}" alt="{{ access()->user()->name }}" title="{{ access()->user()->name }}" height="100px" class="img-rounded">--}}
                            {{--@else--}}
                                {{--<img src="{{ access()->user()->picture }}" title="{{ access()->user()->name }}" class="user-profile-image img-rounded" />--}}
                            {{--@endif--}}
                        </div>
                    </div>
                </div>
            @elseif(access()->hasRole('OpsManager'))
                <div class="jumbotron">
                    <div class="container">
                        <div class="col-md-6">
                            <h2>Operation Managers Dashboard</h2>
                            <a href="/dashboard/ops" class="btn btn-primary">Back to Dashboard</a>
                            <a href="/dashboard/ops/create" class="btn btn-danger">Add New Event</a>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
            @else
                <div class="jumbotron">
                    <div class="container">
                        <h1>Create Your New CTM Account.</h1>
                        <p>Please complete the information below to create your CTM account, or login above if you have already created one.</p>
                        {{--<p><a class="btn btn-primary btn-lg" href="http://www.ctm.uk.com/join-us/" role="button">New to CTM? Learn more &raquo;</a></p>--}}
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                            New to CTM? Learn more &raquo;
                        </button>
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