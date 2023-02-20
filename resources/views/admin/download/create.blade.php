@extends('admin.layouts.app')


@section('title')
    <title>403 - add device od downlaod</title>
@endsection


@section('section_name')
     download section
@endsection


@section('content')
    <form action="{{ route("download.store") }}" method="POST" enctype="multipart/form-data" style="border: 1px solid rgba(89, 88, 88, 0.785); padding: 20px; border-radius: 10px;">
        @csrf
        <div class="lists" style="flex-direction: column">
            <div class="ping-blocks">
                <div class="item-ping">
                    <label for="">device</label>
                    <input type="text" placeholder="device" name="device">
                </div>
                <div class="item-ping">
                    <label for="">name</label>
                    <input type="text" placeholder="name" name="name">
                </div>
            </div>
            <div class="ping-blocks">
                <div class="item-ping">
                    <label for="">device picture</label>
                    <input type="file" name="picture">
                </div>
                <div class="item-ping">
                    <label for="">organizational color of device</label>
                    <input type="color" name="color" value="#2A67EF">
                </div>
            </div>
        </div>
        <br>
        <input type="submit" value="add" id="add_ping">

    </form>

    @include("alerts.warning")
    @include("alerts.success")

@endsection
