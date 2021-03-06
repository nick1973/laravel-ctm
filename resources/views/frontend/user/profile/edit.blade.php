@extends('frontend.layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Update My Information</h4>
                </div>

                <div class="panel-body">

                    {{ Form::model($user, ['route' => 'frontend.user.profile.updates', $user->id, 'class' => 'form-horizontal', 'method' => 'PATCH', 'files'=>true]) }}

                    {{--<div class="form-group">--}}
                        {{--{{ Form::label('photo', 'Photo:', ['class' => 'col-md-4 control-label']) }}--}}
                        {{--<div class="col-md-6">--}}
                            {{--<img width="100px" alt="No Image" src="/{{ $user->photo }}">--}}
                            {{--{!! Form::file('photo', ['class' => 'form-control',]) !!}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <input name="profile_confirmed" value="no" hidden>
                    
                    <div class="form-group">
                        {{ Form::label('title', 'Title:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{--{{ Form::select('title', ['Mr' => 'Mr', 'Mrs' => 'Mrs',--}}
                                                       {{--'Ms' => 'Ms', 'Miss' => 'Miss'], null, ['class' => 'form-control',--}}
                            {{--'id' => 'title'])}}--}}
                            <select id="title" name="title" class="form-control">
                                <option>{{ $user->title }}</option>
                                <option>Mr</option>
                                <option>Mrs</option>
                                <option>Ms</option>
                                <option>Miss</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('name', 'First Name:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('lastname', 'Last Name:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'lastname', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('mobile', 'Mobile No:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'mobile', null, ['class' => 'form-control', 'placeholder' => 'Mobile No']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('land', 'Land/Alternative Number:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'land', null, ['class' => 'form-control', 'placeholder' => 'Land/Alternative Number']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('dob', 'Date of Birth (dd-mm-yyyy):', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            <?php $dob = (string)$user->dob;  $dobint = (int)$user->dob; ?>
                            @if(substr($user->dob,0,1)=='-')

                                <input name="dob" class="form-control" placeholder="dd-mm-yyyy">

                                @elseif (strpos($dob, '-')!== false)
                                    <?php  $year = substr($user->dob,0,4); $day = substr($user->dob,8,2); $month = substr($user->dob,5,2);?>
                                    {{--<td class="required">{{ $day . '-' . $month . '-' . $year }}</td>--}}
                                    <input name="dob" class="form-control" value="{{ $day . '-' . $month . '-' . $year }}">
                                {{--{{ Form::input('text', 'dob', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}--}}

                                @else
                                {{--<input name="dob" class="form-control hidden" value="{{ gmdate("Y-m-d", $dobint) }}" placeholder="yyyy-mm-dd">--}}
                                <input name="dob" class="form-control" value="" placeholder="dd-mm-yyyy">
                            @endif

                        </div>
                    </div>

                    @if ($user->canChangeEmail())
                        <div class="form-group">
                            {{ Form::label('email', 'E-mail Address (this is used as your login username)', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.email')]) }}
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        {{ Form::label('origin', 'Ethnic Origin:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::select('origin', ['White' => 'White', 'Black' => 'Black',
                                                       'Asian' => 'Asian', 'Afro Caribbean' => 'Afro Caribbean',
                                                       'Mixed Race' => 'Mixed Race', 'Other' => 'Other'], null, ['class' => 'form-control',
                            'id' => 'origin'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('gender', 'Gender:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control',
                            'id' => 'gender'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('nationality', 'Nationality:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'nationality', null, ['class' => 'form-control', 'placeholder' => 'Nationality']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('townofbirth', 'Town of Birth:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'townofbirth', null, ['class' => 'form-control', 'placeholder' => 'Town of Birth']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('countryofbirth', 'Country of Birth:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'countryofbirth', null, ['class' => 'form-control', 'placeholder' => 'Country of Birth']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('emergency_contact_name', 'Emergency Contact Name:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'emergency_contact_name', null, ['class' => 'form-control', 'placeholder' => 'Emergency Contact Name']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('emergency_contact_rel', 'Emergency Contact Relationship:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'emergency_contact_rel', null, ['class' => 'form-control', 'placeholder' => 'Emergency Contact Relationship']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('emergency_contact_number', 'Emergency Contact Number:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'emergency_contact_number', null, ['class' => 'form-control', 'placeholder' => 'Emergency Contact Number']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('emergency_contact_mobile', 'Emergency Contact Mobile:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'emergency_contact_mobile', null, ['class' => 'form-control', 'placeholder' => 'Emergency Contact Mobile']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('other_lang', 'Do you speak other languages?', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::select('other_lang', ['No' => 'No', 'Yes' => 'Yes'], null, ['class' => 'form-control',
                            'id' => 'other_lang'])}}
                            {{ Form::input('text', 'lang', null, ['id' => 'lang', 'style' => 'display: none', 'class' => 'form-control', 'placeholder' => 'Other Language']) }}

                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('uk_driving_license', 'Do you have a full UK driving Licence?', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::select('uk_driving_license', ['' => '', 'No' => 'No', 'Yes' => 'Yes'], null, ['class' => 'form-control',
                            'id' => 'uk_driving_license'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('d1', 'Do you have licence to drive D1 vehicles (Minibus)?', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                        <label class="radio-inline">
                            <input type="radio" name="d1" id="" value="Yes" <?php if($user->d1=='Yes') echo "checked" ?>> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="d1" id="" value="No" <?php if($user->d1=='No'||$user->d1!='No') echo "checked" ?>> No
                        </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('nrswa', 'Do you have qualifications under the NRSWA 1991?', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::select('nrswa', ['No' => 'No', 'Yes' => 'Yes'], null, ['class' => 'form-control',
                            'id' => 'nrswa', 'onclick' => 'nrswaHideShow()'])}}
                            <div id="nrswa_info" style="display: none">
                                {{ Form::label('nrswa_date', 'NRSWA Expiry Date', ['class' => 'col-md-6 control-label']) }}
                                {{ Form::input('date', 'nrswa_date', null, ['class' => 'form-control', 'placeholder' => 'Emergency Contact Mobile']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('convictions', 'Do you have any unspent criminal convictions?', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::select('convictions', ['No' => 'No', 'Yes' => 'Yes'], null, ['class' => 'form-control',
                            'id' => 'convictions', 'onclick' => 'conHideShow()'])}}
                            <textarea rows="3" name="convictions_info" id="convictions_info" style="display: none" class="form-control" placeholder="Please list your criminal convictions"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('medical_conditions', 'Do you have any medical conditions we should be aware of?', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::select('medical_conditions', ['No' => 'No', 'Yes' => 'Yes'], null, ['class' => 'form-control',
                            'id' => 'medical_conditions', 'onclick' => 'medicalConditions()'])}}
                            <textarea rows="3" name="medical_conditions_info" id="medical_conditions_info" style="display: none" class="form-control" placeholder="Please list your medical conditions"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ Form::submit('Save My Information', ['class' => 'btn btn-primary']) }}
                        </div>
                    </div>

                    {{ Form::close() }}

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
    <script>
//        $("#email").on("input", function() {
//            alert("Change to " + this.value);
//        });

        $("#other_lang").change(function () {
            var val = $(this).val();
            if(val === "Yes") {
                //console.log(val);
                $("#lang").show('fade').attr('required');
            }
            else if(val === "No"){
                console.log(val);
                $("#lang").hide('fade').removeAttr('required');
            }
        });
        function medicalConditions() {
            $("#medical_conditions").change(function () {
                var val = $(this).val();
                if(val === "Yes") {
                    //console.log(val);
                    $("#medical_conditions_info").show('fade').attr('required');
                }
                else if(val === "No"){
                    console.log(val);
                    $("#medical_conditions_info").hide('fade').removeAttr('required');
                }
            });
        }

        function conHideShow() {
            $("#convictions").change(function () {
                var val = $(this).val();
                if(val === "Yes") {
                    console.log(val);
                    $("#convictions_info").show('fade');
                }
                else if(val === "No"){
                    console.log(val);
                    $("#convictions_info").hide('fade');
                }
            });
        }

        function nrswaHideShow() {
            $("#nrswa").change(function () {
                var val = $(this).val();
                if(val === "Yes") {
                    console.log(val);
                    $("#nrswa_info").show('fade');
                }
                else if(val === "No"){
                    console.log(val);
                    $("#nrswa_info").hide('fade');
                }
            });
        }
    </script>
@endsection