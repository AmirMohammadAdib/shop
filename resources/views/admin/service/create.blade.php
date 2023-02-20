@extends('admin.layouts.app')


@section('title')
    <title>403 - افزودن سرویس</title>
@endsection


@section('section_name')
    بخش افزودن سرویس
@endsection


@section('content')
    <form action="{{ route("service.store") }}" method="POST" enctype="multipart/form-data" style="border: 1px solid rgba(89, 88, 88, 0.785); padding: 20px; border-radius: 10px;">
        @csrf
        <div class="lists" style="flex-direction: column">
            <div class="ping-blocks">
                <div class="item-ping">
                    <label for="">نام سرویس</label>
                    <input type="text" placeholder="نام سرویس" name="name">
                </div>
                <div class="item-ping">
                    <label for="">تصویر سرویس</label>
                    <input type="file" placeholder="تصویر سرویس" name="picture">
                </div>
            </div>
            <div class="ping-blocks">
                <div class="item-ping">
                    <label for="">اختصاصی باشد؟</label>
                    <select name="special_level">
                        <option value="1">حتما</option>
                        <option value="0">نیازی نیست</option>
                    </select>
                </div>
                <div class="item-ping">
                    <label for="">آدرس دامین سرویس</label>
                    <input type="text" placeholder="آدرس دامین" name="url">
                </div>
            </div>
        </div>
        <br>
        <input type="submit" value="افزودن" id="add_ping">

    </form>

    @include("alerts.warning")
    @include("alerts.success")

@endsection
