@extends('frontend.layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-12 col-lg-12">
            <h3>Registration Dropdowns</h3>

            <div class="col-md-3">
                {{--<a href="{{ route('admin.dropdown_management.create') }}" class="btn btn-warning">Add to LOB</a>--}}
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="visible-lg" colspan="2">Heard about us List</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hear_about_us as $results)
                        <tr>
                            {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['dashboard.register.hearaboutus-dropdowns.destroy', $results->id]
                            ]) !!}
                            <td>
                                {{ $results->hear_about_us_name }}
                            </td>
                            <td width="150px">
                                <a href="{{ route('dashboard.register.hearaboutus-dropdowns.edit', $results->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            </td>
                        </tr>
                    {!! Form::close() !!}
                    @endforeach
                </table>
                <a href="{{ route('dashboard.register.hearaboutus-dropdowns.create') }}" class="btn btn-warning">Add to Heard about us</a>
            </div>

            <div class="col-md-3">
                {{--<a href="{{ route('admin.dropdown_management.create') }}" class="btn btn-warning">Add to LOB</a>--}}
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="visible-lg" colspan="2">Promotions List</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($promotions as $results)
                        <tr>
                            {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['dashboard.register.dropdowns.destroy', $results->id]
                            ]) !!}
                            <td>
                                {{ $results->promo_name }}
                            </td>
                            <td width="150px">
                                <a href="{{ route('dashboard.register.dropdowns.edit', $results->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            </td>
                        </tr>
                    {!! Form::close() !!}
                    @endforeach
                </table>
                <a href="{{ route('dashboard.register.dropdowns.create') }}" class="btn btn-warning">Add to Promotions</a>
            </div>

            <div class="col-md-3">
                {{--<a href="{{ route('admin.dropdown_management.create') }}" class="btn btn-warning">Add to LOB</a>--}}
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="visible-lg" colspan="2">University List</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($uni as $results)
                        <tr>
                            {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['dashboard.register.uni-dropdowns.destroy', $results->id]
                            ]) !!}
                            <td>
                                {{ $results->uni_name }}
                            </td>
                            <td width="150px">
                                <a href="{{ route('dashboard.register.uni-dropdowns.edit', $results->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            </td>
                        </tr>
                    {!! Form::close() !!}
                    @endforeach
                </table>
                <a href="{{ route('dashboard.register.uni-dropdowns.create') }}" class="btn btn-warning">Add to Uni's</a>
            </div>
            {!! Form::model($notes,[
                    'method' => 'PATCH',
                    'route' => ['dashboard.register.reg-notes.update', $notes->id],
                    'class' => 'form-horizontal']) !!}
                <div class="col-md-12">
                    <h3>Registration Notes</h3>
                    <textarea name="notes" class="form-control" rows="6">{{ $notes->notes }}</textarea>
                    <br/>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Save Notes">
                    </div>
                </div>
            {!! Form::close() !!}
        </div>



    </div><!-- col-md-10 -->

    </div><!-- row -->

@endsection
{{--TEXT--}}
<?php
//require '../app/textlocal.class.php';
//
//$textlocal = new Textlocal('jemma@ctm.uk.com','', 'ccUfPpurJas-sUlwgsQwtus4X7WNaUXdcam3jMKL1L');
//
//$numbers = array(447443509229);
//$sender = 'CTM\'s New App';
//$message =  'Test';
//
//$response = $textlocal->sendSms($numbers, $message, $sender);
//print_r($response);


//?>