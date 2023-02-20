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
        <a href="{{ route('crossing.service.create', [$id]) }}">
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
            @foreach ($crossings_services as $crossings_service)
                <tr>
                    <td>{{ $crossings_service->id }}</td>
                    <td>{{ \App\Models\CrossingSanctions::find($crossings_service->crossing_id)->name }}</td>
                    <td>
                        <a href="{{ route('crossing.service.edit', [$crossings_service->id]) }}" class="update">
                            <button>Update</button>
                        </a>
                        <a href="{{ route('crossing.service.delete', [$crossings_service->id]) }}" class="remove">
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
