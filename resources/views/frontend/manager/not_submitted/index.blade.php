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
            <?php
                    $user_updated = \Carbon\Carbon::parse($user->user_updated)->format('d-m-Y');
                    $snapshot_created = \Carbon\Carbon::parse($user->snapshot_created)->format('d-m-Y');
                    ?>
            <tr>
                <td>{{ $user->payroll }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user_updated }}</td>
                <td>{{ $snapshot_created }}</td>
            </tr>
        @endforeach

    </table>

@endsection