@extends('admin.layouts.app')

@section('title')
    <title>Requests - 403</title>
@endsection

@section('head')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@endsection

@section('section_name')
    Request
@endsection

@section('content')
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Name service</th>
                <th>Request</th>
                <th>User ip</th>
                <th>Settings</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->service_name }}</td>
                    <td><p>{{ $request->request }}</p></td>
                    <td>{{ $request->user_ip }}</td>
                    <th>
                        <a href="{{ route("request.change.status", [$request->id]) }}" class="update">
                            <button>Seen, don't show again</button>
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
