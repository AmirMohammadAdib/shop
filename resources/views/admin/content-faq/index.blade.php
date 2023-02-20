@extends('admin.layouts.app')

@section('title')
    <title>FAQ Content - 403</title>
@endsection

@section('head')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@endsection

@section('section_name')
    FAQ Content
@endsection

@section('content')
    <div class="added_ping">
        <a href="{{ route("faq.content.create", [$faq_id]) }}">
            <button>
                add FAQ Content
            </button>
        </a>
    </div><br>
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Text</th>
                <th>Picture</th>
                <th>Training</th>
                <th>Current Page</th>
                <th>Type</th>
                <th>Settings</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contents as $content)
                <tr>
                    <td>{{ $content->id }}</td>
                    <td>{{ $content->text }}</td>
                    <td><img width="200" src="{{ asset($content->picture) }}" /></td>
                    <td>{{ \App\Models\FAQ::find($content->faq_id)->device }}</td>
                    <td>{{ $content->current_page }}</td>
                    <td>{{ $content->type }}</td>
                    <th>
                        <a href="{{ route("faq.content.edit", [$content->id]) }}" class="update">
                            <button>Update</button>
                        </a>
                        <a href="{{ route("faq.content.delete", [$content->id]) }}" class="remove">
                            <button>Delete</button>
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
