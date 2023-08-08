@extends('Layout.header')
@section('content')
<div class="card" style="width: 50rem;">
    <div class="card-header">
        <b>User Profile</b>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <tr>
                <th> User ID:</th>
                <td> {{ auth()->user()->api_user_id }}</td>
            </tr>
            <tr>
                <th> First Name:</th>
                <td> {{ auth()->user()->first_name }}</td>
            </tr>
            <tr>
                <th> Last Name:</th>
                <td> {{ auth()->user()->last_name }} </td>
            </tr>
            <tr>
                <th> Email:</th>
                <td> {{ auth()->user()->email }} </td>
            </tr>
            <tr>
                <th> Gender:</th>
                <td> {{ auth()->user()->gender }} </td>
            </tr>
            <tr>
                <th> Active:</th>
                <td> <span class="badge {{ auth()->user()->is_active ? 'text-bg-success': 'text-bg-danger' }} ">{{ auth()->user()->is_active ? 'Yes' : 'No' }}</span> </td>
            </tr>
        </table>
    </div>
</div>
@endsection