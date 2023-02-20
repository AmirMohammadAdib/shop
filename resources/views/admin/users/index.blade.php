@extends('admin.layouts.app')

@section('title')
    <title>Users - 403</title>
@endsection

@section('head')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@endsection

@section('section_name')
    Users
@endsection

@section('content')
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>User name</th>
                <th>Email</th>
                <th>Confrim Code</th>
                <th>Status</th>
                <th>Role</th>
                <th>Created at</th>
                <th>Settings</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->confrim_code }}</td>
                    <td>{{ $user->status == "enable" ? "Active" : "InActive" }}</td> 
                    <td>{{ $user->rule == "0" ? "Normal user" : "Admin" }}</td>
                    <td>{{ $user->created_at }}</td>
                    <th>
                        <a href="{{ route("user.change.status", [$user->id]) }}" class="update">
                            <button>Change status</button>
                        </a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
        <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
        </script>
@endsection
