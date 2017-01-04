@extends('frontend.layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
        {!! Form::model($event,[
                    'method' => 'PATCH',
                    'route' => ['dashboard.events.update', $event->id],
                    'class' => 'form-horizontal']) !!}

                <h2>Edit Event:</h2>

            <div class="form-group">
                <label for="inputEmail3" class="col-md-2 control-label">Create Event:</label>
                <div class="col-md-2">
                    <label>Event Name</label>
                    {!! Form::input('event_name', 'event_name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-2">
                    <label>Month of Event</label>
                    {!! Form::input('text', 'month', null, ['class' => 'form-control']) !!}
                </div>
                <div class="checkbox col-md-1">
                    <label></label>
                    <label>
                        <input name="visible" type="checkbox" value="1"> Visible
                    </label>
                </div>
                <div class="col-md-1">
                    <label></label>
                    <input type="submit" class="btn btn-success pull-right" value="Create">
                </div>
            </div>

            {!! Form::close() !!}


    </div><!-- col-md-10 -->

</div><!-- row -->

@endsection