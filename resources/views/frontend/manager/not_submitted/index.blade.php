@extends('frontend.layouts.master')

@section('content')

    <table class="table">
        <tr>
            <th>Payroll</th>
            <th>Name</th>
            <th>Tel No</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->payroll }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->mobile }}</td>
            </tr>
        @endforeach

    </table>

@endsection