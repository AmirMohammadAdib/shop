@extends('admin.layouts.app')


@section('title')
    <title>Create FAQ - 403</title>
@endsection


@section('section_name')
    Create FAQ
@endsection


@section('content')
    <form action="{{ route("faq.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="lists" style="flex-direction: column">
            <div class="ping-blocks">
                <div class="item-ping">
                    <label for="">Please Choose device</label>
                    <input type="text" name="device" placeholder="device">
                </div>
                <div class="item-ping">
                    <label for="">Please Upload Icon</label>
                    <input type="file" name="icon">
                </div>
            </div>
        </div>
        <br>
        <input type="submit" value="add" id="add_ping">

    </form>


    @include("alerts.warning")
    @include("alerts.success")

@endsection
