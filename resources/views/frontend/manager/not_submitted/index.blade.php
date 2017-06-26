@extends('frontend.layouts.master')

@section('content')

    <table class="table">
        <tr>
            <th>Payroll</th>
            <th>Name</th>
            <th>Tel No</th>
            <th>User Updated</th>
            <th>Snapshot Created</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->payroll }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->user_updated }}</td>
                <td>{{ $user->snapshot_created }}</td>
            </tr>
        @endforeach

    </table>

@endsection