@extends('admin.layouts.master')

@section('head-tag')
    <title>نقش ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نقش ها</li>
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
                    <a href="{{ route("role.create") }}" class="btn btn-info btn-sm text-white">ایجاد نقش</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام نقش ها</th>
                                <th>دسترسی ها</th>
                                <th class="width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>1</th>
                            <td>ادمین محتوایی</td>
                            <td>
                                <ul>
                                    <li>مشاهده پست ها</li>
                                    <li>مشاهده نظرات</li>
                                    <li>مشاهده پیج</li>
                                </ul>
                            </td>
                            <td class="width-16-rem lefter text-left" style="padding: .7rem 0 5rem .5rem">
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i>
                                    حذف</button>
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <a href="#" class="btn btn-success btn-sm"><i class="fa fa-graduation-cap"></i> دسترسی ها</a>
                            </td>
                        </tr>
                        <tr>
                            <th>1</th>
                            <td>ادمین محتوایی</td>
                            <td>
                                <ul>
                                    <li>مشاهده پست ها</li>
                                    <li>مشاهده نظرات</li>
                                    <li>مشاهده پیج</li>
                                </ul>
                            </td>
                            <td class="width-16-rem lefter text-left" style="padding: .7rem 0 5rem .5rem">
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i>
                                    حذف</button>
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <a href="#" class="btn btn-success btn-sm"><i class="fa fa-graduation-cap"></i> دسترسی ها</a>
                            </td>
                        </tr>
                        <tr>
                            <th>1</th>
                            <td>ادمین محتوایی</td>
                            <td>
                                <ul>
                                    <li>مشاهده پست ها</li>
                                    <li>مشاهده نظرات</li>
                                    <li>مشاهده پیج</li>
                                </ul>
                            </td>
                            <td class="width-16-rem lefter text-left" style="padding: .7rem 0 5rem .5rem">
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i>
                                    حذف</button>
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <a href="#" class="btn btn-success btn-sm"><i class="fa fa-graduation-cap"></i> دسترسی ها</a>
                            </td>
                        </tr>
                        <tr>
                            <th>1</th>
                            <td>ادمین محتوایی</td>
                            <td>
                                <ul>
                                    <li>مشاهده پست ها</li>
                                    <li>مشاهده نظرات</li>
                                    <li>مشاهده پیج</li>
                                </ul>
                            </td>
                            <td class="width-16-rem lefter text-left" style="padding: .7rem 0 5rem .5rem">
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i>
                                    حذف</button>
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <a href="#" class="btn btn-success btn-sm"><i class="fa fa-graduation-cap"></i> دسترسی ها</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>
@endsection
