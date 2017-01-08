@extends('frontend.layouts.master')

@section('content')
    
    @if(access()->guest())
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <a href="/data/iphone_generated.jpg">
                    download
                </a>
                
                
                <div class="panel panel-default">
                    <div class="panel-heading">Register <a href="/login" class="btn btn-success"style="margin-left: 500px">Login to Staff Area </a></div>

                    <div class="panel-body">

                        {{ Form::open(['route' => 'auth.register', 'class' => 'form-horizontal']) }}

                        <div class="form-group">
                            {{ Form::label('name', 'First Name', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('name', 'name', null, ['class' => 'form-control', 'placeholder' => 'First Name']) }}
                            </div><!--col-md-6-->
                        </div><!--form-group-->

                        <div class="form-group">
                            {{ Form::label('lastname', 'Last Name', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('lastname', 'lastname', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) }}
                            </div><!--col-md-6-->
                        </div><!--form-group-->

                        <div class="form-group">
                            {{ Form::label('dob', 'Date of Birth', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('date', 'dob', null, ['class' => 'form-control', 'placeholder' => 'Date of Birth']) }}
                            </div><!--col-md-6-->
                        </div><!--form-group-->

                        <div class="form-group">
                            {{ Form::label('land', 'Mobile', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('mobile', 'mobile', null, ['class' => 'form-control', 'placeholder' => 'Mobile']) }}
                            </div><!--col-md-6-->
                        </div><!--form-group-->

                        <div class="form-group">
                            {{ Form::label('email', trans('validation.attributes.frontend.email'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.email')]) }}
                            </div><!--col-md-6-->
                        </div><!--form-group-->

                        <div class="panel panel-danger">
                            <div class="panel-body">
                                {{ $notes->notes }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'How did you hear about us?', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                <select name="heard_about_us" id="heard" class="form-control empty">
                                    <option selected disabled>Please Select</option>
                                    @foreach($list as $res)
                                        <option>{{ $res->hear_about_us_name }}</option>
                                    @endforeach
                                </select>
                            </div><!--col-md-6-->
                        </div><!--form-group-->

                        <div id="uni" class="form-group" style="display: none">
                            {{ Form::label('email', 'Select Your University', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                <select name="uni" class="form-control empty">
                                    {{--<option selected disabled>Please Select</option>--}}
                                    @foreach($unis as $res)
                                        <option>{{ $res->uni_name }}</option>
                                    @endforeach
                                </select>
                            </div><!--col-md-6-->
                        </div><!--form-group-->

                        <div id="others" class="form-group" style="display: none">
                            {{ Form::label('email', 'Please select', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                <select name="promotion" class="form-control empty">
                                    {{--<option selected disabled>Please Select</option>--}}
                                    @foreach($promotions as $res)
                                        <option>{{ $res->promo_name }}</option>
                                    @endforeach
                                </select>
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

                        @if (config('access.captcha.registration'))
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {!! Form::captcha() !!}
                                    {{ Form::hidden('captcha_status', 'true') }}
                                </div><!--col-md-6-->
                            </div><!--form-group-->
                        @endif

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ Form::submit(trans('labels.frontend.auth.register_button'), ['class' => 'btn btn-primary']) }}
                            </div><!--col-md-6-->
                        </div><!--form-group-->

                        {{ Form::close() }}

                    </div><!-- panel body -->

                </div><!-- panel -->

            </div><!-- col-md-8 -->

        </div><!-- row -->
    @endif
    <script>
        $(function() {
            $("#heard").change(function () {
                console.log($(this).val())
                if($(this).val()=='University'){
                    $("#uni").show('fade')
                    $("#others").hide('fade')
                } else {
                    $("#uni").hide('fade')
                    $("#others").show('fade')
                }


            })
        });
    </script>
@endsection

@section('after-scripts-end')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif
@stop