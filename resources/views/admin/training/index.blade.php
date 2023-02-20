@extends('admin.layouts.app')

@section('title')
    <title>Trainings - Didban</title>
@endsection

@section('head')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@endsection

@section('section_name')
    Trainings
@endsection

@section('content')
    <div class="added_ping">
        <a href="{{ route("training.create") }}">
            <button>
                add Training
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
            @foreach ($trainings as $training)
                <tr>
                    <td>{{ $training->id }}</td>
                    <td>{{ $training->device }}</td>
                    <td><img width="220" src="{{ asset($training->icon) }}"></td>
                    <td>{{ count(\App\Models\TrainingContent::where("training_id", $training->id)->get()) }}</td>
                    <th>
                        <a href="{{ route("training.edit", [$training->id]) }}" class="update">
                            <button>Update</button>
                        </a>
                        <a href="{{ route("training.delete", [$training->id]) }}" class="remove">
                            <button>Delete</button>
                        </a>
                        <a href="{{ route("training.content.index", [$training->id]) }}" class="update">
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
