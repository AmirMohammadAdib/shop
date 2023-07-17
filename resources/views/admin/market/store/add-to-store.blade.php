@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد انبار</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">انبار</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد انبار</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        انبار
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route("store.index") }}" class="btn btn-info btn-sm text-white">بازگشت</a>
                </section>

                <section>
                    <form action="" method="">
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام تحویل گیرنده</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام تحویل دهنده</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="">تعداد</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>

                            <section class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="">توضیحات</label>
                                    <textarea name="" id="" class="form-control" rows="4"></textarea>
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
