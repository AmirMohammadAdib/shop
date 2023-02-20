@extends('admin.layouts.app')

@section('section_name')
    بخش عبور از تحریم
@endsection

@section('head')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@endsection

@section('content')
    <div class="added_ping">
        <a href="{{ route('crossing.create') }}">
            <button>
                افزودن راه عبور از تحریم
            </button>
        </a>
    </div><br>
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Settings</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($crossings as $crossing)
                <tr>
                    <td>{{ $crossing->id }}</td>
                    <td>{{ $crossing->name }}</td>
                    <td>
                        <a href="{{ route('crossing.edit', [$crossing->id]) }}" class="update">
                            <button>Update</button>
                        </a>
                        <a href="{{ route('crossing.delete', [$crossing->id]) }}" class="remove">
                            <button>Delete</button>
                        </a>
                    </td>
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
