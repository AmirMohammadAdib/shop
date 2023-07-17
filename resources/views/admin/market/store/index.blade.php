@extends('admin.layouts.master')

@section('head-tag')
    <title>انبار</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> انبار</li>
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
                    <a href="#" class="btn btn-info btn-sm text-white disabled">ایجاد انبار</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام کالا</th>
                                <th>تصویر کالا</th>
                                <th>موجودی</th>
                                <th>ورودی انبار</th>
                                <th>خروجی انبار</th>
                                <th class="width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>نمایشگر 27 اینچ</td>
                                <td><img style="height: 3rem" src="https://dkstatics-public.digikala.com/digikala-products/e3f66f06586aa25c8e6585aee11ab2e6ede4d953_1620135965.jpg?x-oss-process=image/resize,m_lfit,h_800,w_800/quality,q_90"</td>
                                <td>16</td>
                                <td>38</td>
                                <td>28</td>
                                <td class="width-16-rem lefter text-left">
                                    <a href="{{ route("store.addToStore") }}" class="btn btn-primary btn-sm my-2"><i class="fa fa-edit"></i> افزایش موجودی</a>
                                    <button class="btn btn-warning btn-sm my-2" type="submit"><i class="fa fa-edit"></i>
                                        اطلاح موجودی</button>
                                </td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>نمایشگر 27 اینچ</td>
                                <td><img style="height: 3rem" src="https://dkstatics-public.digikala.com/digikala-products/e3f66f06586aa25c8e6585aee11ab2e6ede4d953_1620135965.jpg?x-oss-process=image/resize,m_lfit,h_800,w_800/quality,q_90"</td>
                                <td>16</td>
                                <td>38</td>
                                <td>28</td>
                                <td class="width-16-rem lefter text-left">
                                    <a href="{{ route("store.addToStore") }}" class="btn btn-primary btn-sm my-2"><i class="fa fa-edit"></i> افزایش موجودی</a>
                                    <button class="btn btn-warning btn-sm my-2" type="submit"><i class="fa fa-edit"></i>
                                        اطلاح موجودی</button>
                                </td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>نمایشگر 27 اینچ</td>
                                <td><img style="height: 3rem" src="https://dkstatics-public.digikala.com/digikala-products/e3f66f06586aa25c8e6585aee11ab2e6ede4d953_1620135965.jpg?x-oss-process=image/resize,m_lfit,h_800,w_800/quality,q_90"</td>
                                <td>16</td>
                                <td>38</td>
                                <td>28</td>
                                <td class="width-16-rem lefter text-left">
                                    <a href="{{ route("store.addToStore") }}" class="btn btn-primary btn-sm my-2"><i class="fa fa-edit"></i> افزایش موجودی</a>
                                    <button class="btn btn-warning btn-sm my-2" type="submit"><i class="fa fa-edit"></i>
                                        اطلاح موجودی</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>
@endsection
