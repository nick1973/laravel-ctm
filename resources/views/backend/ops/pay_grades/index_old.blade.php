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
            <h2>Pay Grades</h2>
            <h4>Add New Grade <a href="pay_grade/create"><i class="fa fa-plus-square fa-2x" aria-hidden="true"></i></a></h4>

            <table class="table table-hover table-responsive">
                <thead>
                <tr>
                    <th>Role</th>
                    <th>Pay</th>
                    <th>Leeway</th>
                    <th>Training</th>
                    <th>Accreditation</th>
                    <th>Charge p/h</th>
                    <th>Margin p/h</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($pay_grades as $pay_grade)
                        <tr>
                            <td>{{ $pay_grade->role }}</td>
                            <td>{{ $pay_grade->pay }}</td>
                            <td>{{ $pay_grade->leeway }}</td>
                            <td>{{ $pay_grade->training }}</td>
                            <td>{{ $pay_grade->accreditation }}</td>
                            <td>{{ $pay_grade->charge_per_hour }}</td>
                            <td>{{ $pay_grade->margin }}</td>
                            <td><a class="btn btn-primary" href="/admin/ops/pay_grade/{{ $pay_grade->id }}/edit">Edit</a></td>
                            <td>
                                {!! Form::model($pay_grade,[
                                 'method' => 'DELETE',
                                 'route' => ['admin.ops.pay_grade.destroy', $pay_grade->id],
                                 'id' => 'delete_pay_grade']) !!}
                                <button type="submit" class='btn btn-danger'><span class="fa fa-times"></span> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div><!--box box-success-->

@endsection