@extends('admin.layouts.master')

@section('head-tag')
    <title>روش ارسال</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> روش ارسال</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        روش ارسال
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route("delivery.create") }}" class="btn btn-info btn-sm text-white">ایجاد روش ارسال</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام روش ارسال</th>
                            <th>هزینه ارسال</th>
                            <th>زمان ارسال</th>
                            <th class="width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>1</th>
                            <td>تیپاکس </td>
                            <td>23,000</td>
                            <td>حداکثر دو روز کاری</td>
                            <td class="width-16-rem lefter text-left">
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i>
                                    حذف</button>
                            </td>
                        </tr>
                        <tr>
                            <th>1</th>
                            <td>تیپاکس </td>
                            <td>23,000</td>
                            <td>حداکثر دو روز کاری</td>
                            <td class="width-16-rem lefter text-left">
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i>
                                    حذف</button>
                            </td>
                        </tr>
                        <tr>
                            <th>1</th>
                            <td>تیپاکس </td>
                            <td>23,000</td>
                            <td>حداکثر دو روز کاری</td>
                            <td class="width-16-rem lefter text-left">
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i>
                                    حذف</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>
@endsection
