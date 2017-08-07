@extends('frontend.layouts.master')
<?php
    $event_start_date = \Carbon\Carbon::parse($event->event_start_date,'Europe/London');
    $event_end_date = \Carbon\Carbon::parse($event->event_end_date,'Europe/London');
    $ctm_start_date = \Carbon\Carbon::parse($event->ctm_start_date,'Europe/London');
    $ctm_end_date = \Carbon\Carbon::parse($event->ctm_end_date,'Europe/London');
?>
@section('content')
    <div class="row">

        <div class="col-md-12 col-lg-12">
            <h1>Add New Event</h1>
             {{$event_start_date}}
            <div class="col-lg-8">
                {{ Form::model($event, ['route' => ['dashboard.ops.update', $event->id],
            'class' => 'form-horizontal', 'method' => 'PATCH']) }}
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 col-md-3 col-lg-3 control-label">Event Name</label>
                    <div class="col-sm-10 col-md-6 col-lg-6">
                        <input type="text" class="form-control" id="event_name" placeholder="Event Name" name="event_name" value="{{ $event->event_name }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 col-md-3 col-lg-3 control-label">Contract Manager</label>
                    <div class="col-sm-10 col-md-6 col-lg-6">
                        <input type="text" class="form-control" id="contract_manager" placeholder="Contract Manager" name="contract_manager" value="{{ $event->contract_manager }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 col-md-3 col-lg-3 control-label">Operation Manager</label>
                    <div class="col-sm-10 col-md-6 col-lg-6">
                        <input type="text" class="form-control" id="operation_manager" placeholder="Operation Manager" name="operation_manager" value="{{ $event->operation_manager }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 col-md-3 col-lg-3 control-label">Event Start Date</label>
                    <div class="col-sm-10 col-md-5 col-lg-5">
                        <input class="form-control" type="date" name="event_start_date" value="{{$event_start_date->toDateString()}}" required>
                        {{--<div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy"--}}
                             {{--data-date="{{ date_format($date,"d/m/Y") }}">--}}
                            {{--<input name="event_start_date" type="text" class="form-control" value="{{ date_format($event_start_date,"d/m/Y") }}">--}}
                            {{--<div class="input-group-addon">--}}
                                {{--<span class="glyphicon glyphicon-th"></span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 col-md-3 col-lg-3 control-label">Event End Date</label>
                    <div class="col-sm-10 col-md-5 col-lg-5">
                        <input class="form-control" type="date" name="event_end_date" value="{{$event_end_date->toDateString()}}" required>
                        {{--<div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy"--}}
                             {{--data-date="{{ date_format($date,"d/m/Y") }}">--}}
                            {{--<input name="event_end_date" type="text" class="form-control" value="{{ date_format($event_end_date,"d/m/Y") }}">--}}
                            {{--<div class="input-group-addon">--}}
                                {{--<span class="glyphicon glyphicon-th"></span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 col-md-3 col-lg-3 control-label">CTM Start Date</label>
                    <div class="col-sm-10 col-md-5 col-lg-5">
                        <input class="form-control" type="date" name="ctm_start_date" value="{{$ctm_start_date->toDateString()}}" required>
                        {{--<div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy"--}}
                             {{--data-date="{{ date_format($date,"d/m/Y") }}">--}}
                            {{--<input name="ctm_start_date" type="text" class="form-control" value="{{ date_format($ctm_start_date,"d/m/Y") }}">--}}
                            {{--<div class="input-group-addon">--}}
                                {{--<span class="glyphicon glyphicon-th"></span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 col-md-3 col-lg-3 control-label">CTM End Date</label>
                    <div class="col-sm-10 col-md-5 col-lg-5">
                        <input class="form-control" type="date" name="ctm_end_date" value="{{$ctm_end_date->toDateString()}}" required>
                        {{--<div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy"--}}
                             {{--data-date="{{ date_format($date,"d/m/Y") }}">--}}
                            {{--<input name="ctm_end_date" type="text" class="form-control" value="{{ date_format($ctm_end_date,"d/m/Y") }}">--}}
                            {{--<div class="input-group-addon">--}}
                                {{--<span class="glyphicon glyphicon-th"></span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Update <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                    </div>
                </div>
                </form>
            </div>

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection