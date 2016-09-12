@extends('backend.layouts.master')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.backend.dashboard.title') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('strings.backend.dashboard.welcome') }} {{ access()->user()->name }}!</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <h2>Add New Pay Grades</h2>
            {{ Form::model($pay_grade, ['route' => ['admin.ops.pay_grade.update', $pay_grade->id],
            'class' => 'form-horizontal', 'method' => 'PATCH', 'files'=>true, 'onKeyUp' => 'calc()']) }}
            {{--{{ Form::open(['route' => 'admin.ops.pay_grade.store', 'class' => 'form-horizontal', 'onKeyUp' => 'calc()']) }}--}}
            <div class="col-lg-4 col-md-4">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-5 col-lg-5 col-md-6 control-label">Role</label>
                    <div class="col-sm-5 col-lg-5 col-md-5">
                        <input type="text" class="form-control" id="" placeholder="Role" name="role" value="{{ $pay_grade->role }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-5 col-lg-5 col-md-6 control-label">Pay</label>
                    <div class="col-sm-5 col-lg-5 col-md-5">
                        <input type="text" class="form-control" id="pay" placeholder="Pay" name="pay" value="{{ $pay_grade->pay }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-5 col-lg-5 col-md-6 control-label">Charge p/h</label>
                    <div class="col-sm-5 col-lg-5 col-md-5">
                        <input type="text" class="form-control" id="charge" placeholder="Charge p/h" name="charge_per_hour" value="{{ $pay_grade->charge_per_hour }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-5 col-lg-5 col-md-6 control-label">Margin p/h</label>
                    <div class="col-sm-5 col-lg-5 col-md-5">
                        <input type="text" class="form-control" id="margin" placeholder="Margin p/h" name="margin" value="{{ $pay_grade->margin }}" readonly>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-5 col-lg-5 col-md-6 control-label">Leeway</label>
                    <div class="col-sm-5 col-lg-5 col-md-5">
                        <input type="text" class="form-control" id="leeway" placeholder="Leeway" name="leeway" value="{{ $pay_grade->leeway }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-5 col-lg-5 col-md-6 control-label">Training</label>
                    <div class="col-sm-5 col-lg-5 col-md-5">
                        <input type="text" class="form-control" id="training" placeholder="Training" name="training" value="{{ $pay_grade->training }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-5 col-lg-5 col-md-6 control-label">Accreditation</label>
                    <div class="col-sm-5 col-lg-5 col-md-5">
                        <input type="text" class="form-control" id="acc" placeholder="Accreditation" name="accreditation" value="{{ $pay_grade->accreditation }}">
                    </div>
                </div>

            </div>

            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                    <button type="submit" class="btn btn-primary">Save <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                </div>
            </div>
            </form>

        </div><!-- /.box-body -->
    </div><!--box box-success-->

    <script>
        $( document ).ready(function() {
            calc();

        });

        function calc() {
            var pay = $('#pay').val();
            var leeway = $('#leeway').val();
            var training = $('#training').val();
            var acc = $('#acc').val();
            var charge = (+leeway + +training + +acc) * 1.138 / 70 * 100;
            var margin = ((charge - pay - (pay*0.138)) / charge) * 100;
            $('#charge').val(charge.toFixed(2));
            if(isNaN(margin)){
                margin = 0;
            }
            $('#margin').val(margin.toFixed(0) + '%');
        }

    </script>


@endsection