@extends('admin.layouts.app')


@section('title')
    <title>FAQ Content Create - 403</title>
@endsection


@section('section_name')
    FAQ Content Create
@endsection


@section('content')
    <form action="{{ route("faq.content.update", [$content->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="lists" style="flex-direction: column">
            <div class="ping-blocks">
                <div class="item-ping">
                    <label for="">Please Write Text</label>
                    <textarea name="text" placeholder="Text">{{ $content->text }}</textarea>
                </div>
                <div class="item-ping">
                    <label for="">Please Upload Picture</label>
                    <input type="file" name="picture"><br><br>
                    <img src="{{ asset(substr($content->picture, 7)) }}">
                </div>
            </div>
            <div class="ping-blocks">
                <div class="item-ping" style="width: 100%">
                    <label for="">Please Choose Type</label>
                    <select name="type">
                      <option value="dns" {{ $content->type == "dns" ? "selected" : "" }}>dns</option>
                      <option value="Special service" {{ $content->type == "Special service" ? "selected" : "" }}>Special service</option>
                    </select>
                </div>
            </div>
        </div>
        <br>
        <input type="submit" value="add" id="add_ping">

    </form>


    @include("alerts.warning")
    @include("alerts.success")

@endsection

