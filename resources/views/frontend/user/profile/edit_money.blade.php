@extends('frontend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Your Bank Details</h4>
                </div>
                <div class="panel-body">
                    {{ Form::model($user, ['route' => ['frontend.user.profile.update_bank', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH',
                                            'id' => 'addressForm']) }}
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
<!--                    <input name="payroll_export" value="1" hidden>-->
                    <div class="form-group">
                        {{ Form::label('account_name', 'Account Holder\'s Name:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'account_name', null, ['class' => 'form-control', 'placeholder' => 'Account Holder\'s Name']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('account_number', 'Account Number:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                                <input id="account_number" name="account_number" max="8" type="text" value=""
                                       class="form-control" placeholder="Account Number">
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('account_sort_code', 'Sort Code:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            <input id="sortcode_number" name="account_sort_code" type="text" value=""
                                   class="form-control" placeholder="Sort Code">
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('ni_number', 'National Insurance Number:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            <input id="ni_number" name="ni_number" type="text" value=""
                                   class="form-control" placeholder="NI Number">
                        </div>
                    </div>
                    <h4>Read all the following statements carefully and select the one box that applies to you.</h4>
                    <div class="radio">
                        <label>
                            {{ Form::radio('job_status', 'A') }}
                            {{--<input type="radio" name="job_status" id="optionsRadios1" value="A">--}}
                            This is my first job since last 6 April and I have not been receiving taxable Jobseeker's Allowance,
                            Employment and Support Allowance or taxable Incapacity Benefit or a state or occupational pension.
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            {{ Form::radio('job_status', 'B') }}
                            {{--<input type="radio" name="job_status" id="optionsRadios2" value="B">--}}
                            This is now my only job, but since last 6 April I have had another job,
                            or have received taxable Jobseeker's Allowance,
                            Employment and Support Allowance or taxable Incapacity Benefit. I do not receive a state or occupational pension.
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            {{ Form::radio('job_status', 'C') }}
                            {{--<input type="radio" name="job_status" id="optionsRadios3" value="C">--}}
                            I have another job or receive a state or occupational pension.
                        </label>
                    </div>

                    <h4>In addition to the above please tick box below if it applies to you.</h4>
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('student_loan', 'D') }}
                            {{--<input type="checkbox" name="job_status" id="" value="D">--}}
                            If you left a course of Higher Education before last 6 April and received your first
                            Student Loan instalment on or after 1 September 1998 and you have not fully repaid your Student Loan,
                            tick box D. (If you are required to repay your Student Loan through your bank or building society account do not tick box D).
                        </label>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{--{{ Form::submit('Save Details', ['class' => 'btn btn-primary']) }}--}}
                        </div>
                    </div>

                    {{ Form::close() }}

                    <button id="checkAccount" class="btn btn-primary">Save Details</button>

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection