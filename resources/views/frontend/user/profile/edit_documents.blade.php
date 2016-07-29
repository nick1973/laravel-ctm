@extends('frontend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Upload Documents</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('passport_photo', 'Passport Style Photo:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            <form action="upload_documents"
                                  method="post"
                                  class="dropzone well well-lg"
                                  id="my-awesome-dropzone">
                                {{ csrf_field() }}
                                <div class="dz-default dz-message">
                                    <h4>Please drop your passport photo here!</h4>
                                </div>
                            </form>
                        </div>
                    </div>
                    <h4>Please provide documents from either group A or B.</h4>
                    <hr>
                    <h4>Group A:</h4>
                    <div class="form-group col-md-12">
                        {{ Form::label('passport_photo_page', 'Photo Page of Passport:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-12">
                            <form action="upload_documents"
                                  method="post"
                                  class="dropzone well well-lg"
                                  id="my-awesome-dropzone">
                                {{ csrf_field() }}
                                <div class="dz-default dz-message">
                                    <h4>Please drop your photo page of passport here!</h4>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <h4>Group B:</h4>
                    <div class="form-group">
                        {{ Form::label('birth_cert', 'Birth Certificate:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{--<img width="100px" alt="No Image" src="/{{ $user->photo }}">--}}
                            {!! Form::file('birth_cert', ['class' => 'form-control',]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('ni_card', 'National Insurance Document / Card:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{--<img width="100px" alt="No Image" src="/{{ $user->photo }}">--}}
                            {!! Form::file('ni_card', ['class' => 'form-control',]) !!}
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
@endsection