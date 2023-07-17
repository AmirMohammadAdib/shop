@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد کالا</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">کالا</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        کالا
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route("product.index") }}" class="btn btn-info btn-sm text-white">بازگشت</a>
                </section>

                <section>
                    <form action="" method="">
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام کالا</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام دسته</label>
                                    <select name="" id="" class="form-control form-control-sm">
                                        <option value="">test</option>
                                        <option value="">test</option>
                                    </select>
                                </div>
                            </section>
                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="">فرم کالا</label>
                                    <select name="" id="" class="form-control form-control-sm">
                                        <option value="">test</option>
                                        <option value="">test</option>
                                    </select>
                                </div>
                            </section>
                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="">تصویر کالا</label>
                                    <input type="file" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="">قیمت کالا</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="">وزن</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>
                            <section class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="">توضیحات</label>
                                    <textarea name="" id="body" cols="30" rows="6" class="form-control"></textarea>
                                </div>
                            </section>
                            <section class="col-12 mt-3 border-top border-bottom py-3">
                                <section class="row  mb-3">
                                    <section class="col-md-3 col-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm" name="" placeholder="ویژگی">
                                        </div>
                                    </section>
                                    <section class="col-md-3 col-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm" name="" placeholder="مقدار">
                                        </div>
                                    </section>
                                </section>

                                <section>
                                    <button type="button" class="btn btn-success btn-sm">افزودن</button>
                                </section>
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
@endsection

@section("script")
    <script src="{{ asset("admin-asset/ckeditor/ckeditor.js") }}"></script>
    <script>
        CKEDITOR.replace("body")
    </script>
@endsection
