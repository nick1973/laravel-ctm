@extends('frontend.layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-12 col-lg-12">
            <h3>Event List</h3>

            <div class="col-md-8">
                <a href="{{ route('dashboard.events.create') }}" class="btn btn-warning">Add an Event</a>
                </br>
                {{--<a href="{{ route('admin.dropdown_management.create') }}" class="btn btn-warning">Add to LOB</a>--}}
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="visible-lg" colspan="">Events</th>
                        <th class="visible-lg" colspan="">Visible</th>
                        <th class="visible-lg" colspan="">Start Date</th>
                        <th class="visible-lg" colspan="2">Postcode</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $results)
                        <tr>
                            {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['dashboard.events.destroy', $results->id]
                            ]) !!}
                            <td>{{ $results->name }}</td>
                            <td>
                                @if($results->visible==1)
                                    Visible
                                    @else
                                    Not Visible
                                    @endif
                            </td>
                            <td>{{ $results->date }}</td>
                            <td>{{ $results->postcode }}</td>
                            <td width="150px">
                                <a href="{{ route('dashboard.events.edit', $results->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            </td>
                        </tr>
                    {!! Form::close() !!}
                    @endforeach
                </table>
                <a href="{{ route('dashboard.events.create') }}" class="btn btn-warning">Add an Event</a>
            </div>







    </div><!-- col-md-10 -->

    </div><!-- row -->

@endsection

