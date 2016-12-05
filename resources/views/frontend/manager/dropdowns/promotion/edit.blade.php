@extends('frontend.layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h3>Registration Dropdowns</h3>

        {!! Form::model($promotion,[
                    'method' => 'PATCH',
                    'route' => ['dashboard.register.dropdowns.update', $promotion->id],
                    'class' => 'form-horizontal']) !!}
            <div class="col-md-6">
                <h2>Edit Promotion:</h2>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Edit Promotion:</label>
                    <div class="col-sm-5">
                        {!! Form::input('promo_name', 'promo_name', null, ['class' => 'form-control']) !!}
                    </div>
                    <input type="submit" class="btn btn-success pull-right" value="Edit">
                </div>

            {!! Form::close() !!}

            </div><!-- col-md-10 -->
    </div><!-- col-md-10 -->

</div><!-- row -->

@endsection