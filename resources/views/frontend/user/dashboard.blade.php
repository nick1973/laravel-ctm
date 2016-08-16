@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12 col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('navs.frontend.dashboard') }}</div>

                <div class="panel-body">
                    <div role="tabpanel">
                            {{--{{ dd($dirty) }}--}}
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">General
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
                                    <span id="character_reference_tick">
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
                                    <span id="gp2_tick">
                                        <img src="/img/green-tick.png" height="18px">
                                    </span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#eventslist" aria-controls="eventslist" role="tab" data-toggle="tab">Events List</a>
                            </li>
                            <li role="presentation">
                                <a href="#submit" aria-controls="submit" role="tab" data-toggle="tab">Submit Application</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            @include('frontend.includes.myinfo')
                            @include('frontend.includes.address')
                            @include('frontend.includes.reference')
                            @include('frontend.includes.righttowork')
                            @include('frontend.includes.money')
                            @include('frontend.includes.documents')

                            @include('frontend.includes.submit_application')



                            <div role="tabpanel" class="tab-pane" id="reference">


                            </div><!--tab panel reference-->

                        </div><!--tab content-->

                    </div><!--tab panel-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection