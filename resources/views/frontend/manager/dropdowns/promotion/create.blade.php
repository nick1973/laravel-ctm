@extends('frontend.layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-12 col-lg-12">
            <h3>Create Registration Dropdowns</h3>

            <div class="col-md-3">
                {!! Form::open([
                'route' => 'dashboard.register.dropdowns.store'
                ]) !!}

                <div class="form-group col-md-12">
                    {!! Form::label('selection', 'Add a Promotion to the list:', ['class' => 'control-label']) !!}
                    {!! Form::text('promo_name', null, ['class' => 'form-control']) !!}
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