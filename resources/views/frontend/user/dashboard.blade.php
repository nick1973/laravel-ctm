@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12 col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                        <h1>Welcome to your profile {{ access()->user()->name }}.
                            <button style="vertical-align: middle;" type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#myModal">
                            New to CTM? Learn more &raquo;
                            </button>
                        </h1>
                    <h3>You can create, view and edit your profile here.
                        <?php $photo = ''; ?>
                        @if(access()->user()->photo)
                            <?php $photo =  substr(access()->user()->photo,14);  ?>
                            <img src="/volume-1/{{ $photo }}" alt="{{ access()->user()->name }}" title="{{ access()->user()->name }}" height="100px" class="img-rounded pull-right">
                        @else
                            {{--<img src="{{ access()->user()->picture }}" title="{{ access()->user()->name }}" class="user-profile-image img-rounded" />--}}
                        @endif
                    </h3>
                </div>

                <div class="panel-body">
                    <div role="tabpanel">
                            {{--{{ dd($dirty) }}--}}
                        <!-- Nav tabs -->
                        <ul id="myTab" class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">General Info
                                    <span id="myInfo">
                                        <img src="/img/green-tick.png" height="18px">
                                    </span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#address" aria-controls="address" role="tab" data-toggle="tab">Address
                                    <span id="address_tick">
                                        <img src="/img/green-tick.png" height="18px">
                                    </span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#reference" aria-controls="reference" role="tab" data-toggle="tab">References
                                    <span id="reference_tick">
                                        <img src="/img/green-tick.png" height="18px">
                                    </span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#righttowork" aria-controls="righttowork" role="tab" data-toggle="tab">Right To Work
                                    <span id="righttowork_tick" class="hidden">
                                        <img src="/img/green-tick.png" height="18px">
                                    </span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#money" aria-controls="money" role="tab" data-toggle="tab">The Money Bit
                                    <span id="account_tick">
                                        <img src="/img/green-tick.png" height="18px">
                                    </span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#documents" aria-controls="documents" role="tab" data-toggle="tab">Upload Your Docs
                                    <span id="gp1_tick">
                                        <img src="/img/green-tick.png" height="18px">
                                    </span>
                                    {{--<span id="gp2_tick">--}}
                                        {{--<img src="/img/green-tick.png" height="18px">--}}
                                    {{--</span>--}}
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#events" aria-controls="submit" role="tab" data-toggle="tab">Events</a>
                            </li>
                            {{--<li role="presentation">--}}
                                {{--<a href="#eventslist" aria-controls="eventslist" role="tab" data-toggle="tab">Events List</a>--}}
                            {{--</li>--}}
                            @if($user->profile_confirmed=="" || $user->profile_confirmed=="No" || $user->profile_confirmed=="no")
                                <li role="presentation">
                                    <a href="#submit" aria-controls="submit" role="tab" data-toggle="tab">Submit Application</a>
                                </li>
                            @endif
                            {{--@if($user->profile_confirmed=="Yes")--}}

                            {{--@endif--}}
                        </ul>

                        <div class="tab-content">

                            @include('frontend.includes.myinfo')
                            @include('frontend.includes.address')
                            @include('frontend.includes.reference')
                            @include('frontend.includes.righttowork')
                            @include('frontend.includes.money')
                            @include('frontend.includes.documents')

                            @include('frontend.includes.submit_application')
                            @include('frontend.includes.events')



                            <div role="tabpanel" class="tab-pane" id="reference">


                            </div><!--tab panel reference-->

                        </div><!--tab content-->

                    </div><!--tab panel-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection