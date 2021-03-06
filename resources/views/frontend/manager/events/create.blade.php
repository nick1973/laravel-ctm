@extends('frontend.layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h3>Create Event</h3>
                {!! Form::open([
                'route' => 'dashboard.events.store',
                'class' => 'form-horizontal'
                ]) !!}

                <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Create Event:</label>
                    <div class="col-md-2">
                        <label>Event Name</label>
                        {!! Form::input('name', 'name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-2">
                        <label>Start Date (dd/mm/yyyy)</label>
                        {!! Form::input('date', 'date', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-2">
                        <label>Postcode</label>
                        {!! Form::input('text', 'postcode', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="checkbox col-md-1">
                        <label></label>
                        <label>
                            <input name="visible" type="checkbox" value="1"> Visible
                        </label>
                    </div>
                    <div class="checkbox col-md-1">
                        <label></label>
                        <label>
                            <input name="csas" type="checkbox" value="1"> CSAS
                        </label>
                    </div>
                    <div class="col-md-1">
                        <label></label>
                        <input type="submit" class="btn btn-success pull-right" value="Create">
                    </div>
                </div>
                {!! Form::close() !!}
        </div>



    </div><!-- col-md-10 -->

    </div><!-- row -->

@endsection