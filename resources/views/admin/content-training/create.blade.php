@extends('admin.layouts.app')


@section('title')
    <title>Training Content Create - Didban</title>
@endsection


@section('section_name')
    Training Content Create
@endsection


@section('content')
    <form action="{{ route("training.content.store", [$training_id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="lists" style="flex-direction: column">
            <div class="ping-blocks">
                <div class="item-ping">
                    <label for="">Please Write Text</label>
                    <textarea name="text" placeholder="Text"></textarea>
                </div>
                <div class="item-ping">
                    <label for="">Please Upload Picture</label>
                    <input type="file" name="picture">
                </div>
            </div>
            <div class="ping-blocks">
                <div class="item-ping" style="width: 100%">
                    <label for="">Please Choose Type</label>
                    <select name="type">
                      <option value="dns">dns</option>
                      <option value="Ping reduction service">Ping reduction service</option>
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

