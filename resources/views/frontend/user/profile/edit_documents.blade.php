@extends('frontend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Upload Documents</h4>
                </div>
                <div class="panel-body">
                    {{--<button class="btn btn-default" onclick="goBack()">Back</button>--}}
                    <h4>Once you have uploaded your documents click 'Back' to return <a href="/dashboard#documents" class="btn btn-success">Back</a></h4>

                    <div class="form-group col-md-12">
                        {{ Form::label('passport_photo', 'Passport Style Photo:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            <form action="update_passport_photo/{{ $user->id }}"
                                  method="post"
                                  class="dropzone well well-lg"
                                  id="passportPhoto">
                                {{ csrf_field() }}
                                <div class="dz-default dz-message">
                                    <h4>Click or drag and drop your passport photo here!</h4>
                                </div>
                            </form>
                        </div>
                    </div>
                    <h2>Please provide documents from either group A or B.</h2>
                    <hr>
                    <h3>Group A:</h3>
                    <div class="form-group col-md-12">
                        {{ Form::label('passport_photo_page', 'Photo Page of Passport:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            <form action="update_passport_photo_page/{{ $user->id }}"
                                  method="post"
                                  class="dropzone well well-lg"
                                  id="my-awesome-dropzone">
                                {{ csrf_field() }}
                                <div class="dz-default dz-message">
                                    <h4>Click or drag and drop a Photo of your photo page of passport here!</h4>
                                </div>
                            </form>
                        </div>
                    </div>
                    <h3>Group B:</h3>
                    <hr>
                    <div class="form-group col-md-12">
                        {{ Form::label('birth_cert', 'Birth Certificate:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            <form action="update_birth_cert/{{ $user->id }}"
                                  method="post"
                                  class="dropzone well well-lg"
                                  id="my-awesome-dropzone">
                                {{ csrf_field() }}
                                <div class="dz-default dz-message">
                                    <h4>Click or drag and drop a Photo of your Birth Certificate here!</h4>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        {{ Form::label('ni_card', 'National Insurance Document / Card:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            <form action="update_ni_card/{{ $user->id }}"
                                  method="post"
                                  class="dropzone well well-lg"
                                  id="my-awesome-dropzone">
                                {{ csrf_field() }}
                                <div class="dz-default dz-message">
                                    <h4>Click or drag and drop a Photo of your National Insurance Document / Card here!</h4>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<div class="col-md-6 col-md-offset-4">--}}
                            {{--{{ Form::submit('Save My Information', ['class' => 'btn btn-primary']) }}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div><!--panel body-->
            </div><!-- panel -->
        </div><!-- col-md-10 -->
    </div><!-- row -->
    <script>
        Dropzone.options.passportPhoto = {
            init: function() {
                this.on("success", function(file) { alert("Success file uploaded!"); });
            },
            maxFilesize: 4,
            acceptedFiles: '.jpg, .jpeg, .png',
            addRemoveLinks: true
        };
    </script>

@endsection