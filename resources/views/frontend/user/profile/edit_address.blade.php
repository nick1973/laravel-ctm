@extends('frontend.layouts.master')

@section('content')
    <?php
    $url = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=le91rr&key='.$apikey);
    $json = json_decode($url);

            foreach ($json->results as $result)
                {
                    foreach ($result->address_components as $obj)
                        {
                            $address[] = [
                                    $obj->long_name
                            ];
                        }
                }
                print_r($address);
    ?>

    <script>
        $( document ).ready(function() {
            console.log( "ready!" );

            $("button").click(function(){
                $.getJSON("https://maps.googleapis.com/maps/api/geocode/json?address=le91rr&key={{$apikey}}", function(result){
                    $.each(result, function(i, field){
                        $("div").append(field + " ");
                    });
                });
            });
        });
    </script>

    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Update Address</h4>
                </div>

                <div class="panel-body">
                    <button id="buttonAddress">Click</button>
                    <div id="postcodeAdd">Address</div>

                    {{ Form::model($user, ['route' => ['frontend.user.profile.update_address', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files'=>true]) }}

                    <div class="form-group">
                        {{ Form::label('address_line_1', 'Number & Street:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'address_line_1', null, ['class' => 'form-control', 'placeholder' => 'Number & Street']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('address_line_2', 'Area / Region:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'address_line_2', null, ['class' => 'form-control', 'placeholder' => 'Area / Region']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('city', 'Town / City:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'city', null, ['class' => 'form-control', 'placeholder' => 'Town / City']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('county', 'County:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'county', null, ['class' => 'form-control', 'placeholder' => 'County']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('country', 'Country:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'country', null, ['class' => 'form-control', 'placeholder' => 'Country']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('postcode', 'Postcode:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'postcode', null, ['class' => 'form-control', 'placeholder' => 'Postcode']) }}
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