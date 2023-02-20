@extends('admin.layouts.app')


@section('title')
    <title>403 - افزودن دامین</title>
@endsection


@section('section_name')
    بخش افزودن دامین
@endsection


@section('content')
    <form action="{{ route("service.url.store", [$id]) }}" method="POST" style="border: 1px solid rgba(89, 88, 88, 0.785); padding: 20px; border-radius: 10px;">
        @csrf
        <div class="lists" style="flex-direction: column">
            <h3 style="text-align: right; font-family: 'kalameh_light'; color: red;">دامین را بصورت کامل و صحیح وارد کنید</h3>
            <h2 style="text-align: right; font-family: 'kalameh_light'; opacity: 0.7; color: red; font-size: 18px;">Example: https://www.google.com</h2><br>
            <div class="ping-blocks">
                <div class="item-ping" style="width: 100%; position: relative;">
                    <label for="">دامین سرویس</label>
                    <input type="text" placeholder="دامین سرویس" name="url">
                    <div style="position: absolute; top: 32px; left: 22px; direction: ltr; font-family: 'vazir';"><p>https://www.</p></div>
                </div>
            </div>
        </div>
        <br>
        <input type="submit" value="افزودن" id="add_ping">

    </form>

    @include("alerts.warning")
    @include("alerts.success")

@endsection
