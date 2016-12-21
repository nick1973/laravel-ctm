@extends('frontend.layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Update Character Reference</h4>
                </div>

                <div class="panel-body">
                    {!! Form::open(array('url' => '/profile/get_postcode_ref_char','class'=>'form-inline')) !!}
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
                    @foreach($reference as $ref)
                        <?php
                        if($address['street']==''){
                            $address['street'] = $ref->ref_character_address_line_2;
                        }
                        if($address['town']==''){
                            $address['town'] = $ref->ref_character_city;
                        }
                        if($address['county']==''){
                            $address['county'] = $ref->ref_character_county;
                        }
                        if($address['country']==''){
                            $address['country'] = $ref->ref_character_country;
                        }
                        if($address['postcode']==''){
                            $address['postcode'] = $ref->ref_character_postcode;
                        }
                        ?>
                    {{ Form::model($reference, ['route' => ['frontend.user.profile.update_employer_reference', $ref->user_id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files'=>true]) }}
                    {{--ADDRESS--}}
                    <div class="form-group">
                        {{ Form::label('ref_character_address_line_1', 'Number:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'ref_character_address_line_1', $ref->ref_character_address_line_1, ['class' => 'form-control', 'placeholder' => 'Number & Street']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('ref_character_address_line_2', 'Street:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'ref_character_address_line_2', $address['street'], ['class' => 'form-control', 'placeholder' => 'Area / Region']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('ref_character_city', 'Town / City:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'ref_character_city', $address['town'], ['class' => 'form-control', 'placeholder' => 'Town / City']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('ref_character_county', 'County:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'ref_character_county', $address['county'], ['class' => 'form-control', 'placeholder' => 'County']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('ref_character_country', 'Country:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'ref_character_country', $address['country'], ['class' => 'form-control', 'placeholder' => 'Country']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('ref_character_postcode', 'Postcode:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'ref_character_postcode', $address['postcode'], ['class' => 'form-control', 'placeholder' => 'Postcode']) }}
                        </div>
                    </div>

                        {{--info--}}
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