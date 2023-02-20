@extends('admin.layouts.app')


@section('title')
    <title>403 - افزودن راه</title>
@endsection


@section('section_name')
    بخش افزودن راه
@endsection


@section('content')
    <form action="{{ route("crossing.store") }}" method="POST" enctype="multipart/form-data" style="border: 1px solid rgba(89, 88, 88, 0.785); padding: 20px; border-radius: 10px;">
        @csrf
        <div class="lists" style="flex-direction: column">
            <div class="ping-blocks">
                <div class="item-ping" style="width: 100%">
                    <label for="">نام راه</label>
                    <input type="text" placeholder="نام سرویس" name="name">
                </div>
            </div>
        </div>
        <br>
        <input type="submit" value="افزودن" id="add_ping">

    </form>

    @include("alerts.warning")
    @include("alerts.success")

@endsection
