@extends('frontend.layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Update Address</h4>
                </div>

                <div class="panel-body">

                    {{ Form::model($user, ['route' => ['frontend.user.profile.update_address', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH', 'files'=>true]) }}

                    <div class="form-group">
                        {{ Form::label('account_name', 'Account Holder\'s Name:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'account_name', null, ['class' => 'form-control', 'placeholder' => 'Account Holder\'s Name']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('account_sort_code', 'Account Number:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'account_sort_code', null, ['class' => 'form-control', 'placeholder' => 'Account Number']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('account_number', 'Sort Code:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'account_number', null, ['class' => 'form-control', 'placeholder' => 'Sort Code']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('ni_number', 'National Insurance Number:', ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::input('text', 'ni_number', null, ['class' => 'form-control', 'placeholder' => 'National Insurance Number']) }}
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