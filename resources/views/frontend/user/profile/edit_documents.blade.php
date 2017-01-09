@extends('frontend.layouts.master')

@section('content')
    @foreach($rt_work as $ref)
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Upload Documents</h4>
                </div>
                <div class="panel-body">
                    {{--<button class="btn btn-default" onclick="goBack()">Back</button>--}}
                    <h4>Once you have uploaded your documents click 'Back' to view them. <a href="/dashboard#documents" class="btn btn-success">Back</a></h4>

                    @if($user->d1=="Yes")
                        <div class="form-group col-md-12">
                            {{--{{ Form::label('passport_photo', 'Passport Style Photo:', ['class' => 'col-md-4 control-label']) }}--}}
                            <div class="col-md-4">
                                <h3>D1 Driving License Photo:</h3>
                            </div>
                            <div class="col-md-6">
                                <form action="update_license_photo/{{ $user->id }}"
                                      method="post"
                                      class="dropzone well well-lg"
                                      id="driving_photo">
                                    {{ csrf_field() }}
                                    <div class="dz-default dz-message">
                                        <h3>Click or drag and drop your D1 driving license photo here!</h3>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif

                    <div class="form-group col-md-12">
                        {{--{{ Form::label('passport_photo', 'Passport Style Photo:', ['class' => 'col-md-4 control-label']) }}--}}
                        <div class="col-md-4">
                            <h3>Passport Style Photo:</h3>
                        </div>
                        <div class="col-md-6">
                            <form action="update_passport_photo/{{ $user->id }}"
                                  method="post"
                                  class="dropzone well well-lg"
                                  id="passportPhoto">
                                {{ csrf_field() }}
                                <div class="dz-default dz-message">
                                    <h3>Click or drag and drop your passport photo here!</h3>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if($ref->work_status=='European National' || $ref->work_status=='Non European National')
                        {{--<h2>Please provide documents from both group A and B.</h2>--}}
                    @else
                        <h2>Please provide documents from either group A or B.</h2>
                    @endif
                    <hr>
                    @if($ref->work_status=='UK Citizen')
                        <h3>Group A:</h3>
                    @endif
                    <div class="form-group col-md-12">
                        <div class="col-md-4">
                            @if($ref->work_status=='UK Citizen')
                                <h3>Photo Page of Passport:</h3>
                            @elseif($ref->work_status=='European National')
                                <h3>Photo Page of Passport:</h3>
                            @elseif($ref->work_status=='Non European National')
                                <h3>Photo Page of Passport & Visa:</h3>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <form action="update_passport_photo_page/{{ $user->id }}"
                                  method="post"
                                  class="dropzone well well-lg"
                                  id="my-awesome-dropzone">
                                {{ csrf_field() }}
                                <div class="dz-default dz-message">
                                    <h3>Click or drag and drop a Photo of your photo page of passport here!</h3>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if($ref->work_status=='UK Citizen')
                        <h3>Group B:</h3>
                    @endif
                    <hr>
                    @if($ref->work_status=='UK Citizen')
                        <div class="form-group col-md-12">
                            <div class="col-md-4">
                                <h3>Birth Certificate:</h3>
                            </div>
                            <div class="col-md-6">
                                <form action="update_birth_cert/{{ $user->id }}"
                                      method="post"
                                      class="dropzone well well-lg"
                                      id="my-awesome-dropzone">
                                    {{ csrf_field() }}
                                    <div class="dz-default dz-message">
                                        <h3>Click or drag and drop a Photo of your Birth Certificate here!</h3>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                    <div class="form-group col-md-12">
                        <div class="col-md-4">
                            @if($ref->work_status=='UK Citizen')
                                <h3>National Insurance Document / Card:</h3>
                            @elseif($ref->work_status=='European National')
                                    <h3>ID Card:</h3>
                                @elseif($ref->work_status=='Non European National')
                                        <h3>Work Permit:</h3>
                                @endif
                        </div>
                        <div class="col-md-6">
                            <form action="update_ni_card/{{ $user->id }}"
                                  method="post"
                                  class="dropzone well well-lg"
                                  id="my-awesome-dropzone">
                                {{ csrf_field() }}
                                <div class="dz-default dz-message">
                                    <h3>Click or drag and drop a Photo of your National Insurance Document / Card here!</h3>
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
    @endforeach
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