@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد نقش</title>
    <style>
        p{
            margin: 0;
            font-size: 14px;
            margin-right: 0.4rem;
        }

        .selected-item{
            display: flex;
            flex-direction: row-reverse;
            align-items: center;
            justify-content: flex-end;
        }
    </style>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">نقش ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد نقش</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نقش ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route("role.index") }}" class="btn btn-info btn-sm text-white">بازگشت</a>
                </section>

                <section>
                    <form action="" method="">
                        <section class="row border-bottom pb-4">
                            <section class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="">عنوان نقش</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="">توضیح نقش</label>
                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                        <section class="row pt-3">
                            <section class="col-6 col-md-3 selected-item my-2">
                                <p>نمایش دسته جدید</p>
                                <input type="checkbox" name="" id="">
                            </section>
                            <section class="col-6 col-md-3 selected-item my-2">
                                <p>نمایش دسته جدید</p>
                                <input type="checkbox" name="" id="">
                            </section>
                            <section class="col-6 col-md-3 selected-item my-2">
                                <p>نمایش دسته جدید</p>
                                <input type="checkbox" name="" id="">
                            </section>
                            <section class="col-6 col-md-3 selected-item my-2">
                                <p>نمایش دسته جدید</p>
                                <input type="checkbox" name="" id="">
                            </section>
                            <section class="col-6 col-md-3 selected-item my-2">
                                <p>نمایش دسته جدید</p>
                                <input type="checkbox" name="" id="">
                            </section>
                            <section class="col-6 col-md-3 selected-item my-2">
                                <p>نمایش دسته جدید</p>
                                <input type="checkbox" name="" id="">
                            </section>
                            <section class="col-6 col-md-3 selected-item my-2">
                                <p>نمایش دسته جدید</p>
                                <input type="checkbox" name="" id="">
                            </section>
                            <section class="col-6 col-md-3 selected-item my-2">
                                <p>نمایش دسته جدید</p>
                                <input type="checkbox" name="" id="">
                            </section>
                            <section class="col-6 col-md-3 selected-item my-2">
                                <p>نمایش دسته جدید</p>
                                <input type="checkbox" name="" id="">
                            </section>
                            <section class="col-6 col-md-3 selected-item my-2">
                                <p>نمایش دسته جدید</p>
                                <input type="checkbox" name="" id="">
                            </section>
                            <section class="col-6 col-md-3 selected-item my-2">
                                <p>نمایش دسته جدید</p>
                                <input type="checkbox" name="" id="">
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>
@endsection
