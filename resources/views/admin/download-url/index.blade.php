@extends('admin.layouts.app')

@section('section_name')
    download url section
@endsection

@section('head')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@endsection

@section('content')
    <div class="added_ping">
        <a href="{{ route('download.url.create', [$id]) }}">
            <button>
               add link
            </button>
        </a>
    </div><br>
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Url</th>
                <th>Setting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($urls as $url)
                <tr>
                    <td>{{ $url->id }}</td>
                    <td>{{ $url->name }}</td>
                    <td><a style="color: #333" href="{{ $url->url }}">{{ $url->url }}</a></td>
                    <td>
                        <a href="{{ route('download.url.edit', [$url->id]) }}" class="update">
                            <button>Update</button>
                        </a>
                        <a href="{{ route('download.url.delete', [$url->id]) }}" class="remove">
                            <button>Remove</button>
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
