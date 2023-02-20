@extends('admin.layouts.app')


@section('title')
    <title>403 - افزودن راه</title>
@endsection


@section('section_name')
    بخش افزودن راه
@endsection


@section('content')
    <form action="{{ route("crossing.service.store", [$id]) }}" method="POST" enctype="multipart/form-data" style="border: 1px solid rgba(89, 88, 88, 0.785); padding: 20px; border-radius: 10px;">
        @csrf
        <div class="lists" style="flex-direction: column">
            <div class="ping-blocks">
                <div class="item-ping" style="width: 100%">
                    <label for="">نام راه</label>
                    <select name="crossing_id" id="">
                        @foreach ($crossings as $crossing)
                            <option value="{{ $crossing->id }}">{{ $crossing->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <br>
        <input type="submit" value="افزودن" id="add_ping">
    </form>

    @include("alerts.warning")
    @include("alerts.success")

@endsection
