@extends('frontend.layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h3>Registration Dropdowns</h3>

        {!! Form::model($list,[
                    'method' => 'PATCH',
                    'route' => ['dashboard.register.hearaboutus-dropdowns.update', $list->id],
                    'class' => 'form-horizontal']) !!}
            <div class="col-md-6">
                <h2>Edit Heard About Us:</h2>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Edit heard about us:</label>
                    <div class="col-sm-5">
                        {!! Form::input('hear_about_us_name', 'hear_about_us_name', null, ['class' => 'form-control']) !!}
                    </div>
                    <input type="submit" class="btn btn-success pull-right" value="Edit">
                </div>

            {!! Form::close() !!}

            </div><!-- col-md-10 -->
    </div><!-- col-md-10 -->

</div><!-- row -->

@endsection