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
                    <label for="inputEmail3" class="col-sm-5 col-lg-5 col-md-6 control-label">Market Rate</label>
                    <div class="col-sm-5 col-lg-5 col-md-5">
                        <input type="text" class="form-control" id="market_rate" placeholder="Market Rate" name="market_rate"
                               value="{{ $pay_grade->market_rate }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-5 col-lg-5 col-md-6 control-label">Base Pay</label>
                    <div class="col-sm-5 col-lg-5 col-md-5">
                        <input type="text" class="form-control" id="base_pay" placeholder="Pay" name="base_pay" value="{{ $pay_grade->base_pay }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-5 col-lg-5 col-md-6 control-label">Holiday Pay</label>
                    <div class="col-sm-5 col-lg-5 col-md-5">
                        <input type="text" class="form-control" id="hol_pay" placeholder="Holiday Pay" name="hol_pay" value="{{ $pay_grade->hol_pay }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-5 col-lg-5 col-md-6 control-label">Pension</label>
                    <div class="col-sm-5 col-lg-5 col-md-5">
                        <input type="text" class="form-control" id="pension" placeholder="Pension" name="pension" value="{{ $pay_grade->pension }}" >
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-5 col-lg-5 col-md-6 control-label">NIRS</label>
                    <div class="col-sm-5 col-lg-5 col-md-5">
                        <input type="text" class="form-control" id="nirs" placeholder="NIRS" name="nirs" value="{{ $pay_grade->nirs }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-5 col-lg-5 col-md-6 control-label">Uniform</label>
                    <div class="col-sm-5 col-lg-5 col-md-5">
                        <input type="text" class="form-control" id="uniform" placeholder="Uniform" name="uniform" value="{{ $pay_grade->uniform }}">
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

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-5 col-lg-5 col-md-6 control-label">Charge p/h</label>
                    <div class="col-sm-5 col-lg-5 col-md-5">
                        <input type="text" class="form-control" id="charge_per_hour" placeholder="Charge p/h" name="charge_per_hour" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-5 col-lg-5 col-md-6 control-label">Margin</label>
                    <div class="col-sm-5 col-lg-5 col-md-5">
                        <input type="text" class="form-control" id="margin" placeholder="Margin" name="margin" >
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
            var basePay = $('#base_pay').val();
            var holPay = $('#base_pay').val()*0.1207;
            var pension = $('#pension').val();
            var nirs = (+holPay + +basePay) * 0.138;
            var uniform = $('#uniform').val();
            var training = $('#training').val();
            var acc = $('#acc').val();
            var marketRate = $('#market_rate').val();
            var chargePerHour = (+basePay + +holPay + +pension + +nirs + +uniform + +training + +acc)
            //var charge = (+holPay + +pension + +training + +acc) * 1.138 / 70 * 100;
            //var margin = ((chargePerHour - basePay - (basePay*0.138)) / chargePerHour) * 100;
            var margin = ((marketRate - chargePerHour ) / marketRate) * 100;

//            if(isNaN(margin)){
//                margin = 0;
//            }
            $('#hol_pay').val(holPay.toFixed(2));
            $('#charge_per_hour').val(chargePerHour.toFixed(2));
            $('#nirs').val(nirs.toFixed(2));
            $('#margin').val(margin.toFixed(0) + '%');
        }

    </script>


@endsection