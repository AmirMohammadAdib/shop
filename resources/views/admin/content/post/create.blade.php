@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد پست</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">سوالات متداول</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد پست</li>
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
                    <a href="{{ route("post.index") }}" class="btn btn-info btn-sm text-white">بازگشت</a>
                </section>

                <section>
                    <form action="" method="">
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عنوان پست</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">دسته والد</label>
                                    <select class="form-control form-control-sm">
                                        <option value="test">test</option>
                                        <option value="test">test</option>
                                        <option value="test">test</option>
                                    </select>
                                </div>
                            </section>
                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="">تصویر</label>
                                    <input type="file" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="">تاریخ انتشار</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="">متن پست</label>
                                    <textarea name="" id="body" cols="30" rows="4"></textarea>
                                </div>
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

    @section("script")
        <script src="{{ asset("admin-asset/ckeditor/ckeditor.js") }}"></script>
        <script>
            CKEDITOR.replace("body")
        </script>
    @endsection
@endsection
