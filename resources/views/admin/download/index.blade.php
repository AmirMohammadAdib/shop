@extends('admin.layouts.app')

@section('section_name')
    download section
@endsection

@section('head')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@endsection

@section('content')
    <div class="added_ping">
        <a href="{{ route('download.create') }}">
            <button>
               add platform
            </button>
        </a>
    </div><br>
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Device</th>
                <th>Name</th>
                <th>Picture</th>
                <th>Color</th>
                <th>Setting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($downloads as $download)
                <tr>
                    <td>{{ $download->id }}</td>
                    <td>{{ $download->device }}</td>
                    <td>{{ $download->name }}</td>
                    <td><img src="{{ $download->picture }}" width="110px"></td>
                    <td><div style="background-color: {{ $download->color }}; width: 35px; height: 35px; border-radius: 50%; box-shadow: 0px 10px 25px {{ $download->color }};"></div></td>
                    <td>
                        <a href="{{ route('download.url.index', [$download->id]) }}" class="update">
                            <button>Add Url</button>
                        </a>
                        <a href="{{ route('download.delete', [$download->id]) }}" class="remove">
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
