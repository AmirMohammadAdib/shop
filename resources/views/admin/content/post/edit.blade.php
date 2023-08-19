@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد پست</title>
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.css">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">پست ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش پست</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        پست ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('post.index') }}" class="btn btn-info btn-sm text-white">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('post.update', [$post]) }}" method="POST" enctype="multipart/form-data" id="form">
                        @csrf
                        @method("PUT")
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="title">عنوان پست</label>
                                    <input type="text" class="form-control form-control-sm" name="title"
                                        value="{{ old('title', $post->title) }}" id="title">
                                </div>
                                @error('title')
                                    <span class="alert_require bg-danger text-white py-1 px-3" role="alert"
                                        style="border-radius: 0 0 0.5rem 0.5rem; font-weight: 100">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="image">تصویر</label>
                                    <input type="file" class="form-control form-control-sm" name="image"
                                        id="image">
                                </div>
                                @error('image')
                                    <span class="alert_require bg-danger text-white py-1 px-3" role="alert"
                                        style="border-radius: 0 0 0.5rem 0.5rem; font-weight: 100">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror

                                <section class="row">
                                    @php
                                        $number = 1;
                                    @endphp
                                    @foreach ($post->image['indexArray'] as $key => $value)
                                        <section class="col-md-{{ 6 / $number }} mt-3">
                                            <div class="form-check">
                                                <input type="radio" name="currentImage" class="form-check-input" id="{{ $number }}" value="{{ $key }}" {{ $post->image['currentImage'] == $key ? "checked" : "" }}>
                                                <label for="{{ $number }}" class="form-check-label mx-2">
                                                    <img src="{{ asset($value) }}" class="w-100" alt="">
                                                </label>
                                            </div>
                                        </section>
                                    @php
                                        $number ++;
                                    @endphp
                                    @endforeach
                                </section>
                            </section>

                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="">وضعیت</label>
                                    <select name="status" id="" class="form-control form-control-sm">
                                        <option value="0" {{ old('status', $post->status) == 0 ? 'selected' : '' }}>غیرفعال</option>
                                        <option value="1" {{ old('status', $post->status) == 1 ? 'selected' : '' }}>فعال</option>
                                    </select>
                                </div>
                                @error('status')
                                    <span class="alert_require bg-danger text-white py-1 px-3" role="alert"
                                        style="border-radius: 0 0 0.5rem 0.5rem; font-weight: 100">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="">امکان درج کامنت</label>
                                    <select name="commentable" id="" class="form-control form-control-sm">
                                        <option value="0" {{ old('commentable', $post->commentable) == 0 ? 'selected' : '' }}>غیرفعال
                                        </option>
                                        <option value="1" {{ old('commentable', $post->commentable) == 1 ? 'selected' : '' }}>فعال
                                        </option>
                                    </select>
                                </div>
                                @error('commentable')
                                    <span class="alert_require bg-danger text-white py-1 px-3" role="alert"
                                        style="border-radius: 0 0 0.5rem 0.5rem; font-weight: 100">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="category_id">دسته والد</label>
                                    <select class="form-control form-control-sm" name="category_id" id="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? "selected" : "" }}>{{ $category->name }}</option>                                            
                                        @endforeach
                                    </select>
                                </div>
                            </section>

                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="published_at_view">تاریخ انتشار</label>
                                    <input type="text" class="form-control form-control-sm" id="published_at_view">
                                    <input type="text" class="form-control form-control-sm d-none" name="published_at" id="published_at">
                                    @error("published_at")
                                    <span class="alert_require bg-danger text-white py-1 px-3" role="alert" style="border-radius: 0 0 0.5rem 0.5rem; font-weight: 100">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </section>

                            <section class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden" class="form-control form-control-sm" name="tags" id="tags" value="{{ old("tags", $post->tags) }}">
                                    <select class="select2 form-control form-control-sm" id="select_tags" multiple></select>
                                </div>
                                @error("tags")
                                <span class="alert_require bg-danger text-white py-1 px-3" role="alert" style="border-radius: 0 0 0.5rem 0.5rem; font-weight: 100">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="summary">خلاصه</label>
                                    <textarea class="form-control form-control-sm" name="summary" id="summary">{{ old('summary', $post->summary) }}</textarea>
                                </div>
                                @error('summary')
                                    <span class="alert_require bg-danger text-white py-1 px-3" role="alert"
                                        style="border-radius: 0 0 0.5rem 0.5rem; font-weight: 100">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="body">بدنه</label>
                                    <textarea class="form-control form-control-sm" name="body" id="body">{{ old('body', $post->body) }}</textarea>
                                </div>
                                @error('body')
                                    <span class="alert_require bg-danger text-white py-1 px-3" role="alert"
                                        style="border-radius: 0 0 0.5rem 0.5rem; font-weight: 100">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@section('script')
    <script src="{{ asset('admin-asset/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.js"></script>
    <script type="text/javascript" src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.js"></script>
    <script>
        CKEDITOR.replace("body")
        CKEDITOR.replace("summary")
    </script>
    
    <script>
        $(document).ready(function(){
            $("#published_at_view").persianDatepicker({
                format: "YYYY/MM/DD",
                altField: "#published_at"
            })
        })
    </script>

    <script>
        $(document).ready(function(){
            var tags_input = $("#tags")
            var select_tags = $("#select_tags")
            var default_tags = $("#tags").val()
            var default_data = null;

            if(tags_input.val() != null && tags_input.val().length > 0){
                default_data = default_tags.split(",")
            }

            select_tags.select2({
                tags: true,
                data: default_data
            })

            select_tags.children('option').attr('selected', true).trigger("change");

            $('#form').submit(function ( event ) {
                if(select_tags.val() !== null && select_tags.val().length > 0){
                    var selectedSource = select_tags.val().join(',')
                    tags_input.val(selectedSource)
                }
            })
        })
    </script>
@endsection
@endsection
