@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد نقش</title>
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
                            <section class="col-6 col-md-3 my-2">
                                <input type="checkbox" class="form-check-input" name="" id="check1" checked>
                                <label for="check1" class="form-check-label mr-3">نمایش دسته جدید</label>
                            </section>
                            <section class="col-6 col-md-3 my-2">
                                <input type="checkbox" class="form-check-input" name="" id="check2" checked>
                                <label for="check2" class="form-check-label mr-3">ایجاد دسته جدید</label>
                            </section>
                            <section class="col-6 col-md-3 my-2">
                                <input type="checkbox" class="form-check-input" name="" id="check3" checked>
                                <label for="check3" class="form-check-label mr-3">ویرایش دسته جدید</label>
                            </section>
                            <section class="col-6 col-md-3 my-2">
                                <input type="checkbox" class="form-check-input" name="" id="check4" checked>
                                <label for="check4" class="form-check-label mr-3">حذف دسته جدید</label>
                            </section>
                            <section class="col-6 col-md-3 my-2">
                                <input type="checkbox" class="form-check-input" name="" id="check5" checked>
                                <label for="check5" class="form-check-label mr-3">نمایش کالا جدید</label>
                            </section>
                            <section class="col-6 col-md-3 my-2">
                                <input type="checkbox" class="form-check-input" name="" id="check6" checked>
                                <label for="check6" class="form-check-label mr-3">ایجاد کالا جدید</label>
                            </section>
                            <section class="col-6 col-md-3 my-2">
                                <input type="checkbox" class="form-check-input" name="" id="check7" checked>
                                <label for="check7" class="form-check-label mr-3">ویرایش کالا جدید</label>
                            </section>
                            <section class="col-6 col-md-3 my-2">
                                <input type="checkbox" class="form-check-input" name="" id="check8" checked>
                                <label for="check8" class="form-check-label mr-3">حذف کالا جدید</label>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>
@endsection
