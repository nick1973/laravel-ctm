@extends('frontend.layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-12 col-lg-12">
            <h3>Create How You Heard About Us Dropdowns</h3>

            <div class="col-md-3">
                {!! Form::open([
                'route' => 'dashboard.register.hearaboutus-dropdowns.store'
                ]) !!}

                <div class="form-group col-md-12">
                    {!! Form::label('hear_about_us_name', 'Add a hear about us to the list:', ['class' => 'control-label']) !!}
                    {!! Form::text('hear_about_us_name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-md-12">
                    <br>
                    {!! Form::submit('Add New', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>

        </div>



    </div><!-- col-md-10 -->

    </div><!-- row -->

@endsection