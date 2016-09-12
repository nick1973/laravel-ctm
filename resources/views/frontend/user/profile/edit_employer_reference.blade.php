@extends('frontend.layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Update Employer Reference</h4>
                </div>

                <div class="panel-body">
                    @foreach($reference as $ref)
                    {{ Form::model($reference, ['route' => ['frontend.user.profile.update_employer_reference', $ref->user_id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files'=>true]) }}

                        <div class="form-group">
                            {{ Form::label('ref_job_title', 'Your Job Title:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('text', 'ref_job_title', $ref->ref_job_title, ['class' => 'form-control', 'placeholder' => 'Your Job Title']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('ref_employed_from', 'Employment From Date:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('date', 'ref_employed_from', $ref->ref_employed_to, ['class' => 'form-control', 'placeholder' => 'Employment From Date']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('ref_employed_to', 'Employment To Date:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('date', 'ref_employed_to', $ref->ref_employed_from, ['class' => 'form-control', 'placeholder' => 'Employment To Date']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('ref_company_name', 'Employer Company Name:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('text', 'ref_company_name', $ref->ref_company_name, ['class' => 'form-control', 'placeholder' => 'Employer Company Name']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('ref_contact', 'Employer Referee Contact:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('text', 'ref_contact', $ref->ref_contact, ['class' => 'form-control', 'placeholder' => 'Employer Referee Contact']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('ref_phone_number', 'Employer Phone Number:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('text', 'ref_phone_number', $ref->ref_phone_number, ['class' => 'form-control', 'placeholder' => 'Employer Phone Number']) }}
                            </div>
                        </div>

                        {{--ADDRESS--}}

                        <div class="form-group">
                            {{ Form::label('ref_employer_address_line_1', 'Number & Street:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('text', 'ref_employer_address_line_1', $ref->ref_employer_address_line_1, ['class' => 'form-control', 'placeholder' => 'Number & Street']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('ref_employer_address_line_2', 'Area / Region:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('text', 'ref_employer_address_line_2', $ref->ref_employer_address_line_2, ['class' => 'form-control', 'placeholder' => 'Area / Region']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('ref_employer_city', 'Town / City:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('text', 'ref_employer_city', $ref->ref_employer_city, ['class' => 'form-control', 'placeholder' => 'Town / City']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('ref_employer_county', 'County:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('text', 'ref_employer_county', $ref->ref_employer_county, ['class' => 'form-control', 'placeholder' => 'County']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('ref_employer_country', 'Country:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('text', 'ref_employer_country', $ref->ref_employer_country, ['class' => 'form-control', 'placeholder' => 'Country']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('ref_employer_postcode', 'Postcode:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('text', 'ref_employer_postcode', $ref->ref_employer_postcode, ['class' => 'form-control', 'placeholder' => 'Postcode']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ Form::submit('Save Employer Reference', ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                        @endforeach

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection