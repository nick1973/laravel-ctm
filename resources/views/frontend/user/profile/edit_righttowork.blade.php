@extends('frontend.layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Update Right to Work / Are You a Student?</h4>
                </div>

                <div class="panel-body">
                    @foreach($rt_work as $ref)
                        {{ Form::model($rt_work, ['route' => ['frontend.user.profile.update_righttowork', $ref->user_id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files'=>true]) }}

                        <div class="col-md-12">
                            <h4>Are you a:</h4>
                            <div class="radio">
                                <label>
                                    <input name="work_status" value="UK Citizen" type="radio" data-toggle="collapse"
                                           <?php if($ref->work_status=='UK Citizen') echo "checked" ?>
                                           data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    UK Citizen
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input name="work_status" value="European National" type="radio" data-toggle="collapse"
                                           <?php if($ref->work_status=='European National') echo "checked" ?>
                                           data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                                    European National
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input name="work_status" value="Non European National" type="radio" data-toggle="collapse"
                                           <?php if($ref->work_status=='Non European National') echo "checked" ?>
                                           data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                                    Non European National
                                </label>
                            </div>

                            <div class="collapse" id="collapseExample">
                                <div class="well">
                                    <h4>UK Citizen</h4>

                                    <p>As you are a UK Citizen you automatically have the right to work in the UK, but you must supply one of the following:</p>
                                    <ul>
                                        <li>(a)	The front cover and photo page of your Passport.; or</li>
                                        <li>(b)	Your birth certificate along with proof of your National Insurance number. You can find this on any document/correspondence from the HMRC or the DWP, your NI Card or a previous payslip.</li>
                                    </ul>
                                    <p>You will be required to upload these documents at the end of the application process.</p>
                                </div>
                            </div>

                            <div class="collapse" id="collapseExample2">
                                <div class="well">
                                    <h4>European National</h4>

                                    <p>As you are a European National, you automatically have the right to work in the UK, but you must supply one of the following:</p>
                                    <li>(a)	The front cover and photo page of your valid Passport;</li>
                                    <li>(b)	Your valid ID card or equivalent.</li>
                                    <br/>
                                    <p>You will be required to upload these documents at the end of the application process.</p>
                                </div>
                            </div>

                            <div class="collapse" id="collapseExample3">
                                <div class="well">
                                    <h4>Non European National</h4>

                                    <p>As you are a Non-European National, you will be required to prove that you have the right to work in the UK. To prove this you can use either option (a) or (b) below: -</p>
                                    <li>(a)	The front page and photo page of your valid Passport along with a valid Visa.</li>
                                    <li>(b)	Valid Work Permit or Residency Document.</li>
                                    <br/>
                                    <p>Please note, if you currently hold a Student Visa and wish to use this as proof of your right to work in the UK, then you will also need to send us a letter from your University confirming your course dates.</p>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 col-lg-4 col-md-4 control-label">
                                Are you a student?
                            </label>
                            <div class="col-sm-1">
                                <div class="onoffswitch">
                                    <input name="student" type="hidden" value="No">
                                    <input type="checkbox" value="Yes" name="student" class="toggleBtn onoffswitch-checkbox" id="on-hold"
                                           onclick="visible(this.id,'ru_student')" <?php if($ref->student=='Yes') echo "checked" ?> >
                                    <label for="on-hold" class="onoffswitch-label">
                                        <div class="onoffswitch-inner"></div>
                                        <div class="onoffswitch-switch"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('teaching_establishment', 'Teaching Establishment Name:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('text', 'teaching_establishment', $ref->teaching_establishment, ['class' => 'form-control', 'placeholder' => 'Your Job Title']) }}
                                {{--{{ Form::input('text', 'student', $ref->teaching_establishment, ['class' => 'hidden', 'value' => 'Yes']) }}--}}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('autumn_term_starts', 'Autumn Term Starts:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('date', 'autumn_term_starts', $ref->autumn_term_starts, ['class' => 'form-control', 'placeholder' => 'Employment From Date']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('autumn_term_ends', 'Autumn Term Ends:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('date', 'autumn_term_ends', $ref->autumn_term_ends, ['class' => 'form-control', 'placeholder' => 'Employment To Date']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('spring_term_starts', 'Spring Term Starts:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('date', 'spring_term_starts', $ref->spring_term_starts, ['class' => 'form-control', 'placeholder' => 'Employer Company Name']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('spring_term_ends', 'Spring Term Ends:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('date', 'spring_term_ends', $ref->spring_term_ends, ['class' => 'form-control', 'placeholder' => 'Employer Referee Contact']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('summer_term_starts', 'Summer Term Starts:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('date', 'summer_term_starts', $ref->summer_term_starts, ['class' => 'form-control', 'placeholder' => 'Employer Phone Number']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('summer_term_ends', 'Summer Term Ends:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('date', 'summer_term_ends', $ref->summer_term_ends, ['class' => 'form-control', 'placeholder' => 'Employer Phone Number']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ Form::submit('Save Right to Work', ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    @endforeach

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
    <script>
        $( document ).ready(function() {
            $('#collapseExample').on('show.bs.collapse', function () {
                $('#collapseExample2').collapse('hide');
                $('#collapseExample3').collapse('hide');
            });
            $('#collapseExample2').on('show.bs.collapse', function () {
                $('#collapseExample').collapse('hide');
                $('#collapseExample3').collapse('hide');
            });
            $('#collapseExample3').on('show.bs.collapse', function () {
                $('#collapseExample2').collapse('hide');
                $('#collapseExample').collapse('hide');
            })
        });
    </script>
@endsection