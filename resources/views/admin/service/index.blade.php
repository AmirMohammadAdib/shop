@extends('admin.layouts.app')

@section('section_name')
    بخش سرویس
@endsection

@section('head')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@endsection

@section('content')
    <div class="added_ping">
        <a href="{{ route('service.create') }}">
            <button>
                افزودن سرویس
            </button>
        </a>
    </div><br>
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Picture</th>
                <th>Special Level</th>
                <th>Crossing</th>
                <th>Url</th>
                <th>Subset URLs</th>
                <th>Settings</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td><img src="{{ $service->picture }}" width="100"></td>
                    <td>{{ $service->special_picture }}</td>
                    <td>#</td>
                    <td>{{ $service->url == "" ? "-" : $service->url }}</td>
                    <td><?php $urls = \App\Models\UrlService::where("service_id", $service->id)->get(); foreach($urls as $url){echo "<a href='" . route("service.url.delete", [$url->id]) . "' style='color: #333'>" . $url->url . "</a>" . " - ";} ?></td>
                    <td>
                        <a href="{{ route('service.edit', [$service->id]) }}" class="update">
                            <button>Update</button>
                        </a>
                        <a href="{{ route('service.delete', [$service->id]) }}" class="remove">
                            <button>Delete</button>
                        </a>
                        <a href="{{ route('crossing.service.index', [$service->id]) }}" class="update">
                            <button>Add Crossing</button>
                        </a>
                        <a href="{{ route('service.url', [$service->id]) }}" class="update">
                            <button>Add Url</button>
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
