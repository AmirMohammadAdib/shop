@extends('admin.layouts.app')


@section('title')
    <title>403 - add url</title>
@endsection


@section('section_name')
    url section
@endsection


@section('content')
    <form action="{{ route("download.url.update", [$url->id]) }}" method="POST" style="border: 1px solid rgba(89, 88, 88, 0.785); padding: 20px; border-radius: 10px;">
        @csrf
        <div class="lists" style="flex-direction: column">
            <div class="ping-blocks">
                <div class="item-ping">
                    <label for="">name</label>
                    <input type="text" placeholder="name" name="name" value="{{ $url->name }}">
                </div>
                <div class="item-ping">
                    <label for="">url</label>
                    <input type="text" placeholder="url" name="url" value="{{ $url->url }}">
                </div>
            </div>
        </div>
        <br>
        <input type="submit" value="update" id="add_ping">

    </form>

    @include("alerts.warning")
    @include("alerts.success")

@endsection
