@extends('admin.layouts.master')

@section('head-tag')
    <title>تیکت ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش تیکت</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> تیکت ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        تیکت ها
                    </h5>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نویسنده تیکت</th>
                                <th>عنوان تیکت</th>
                                <th>دسته تیکت</th>
                                <th>اولویت تیکت</th>
                                <th>ارجاع شده به</th>
                                <th class="width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th>1</th>
                            <td>امیر ادیب</td>
                            <td>تست تست</td>
                            <td>فنی</td>
                            <td>فوری</td>
                            <td> - </td>
                            <td class="width-16-rem lefter text-left">
                                <a href="{{ route("ticket.show", [1]) }}" class="btn btn-info btn-sm text-white"><i class="fa fa-eye"></i> مشاهده</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>
@endsection
