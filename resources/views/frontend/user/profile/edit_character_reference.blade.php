@extends('frontend.layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Update Character Reference</h4>
                </div>

                <div class="panel-body">
                    @foreach($reference as $ref)
                    {{ Form::model($reference, ['route' => ['frontend.user.profile.update_employer_reference', $ref->user_id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files'=>true]) }}

                    <div class="form-group">
                        {{ Form::label('ref_char_name', 'Character Referee Name:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'ref_char_name', $ref->ref_char_name, ['class' => 'form-control', 'placeholder' => 'Character Referee Name']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('ref_char_how_know', 'How do you know your Character Referee?:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'ref_char_how_know', $ref->ref_char_how_know, ['class' => 'form-control', 'placeholder' => 'How do you know your Character Referee?']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('ref_char_company', 'Character Referee Company:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'ref_char_company', $ref->ref_char_company, ['class' => 'form-control', 'placeholder' => 'Character Referee Company']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('ref_char_phone_number', 'Character Referee Phone Number:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'ref_char_phone_number', $ref->ref_char_phone_number, ['class' => 'form-control', 'placeholder' => 'Character Referee Phone Number']) }}
                        </div>
                    </div>

                    {{--ADDRESS--}}

                    <div class="form-group">
                        {{ Form::label('ref_character_address_line_1', 'Number & Street:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'ref_character_address_line_1', $ref->ref_character_address_line_1, ['class' => 'form-control', 'placeholder' => 'Number & Street']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('ref_character_address_line_2', 'Area / Region:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'ref_character_address_line_2', $ref->ref_character_address_line_2, ['class' => 'form-control', 'placeholder' => 'Area / Region']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('ref_character_city', 'Town / City:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'ref_character_city', $ref->ref_character_city, ['class' => 'form-control', 'placeholder' => 'Town / City']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('ref_character_county', 'County:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'ref_character_county', $ref->ref_character_county, ['class' => 'form-control', 'placeholder' => 'County']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('ref_character_country', 'Country:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'ref_character_country', $ref->ref_character_country, ['class' => 'form-control', 'placeholder' => 'Country']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('ref_character_postcode', 'Postcode:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'ref_character_postcode', $ref->ref_character_postcode, ['class' => 'form-control', 'placeholder' => 'Postcode']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ Form::submit('Save Character Reference', ['class' => 'btn btn-primary']) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                    @endforeach
                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection