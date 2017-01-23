@extends('frontend.layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Update Address</h4>
                </div>

                <div class="panel-body">

                    {!! Form::open(array('url' => '/profile/get_postcode','class'=>'form-inline')) !!}
                        <div class="form-group">
                            <label class="sr-only">Postcode</label>
                            <p class="form-control-static">Postcode</p>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword2" class="sr-only">Postcode</label>
                            <input type="text" class="form-control" id="postcode" name="postcode" required>
                        </div>
                        <button type="submit" class="btn btn-default">Auto Fill Address</button>
                        {!! Form::close() !!}

                    <br/>
                    {{ Form::model($user, ['route' => ['frontend.user.profile.update_address', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files'=>true]) }}
<!--                    <input name="payroll_export" value="1" hidden>-->
                    <input name="profile_confirmed" value="no" hidden>
                    <div class="form-group hidden">
                        {{ Form::label('dob', 'Date of Birth:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            <?php $dob = (string)$user->dob;  $dobint = (int)$user->dob; ?>
                            @if (strpos($dob, '-')!== false)
                                {{ Form::input('text', 'dob', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
                            @else
                                <input name="dob" class="form-control" value="{{ gmdate("Y-m-d", $dobint) }}" placeholder="yyyy-mm-dd">
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('address_line_1', 'House Number/Name:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'address_line_1', null, ['class' => 'form-control', 'placeholder' => 'House Number/Name']) }}
                        </div>
                    </div>
                    <?php
                    if($address['street']==''){
                        $address['street'] = null;
                    }
                    if($address['town']==''){
                        $address['town'] = null;
                    }
                    if($address['county']==''){
                        $address['county'] = null;
                    }
                    if($address['country']==''){
                        $address['country'] = null;
                    }
                    if($address['postcode']==''){
                        $address['postcode'] = null;
                    }
                    ?>

                    <div class="form-group">
                        {{ Form::label('address_line_2', 'Street:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'address_line_2', $address['street'], ['class' => 'form-control', 'placeholder' => 'Street']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('city', 'Town / City:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'city', $address['town'], ['class' => 'form-control', 'placeholder' => 'Town / City']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('county', 'County:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'county', $address['county'], ['class' => 'form-control', 'placeholder' => 'County']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('country', 'Country:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'country', $address['country'], ['class' => 'form-control', 'placeholder' => 'Country']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('postcode', 'Postcode:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'postcode', $address['postcode'], ['class' => 'form-control', 'placeholder' => 'Postcode']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ Form::submit('Save Address', ['class' => 'btn btn-primary']) }}
                        </div>
                    </div>

                    {{ Form::close() }}

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection