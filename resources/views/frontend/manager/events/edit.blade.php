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
                <label for="inputEmail3" class="col-md-2 control-label">Edit Event:</label>
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
                        @if($event->visible==0)
                            <input name="visible" value="0" hidden>
                            <input name="visible" type="checkbox" value="1"> Visible
                        @else
                            <input name="visible" value="0" hidden>
                            <input name="visible" type="checkbox" value="1" checked> Visible
                            @endif
                    </label>
                </div>
                <div class="checkbox col-md-1">
                    <label></label>
                    <label>
                        @if($event->csas==0)
                            <input name="csas" value="0" hidden>
                            <input name="csas" type="checkbox" value="1"> CSAS
                        @else
                            <input name="csas" value="0" hidden>
                            <input name="csas" type="checkbox" value="1" checked> CSAS
                        @endif
                    </label>
                </div>
                <div class="col-md-1">
                    <label></label>
                    <input type="submit" class="btn btn-success pull-right" value="Edit Event">
                </div>
            </div>

            {!! Form::close() !!}


    </div><!-- col-md-10 -->

</div><!-- row -->

@endsection