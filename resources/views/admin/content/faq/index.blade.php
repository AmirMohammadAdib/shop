@extends('admin.layouts.master')

@section('head-tag')
    <title>سوالات متداول</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوا</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> سوالات متداول</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        سوالات متداول
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('faq.create') }}" class="btn btn-info btn-sm text-white">ایجاد سوال متداول</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>پرسش</th>
                                <th>خلاصه پاسخ</th>
                                <th>وضعیت</th>
                                <th class="width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $key => $faq)
                                <tr>
                                    <th>{{ $key +=1 }}</th>
                                    <td>{{ $faq->question }}</td>
                                    <td>
                                        @if (strlen($faq->answer) > 50)
                                            {{ htmlentities(substr($faq->answer, 0, 50)) . ' ... ' }}
                                        @else
                                            {{ htmlentities($faq->answer) }}
                                        @endif
                                    </td>
                                    <td>
                                        <label for="">
                                            <input type="checkbox" name="status" @if($faq->status === 1) checked @endif id="{{ $faq->id }}" data-url="{{ route("faq.status", [$faq]) }}" onChange="chageStatus({{ $faq->id }})">
                                        </label>
                                    </td>
                                    <td class="width-16-rem lefter text-left">
                                        <a href="{{ route('faq.edit', [$faq->id]) }}" class="btn btn-primary btn-sm"><i
                                                class="fa fa-edit"></i>
                                            ویرایش</a>
                                        <form class="d-inline" action="{{ route('faq.destroy', [$faq->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm delete" type="submit"><i
                                                    class="fa fa-trash-alt"></i> حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>

    <script>
        function chageStatus(id) {
            var element = $("#" + id)
            var url = element.attr("data-url")
            var element_value = !element.prop("checked")

            $.ajax({
                url: url,
                type: "GET",
                success: (response) => {
                    if (response.status) {
                        if (response.checked) {
                            element.prop("checked", true);
                            toast("دسته بندی با موفقیت فعال شد", 'success')
                        } else {
                            element.prop("checked", false);
                            toast("دسته بندی با موفقیت غیرفعال شد", 'success')
                        }
                    } else {
                        element.prop("checked", element_value);
                        toast("هنگام ویرایش مشکلی پیش آمده است", 'error')
                    }
                },
                error: () => {
                    toast("ارتباط برقرار نشد", 'error')
                }
            })

            function toast(message, type) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: type,
                    title: message
                })
            }
        }
    </script>
@endsection
