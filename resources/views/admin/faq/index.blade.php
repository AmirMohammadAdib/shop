@extends('admin.layouts.app')

@section('title')
    <title>FAQ - 403</title>
@endsection

@section('head')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@endsection

@section('section_name')
    FAQ
@endsection

@section('content')
    <div class="added_ping">
        <a href="{{ route("faq.create") }}">
            <button>
                add FAQ
            </button>
        </a>
    </div><br>
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Device</th>
                <th>Icon</th>
                <th>Count Of Subset Page</th>
                <th>Settings</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faq as $f)
                <tr>
                    <td>{{ $f->id }}</td>
                    <td>{{ $f->device }}</td>
                    <td><img width="220" src="{{ asset(substr($f->icon, 7)) }}"></td>
                    <td>{{ count(\App\Models\TrainingContent::where("training_id", $f->id)->get()) }}</td>
                    <th>
                        <a href="{{ route("faq.edit", [$f->id]) }}" class="update">
                            <button>Update</button>
                        </a>
                        <a href="{{ route("faq.delete", [$f->id]) }}" class="remove">
                            <button>Delete</button>
                        </a>
                        <a href="{{ route("faq.content.index", [$f->id]) }}" class="update">
                            <button>Add Page</button>
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
