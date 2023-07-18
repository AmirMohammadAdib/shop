@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد مشتری</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">مشتریان</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد مشتری</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        مشتریان
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route("customer.index") }}" class="btn btn-info btn-sm text-white">بازگشت</a>
                </section>

                <section>
                    <form action="" method="">
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">ایمیل</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">شماره تلفن</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="">نام</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="">نام خانوادگی</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="">کلمه عبور</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="">تکرار کلمه عبور</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="">وضعیت کاربر</label>
                                    <select name="" class="form-control form-control-sm" id="">
                                        <option value="test">test</option>
                                        <option value="test">test</option>
                                    </select>
                                </div>
                            </section>
                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="">پروفایل</label>
                                    <input type="file" class="form-control form-control-sm" name="" id="">
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
@endsection
