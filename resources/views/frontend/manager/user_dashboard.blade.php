@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12 col-lg-12">

            <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>{{ $user->name }} {{ $user->lastname }}'s profile</h4>
                    </div>
                <div class="panel-body">
                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
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
                                <a href="#reference" aria-controls="reference" role="tab" data-toggle="tab">Reference Details
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
                            {{--<li role="presentation">--}}
                                {{--<a href="#money" aria-controls="money" role="tab" data-toggle="tab">The Money Bit--}}
                                    {{--<span id="account_tick">--}}
                                        {{--<img src="/img/green-tick.png" height="18px">--}}
                                    {{--</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            <li role="presentation">
                                <a href="#documents" aria-controls="documents" role="tab" data-toggle="tab">Upload Your Documents
                                    <span id="documents_tick">
                                        <img src="/img/green-tick.png" height="18px">
                                    </span></a>
                            </li>
                            <li role="presentation">
                                <a href="#confirm_profile" aria-controls="confirm_profile" role="tab" data-toggle="tab">Confirm Profile</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            @include('frontend.manager.includes.myinfo')
                            @include('frontend.manager.includes.address')
                            @include('frontend.manager.includes.reference')
                            @include('frontend.manager.includes.righttowork')
                            {{--@include('frontend.manager.includes.money')--}}
                            @include('frontend.manager.includes.documents')
                            @include('frontend.manager.includes.confirm_profile')

                            <div role="tabpanel" class="tab-pane" id="reference">


                            </div><!--tab panel reference-->

                        </div><!--tab content-->

                    </div><!--tab panel-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection