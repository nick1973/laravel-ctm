@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('labels.frontend.user.profile.update_information') }}</div>

                <div class="panel-body">

                    {{ Form::model($user, ['route' => 'frontend.user.profile.update', 'class' => 'form-horizontal', 'method' => 'PATCH', 'files'=>true]) }}

                    <div class="form-group">
                        {{ Form::label('title', 'title', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('photo', 'Photo', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            <img width="100px" alt="No Image" src="http://localhost/public/male.png">
                            {!! Form::file('photo', ['class' => 'form-control',]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('name', 'First Name', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('lastname', 'Last Name', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'lastname', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('dob', 'Date of Birth', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('date', 'dob', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
                        </div>
                    </div>

                    @if ($user->canChangeEmail())
                        <div class="form-group">
                            {{ Form::label('email', trans('validation.attributes.frontend.email'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.email')]) }}
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ Form::submit(trans('labels.general.buttons.save'), ['class' => 'btn btn-primary']) }}
                        </div>
                    </div>

                    {{ Form::close() }}

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection