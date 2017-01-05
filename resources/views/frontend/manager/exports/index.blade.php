@extends('frontend.layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-12 col-lg-12">
            <h3>Exports</h3>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Generated Exports:</h4>
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover table-bordered dashboard-table">
                        <tr>
                            <th width="33%">File Name</th>
                            <th width="33%">{{ trans('labels.frontend.user.profile.created_at') }}</th>
                            <th width="33%">{{ trans('labels.frontend.user.profile.last_updated') }}</th>
                        </tr>
                        @foreach($files as $file)
                            <tr>
                                <td><a href="{{ \Illuminate\Support\Facades\Storage::url('app/docs/'.$file) }}">{{ $file }}</a></td>
                                <td></td>
                                <td></td>
                                {{--@endif--}}
                                {{--<td><a href="/dashboard/manager/{{ $file->id }}">{{ $file->name }} {{ $file->lastname }}</a></td>--}}
                                {{--<td>{{ $file->created_at }} ({{ $file->created_at->diffForHumans() }})</td>--}}
                                {{--<td>{{ $file->updated_at }} ({{ $file->updated_at->diffForHumans() }})</td>--}}
                            </tr>
                        @endforeach
                    </table>
                </div><!--panel body-->
            </div><!-- panel -->
        </div><!-- col-md-10 -->
    </div><!-- row -->

@endsection