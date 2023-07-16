@extends('admin.layouts.master')

@section('head-tag')
    <title>نمایش نظرات</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">نظرات</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">نمایش نظرها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نظرات
                    </h5>
                </section>

                <section class="card mb-3">
                    <section class="card-header text-white bg-custom-yello">
                        امیر ادیب - 482
                    </section>
                    <section class="card-body">
                        <h5 class="card-title">مشخصات کالا: گوشی سامسونگ مدل m31 کد 234 کد کالا: 482</h5>
                        <p class="card-text">گوشی خوبیه ولی به نظر وزن زیادی داره!!!</p>
                    </section>
                </section>
                <form action="" method="">
                    <section class="col-12">
                        <label for="">پاسخ ادمین</label>
                        <textarea class="form-control form-control-sm" rows="4"></textarea>
                    </section>
                    <section class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                    </section>
                </form>
            </section>
        </section>
    </section>
@endsection
